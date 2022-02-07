<?php
class WebRouter {
    public $requestSource = 'get+post';
    public $requestKey = 'r';
    public $defaultRoute = array(
        'time' => null,
        'request'=> null,
        'node' => null,
        'var' => array(),
        'flag' => array(),
    );

    public function parseRoute($array=null, $sort=TRUE) {
        $route = $this->defaultRoute;
        $route['time'] = time();

        switch ($this->requestSource) {
            case 'get':
                $requestData = $_GET;
                break;

            case 'post';
                $requestData = $_POST;
                break;

            case 'get+post';
                $requestData = array_merge($_GET, $_POST);
                break;

            default:
                $requestData = $_GET;
        }

        if (!$array) {
            $request = array_key_exists($this->requestKey, $requestData) ? $requestData[$this->requestKey] : '';
        }
        else {
            $request = array_key_exists($this->requestKey, $array) ? $array[$this->requestKey] : '';
        }

        $route['request'] = trim($request);

        if (!$request) {
            return $route;
        }

        $dump = explode('/', $request, 2);

        $route['node'] = count($dump) > 0 ? $dump[0] : '';

        if (count($dump) > 1) {
            $dump = explode('/', $dump[1]);
            foreach ($dump as $v) {
                if (stristr($v, ':')) {
                    $v = explode(':', $v);
                    if (count($v) == 2 && !empty($v[0]) && !empty($v[1])) {
                        $route['var'][$v[0]] = $v[1];
                    }
                }
                else {
                    if (!empty($v)) {
                        $route['flag'][] = $v;
                    }
                }
            }
        }

        if ($sort) {
            ksort($route['var']);
            sort($route['flag']);
        }

        // var_dump($route);
        return $route;
    }
}
