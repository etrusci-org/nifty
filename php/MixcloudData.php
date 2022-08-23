<?php
// ----------------
// WORK IN PROGRESS
// ----------------
declare(strict_types=1);


class MixcloudData {
    public string $cacheDir = __DIR__;
    public string $errorFile = __DIR__.'/errors.log';
    public int $cacheTTL = 86400 * 3;
    public string $baseURL = 'https://api.mixcloud.com';
    public string $patternUserURL = '%s/%s/?metadata=1';
    public string $patternUserCacheFile = '%s/mixcloud-%s-user.json';
    public string $patternCloudcastsURL = '%s/%s/cloudcasts/?limit=%s&offset=0';
    public string $patternCloudcastsCacheFile = '%s/mixcloud-%s-cloudcasts.json';
    public string $patternShowURL = '%s/%s/%s/?metadata=1';
    public string $patternShowCacheFile = '%s/mixcloud-%s-show-%s.json';
    public int $pagingLimit = 20;
    protected array $ram = [];


    protected function getData(string $url, string $cacheFile, null|string $mergeKey = null): array {
        if (!file_exists($cacheFile) || time() - filemtime($cacheFile) > $this->cacheTTL) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($curl);
            $curlStatusCode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);

            if ($curlStatusCode != 200) {
                $errline = sprintf("URL: %s\nRESPONSE: %s\n%s\n", $url, $data, str_repeat('-', 100));
                file_put_contents($this->errorFile, $errline, FILE_APPEND | LOCK_EX);
                return [];
            }

            $data = json_decode($data, true);

            $this->ram = array_merge($this->ram, ($mergeKey && isset($data[$mergeKey])) ? $data[$mergeKey] : $data);

            if (isset($data['paging']) && isset($data['paging']['next'])) {
                $this->getData($data['paging']['next'], $cacheFile, $mergeKey);
            }

            if ($this->cacheTTL >= 0) {
                file_put_contents($cacheFile, json_encode($this->ram, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);
            }
        }
        else {
            $data = file_get_contents($cacheFile);
            $data = json_decode($data, true);
            $this->ram = $data;
        }

        return $this->ram;
    }


    public function getUser(string $user): array {
        $this->ram = [];

        $url = sprintf($this->patternUserURL, $this->baseURL, $user);
        $cacheFile = sprintf($this->patternUserCacheFile, $this->cacheDir, $user);

        $data = $this->getData($url, $cacheFile);

        return $data;
    }


    public function getCloudcasts(string $user): array {
        $this->ram = [];

        $url = sprintf($this->patternCloudcastsURL, $this->baseURL, $user, $this->pagingLimit);
        $cacheFile = sprintf($this->patternCloudcastsCacheFile, $this->cacheDir, $user);

        $data = $this->getData($url, $cacheFile, 'data');

        return $data;
    }


    public function getShow(string $user, string $slug): array {
        $this->ram = [];

        $url = sprintf($this->patternShowURL, $this->baseURL, $user, $slug);
        $cacheFile = sprintf($this->patternShowCacheFile, $this->cacheDir, $user, $slug);

        $data = $this->getData($url, $cacheFile);

        return $data;
    }
}
