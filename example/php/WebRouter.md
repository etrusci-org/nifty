# php / WebRouter

## Files

- nifty / php / [WebRouter.php](../../php/WebRouter.php)

## Usage

```php
require_once 'WebRouter.php';
```

```php
$Router = new WebRouter();
```

```php
// optionally override defaults
$Router->requestSource = 'get';
$Router->requestKey = 'myRequestKey';
$Router->defaultRoute['node'] = 'home';
```

```php
// get current route
$route = $Router->parseRoute();

var_dump($route);
// expected output:
// array(5) {
//     ["time"]=>
//     float(1662891068.532203)
//     ["request"]=>
//     string(0) ""
//     ["node"]=>
//     string(5) "home"
//     ["var"]=>
//     array(0) {
//     }
//     ["flag"]=>
//     array(0) {
//     }
// }
```

```php
// you can also set the route manually
$manualRoute = array('myRequestKey' => 'music/id:123/listen/quality:high');
$route = $Router->parseRoute(array: $manualRoute);

var_dump($route);
// expected output:
// array(5) {
//     ["time"]=>
//     float(1662891125.185296)
//     ["request"]=>
//     string(32) "music/id:123/listen/quality:high"
//     ["node"]=>
//     string(5) "music"
//     ["var"]=>
//     array(2) {
//       ["id"]=>
//       string(3) "123"
//       ["quality"]=>
//       string(4) "high"
//     }
//     ["flag"]=>
//     array(1) {
//       [0]=>
//       string(6) "listen"
//     }
// }
```
