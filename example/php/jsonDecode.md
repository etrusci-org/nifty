# php / jsonDecode

## Files

- nifty / php / [jsonDecode.php](../../php/jsonDecode.php)

## Usage

```php
require_once 'jsonDecode.php';
```

```php
$data = jsonDecode('{"foo": "bar"}');

var_dump($data);
// expected output:
// array(1) {
//     ["foo"]=>
//     string(3) "bar"
// }
```
