<?php
// ----------------
// WORK IN PROGRESS
// ----------------
// Usage:
//
// $MCT = new MixcloudTool();
// $MCT->cacheDir = __DIR__.'/_test';
// $MCT->cacheTTL = 60;
//
// print_r($MCT);
//
// $user = $MCT->getUser(user: 'spartacus');
// print_r($user);
//
// $cloudcasts = $MCT->getCloudcasts(user: 'spartacus');
// print_r($cloudcasts);
// ----------------
declare(strict_types=1);


class MixcloudTool {
    public string $apiBaseURL = 'https://api.mixcloud.com';
    public string $cacheDir = __DIR__;
    public int $cacheTTL = 43200;
    protected array $ram = [];


    protected function getData(string $apiURL, string $cacheFile, null|string $mergeKey = null): array {
        if (!file_exists($cacheFile) || time() - filemtime($cacheFile) > $this->cacheTTL) {
            $data = file_get_contents($apiURL);
            $data = json_decode($data, true);

            $this->ram['data'] = array_merge($this->ram['data'], ($mergeKey && isset($data[$mergeKey])) ? $data[$mergeKey] : $data);

            if (isset($data['paging']) && isset($data['paging']['next'])) {
                $this->getData($data['paging']['next'], $cacheFile, $mergeKey);
            }

            file_put_contents($cacheFile, json_encode($this->ram['data'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT), LOCK_EX);
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

        $cacheFile = sprintf('%s/mixcloud-user-%s.json', $this->cacheDir, $user);

        $apiURL = sprintf('%s/%s', $this->apiBaseURL, $user);
        $data = $this->getData($apiURL, cacheFile: $cacheFile);

        return $data;
    }


    public function getCloudcasts(string $user): array {
        $this->ram['data'] = [];

        $cacheFile = sprintf('%s/mixcloud-cloudcasts-%s.json', $this->cacheDir, $user);

        $apiURL = sprintf('%s/%s/cloudcasts/?limit=20&offset=0', $this->apiBaseURL, $user);
        $data = $this->getData($apiURL, cacheFile: $cacheFile, mergeKey: 'data');

        return $data;
    }
}
