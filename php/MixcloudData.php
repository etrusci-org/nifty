<?php
// ----------------
// WORK IN PROGRESS
// ----------------
declare(strict_types=1);


class MixcloudData {
    public string $cacheDir = __DIR__; // absolute path to the cache directory
    public int $cacheTTL = 86400 * 3; // seconds to wait before getting fresh remote data
    public string $errorFile = __DIR__.'/errors.log'; // absolute path to the error log file
    public float $requestDelay = 0.250; // seconds to wait between api requests
    public int $pagingLimit = 20; // how many items to request per page (for results with paging)
    public string $baseURL = 'https://api.mixcloud.com'; // api base url
    public string $patternUserURL = '%1$s/%2$s/?metadata=1'; // 1=baseURL, 2=user
    public string $patternUserCacheFile = '%1$s/mixcloud-%2$s-user.json'; // 1=cacheDir, 2=user
    public string $patternCloudcastsURL = '%1$s/%2$s/cloudcasts/?limit=%3$s&offset=0'; // 1=baseURL, 2=user, 3=pagingLimit
    public string $patternCloudcastsCacheFile = '%1$s/mixcloud-%2$s-cloudcasts.json'; // 1=cacheDir, 2=user
    public string $patternShowURL = '%1$s/%2$s/%3$s/?metadata=1'; // 1=baseURL, 2=user, 3=slug
    public string $patternShowCacheFile = '%1$s/mixcloud-%2$s-show-%3$s.json'; // 1=cacheDir, 2=user, 3=slug
    protected array $ram = []; // temporary data storage


    protected function getData(string $url, string $cacheFile, null|string $mergeKey = null): array {
        if (!file_exists($cacheFile) || time() - filemtime($cacheFile) > $this->cacheTTL) {
            if (isset($this->ram['nextRequestOn'])) {
                time_sleep_until($this->ram['nextRequestOn']);
            }

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($curl);
            $curlStatusCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

            if ($curlStatusCode != 200) {
                $errline = sprintf("TIME: %s\nURL: %s\nRESPONSE: %s\n%s\n", date('Y-m-d H:i:s T'), $url, $data, str_repeat('-', 100));
                file_put_contents($this->errorFile, $errline, FILE_APPEND | LOCK_EX);
                return [];
            }

            $this->ram['nextRequestOn'] = microtime(true) + $this->requestDelay;

            $data = json_decode($data, true);

            $this->ram['data'] = array_merge($this->ram['data'], ($mergeKey && isset($data[$mergeKey])) ? $data[$mergeKey] : $data);

            if (isset($data['paging']) && isset($data['paging']['next'])) {
                $this->getData($data['paging']['next'], $cacheFile, $mergeKey);
            }

            if ($this->cacheTTL >= 0) {
                file_put_contents($cacheFile, json_encode($this->ram['data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);
            }
        }
        else {
            $data = file_get_contents($cacheFile);
            $data = json_decode($data, true);
            $this->ram['data'] = $data;
        }

        return $this->ram['data'];
    }


    public function getUser(string $user): array {
        $this->ram['data'] = [];

        $url = sprintf($this->patternUserURL, $this->baseURL, $user);
        $cacheFile = sprintf($this->patternUserCacheFile, $this->cacheDir, $user);

        $data = $this->getData($url, $cacheFile);

        return $data;
    }


    public function getCloudcasts(string $user): array {
        $this->ram['data'] = [];

        $url = sprintf($this->patternCloudcastsURL, $this->baseURL, $user, $this->pagingLimit);
        $cacheFile = sprintf($this->patternCloudcastsCacheFile, $this->cacheDir, $user);

        $data = $this->getData($url, $cacheFile, 'data');

        return $data;
    }


    public function getShow(string $user, string $slug): array {
        $this->ram['data'] = [];

        $url = sprintf($this->patternShowURL, $this->baseURL, $user, $slug);
        $cacheFile = sprintf($this->patternShowCacheFile, $this->cacheDir, $user, $slug);

        $data = $this->getData($url, $cacheFile);

        return $data;
    }
}
