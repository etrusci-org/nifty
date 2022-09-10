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
$route = $Router->parseRoute();

var_dump($route);
// expected output:
// array(5) {
//     ["time"]=>
//     float(1662826586.555037)
//     ["request"]=>
//     string(0) ""
//     ["node"]=>
//     string(5) "index"
//     ["var"]=>
//     array(0) {
//     }
//     ["flag"]=>
//     array(0) {
//     }
// }
```
