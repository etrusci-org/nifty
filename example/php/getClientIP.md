# php / getClientIP

## Files

- nifty / php / [getClientIP.php](../../php/getClientIP.php)

## Usage

```php
require_once 'getClientIP.php';
```

```php
$ip = getClientIP();

var_dump($ip);
// expected output:
// on localhost - string(9) "127.0.0.1"
// on command line - bool(false)
```
