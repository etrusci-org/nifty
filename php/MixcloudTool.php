<?php
// ----------------
// WORK IN PROGRESS
// ----------------
declare(strict_types=1);


class MixcloudTool {
    public string $baseURL = 'https://api.mixcloud.com';
    public string $cacheDir = __DIR__;
    protected array $ram = [];


    public function getAPIData(string $apiURL, null|string $mergeKey = null): array {
        $apiData = file_get_contents($apiURL);
        $apiData = json_decode($apiData, true);
        $this->ram['apiData'] = array_merge($this->ram['apiData'], ($mergeKey && isset($apiData[$mergeKey])) ? $apiData[$mergeKey] : $apiData);

        if (isset($apiData['paging']) && isset($apiData['paging']['next'])) {
            $this->getAPIData($apiData['paging']['next'], $mergeKey);
        }

        return $this->ram['apiData'];
    }


    public function getUser(string $user): array {
        $apiURL = sprintf('%s/%s', $this->baseURL, $user);
        $this->ram['apiData'] = [];
        $data = $this->getAPIData($apiURL);
        return $data;
    }


    public function getCloudcasts(string $user): array {
        $apiURL = sprintf('%s/%s/cloudcasts/?limit=20&offset=0', $this->baseURL, $user);
        $this->ram['apiData'] = [];
        $data = $this->getAPIData($apiURL, mergeKey: 'data');
        return $data;
    }

}













/*
class MixcloudTool {

    public string $apiBaseURL = 'https://api.mixcloud.com';
    public int $pagingDelay = 100_000; // microseconds
    public string $cacheDir = __DIR__;

    protected array $ram = [
        'apiURL' => '',
        'cloudcasts' => [],
    ];


    public function __construct() {
        if (!is_writable($this->cacheDir)) {
            printf('%1$s cache dir is not writable: %2$s', __CLASS__, $this->cacheDir);
        }
    }


    public function getCloudcasts(string $user): void {
        if (!isset($this->ram['cloudcasts'])) {
            $this->ram['cloudcasts'] = [];
        }

        $apiURL = sprintf('%1$s/%2$s/cloudcasts/?limit=20&offset=0', $this->apiBaseURL, $user);
        $cacheFile = sprintf('%1$s/cloudcasts-%2$s.json', $this->cacheDir, $user);

        $dump = '';

        if (!file_exists($cacheFile)) {
            print($apiURL.PHP_EOL.PHP_EOL);
            $dump = file_get_contents($apiURL);
            file_put_contents($cacheFile, $dump, LOCK_EX);
        }
        else {
            print($cacheFile.PHP_EOL.PHP_EOL);
            $dump = file_get_contents($cacheFile);
        }

        $dump = json_decode($dump, true);

        if ($dump && $dump['data']) {
            $this->ram['cloudcasts'] = array_merge($this->ram['cloudcasts'], $dump['data']);

            if (isset($dump['paging']) && isset($dump['paging']['next'])) {
                $this->apiURL = $dump['paging']['next'];
                // usleep($this->pagingDelay);
                // $this->fetchAll();
            }
        }

        print_r($this->ram['cloudcasts']);
    }

    // $dump = file_get_contents($this->apiURL);
    // $dump = json_decode($dump, true);

    // $this->result = array_merge($this->result, $dump['data']);

    // if (isset($dump['paging']) && isset($dump['paging']['next'])) {
    //     $this->apiURL = $dump['paging']['next'];
    //     usleep($this->pagingDelay);
    //     $this->fetchAll();
    // }
    // apiURL + %1$s/cloudcasts/?limit=20&offset=0

}
*/
