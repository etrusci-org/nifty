<?php
declare(strict_types=1);


/**
 * Super simple web app for the lazy.
 */
class WebApp {
    public DatabaseSQLite3 $DB;
    public WebRouter $Router;
    public array $conf;
    public array $route;
    public string $cacheID;


    /**
     * Class constructor.
     *
     * @param array $conf  Configuration.
     * @return void
     */
    public function __construct(array $conf) {
        $this->conf = $conf;
        $this->DB = new DatabaseSQLite3($conf['dbFile']);
        $this->Router = new WebRouter();
        $this->route = $this->Router->parseRoute();
        $this->cacheID = $this->currentCacheID();
    }


    public function renderOutput(false|string $openDB=false): void {
        $pageFile = sprintf('%s/%s.php', $this->conf['pageDir'], $this->route['node']);
        $cacheFile = sprintf('%s/%s', $this->conf['cacheDir'], $this->cacheID);

        if (!is_file($pageFile)) {
            $this->route['node'] = '404';
            $pageFile = sprintf('%s/%s.php', $this->conf['pageDir'], '404');
        }

        if (
            $this->conf['cachingEnabled'] &&
            !in_array($this->route['node'], $this->conf['cacheExcludedNodes']) &&
            is_file($cacheFile) &&
            (time() - filemtime($cacheFile)) <= $this->conf['cacheTTL']
        ) {
            $cacheOutput = file_get_contents($cacheFile);
            print($cacheOutput);
        }
        else {
            ob_start();

            if ($openDB) {
                $this->DB->open(rw: ($openDB == 'r') ? false : true);
            }

            require $this->conf['pageDir'].'/_header.php';
            require $pageFile;
            require $this->conf['pageDir'].'/_footer.php';

            if ($openDB) {
                $this->DB->close();
            }

            $outputBuffer = ob_get_contents();

            ob_end_clean();

            print($outputBuffer);

            if (
                $this->conf['cachingEnabled'] &&
                !in_array($this->route['node'], $this->conf['cacheExcludedNodes']) &&
                $this->route['node'] != '404'
            ) {
                file_put_contents($cacheFile, $outputBuffer, LOCK_EX);
            }
        }
    }


    public function currentCacheID(): string {
        $requestHash = array();
        $requestHash[] = $this->route['node'];
        foreach ($this->route['var'] as $k => $v) {
            $requestHash[] = sprintf('%s:%s', $k, $v);
        }
        $requestHash[] = implode('/', $this->route['flag']);
        return sprintf('route-%s-%s', $this->route['node'], hash('ripemd160', implode('/', $requestHash)));
    }


    public function routeURL(string $request = '', array $stringValues = []): string {
        $request = vsprintf($request, $stringValues);

        if ($this->conf['rewriteURL']) {
            return $request;
        }
        else {
            if (!$request) {
                return '';
            }
            else {
                return sprintf('?%s=%s', $this->Router->requestKey, $request);
            }
        }
    }
}
