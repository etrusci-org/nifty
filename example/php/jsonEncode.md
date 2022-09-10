# php / jsonEncode

## Files

- nifty / php / [jsonEncode.php](../../php/jsonEncode.php)

## Usage

```php
require_once 'jsonEncode.php';
```

```php
$data = array('foo' => 'bar');

$json = jsonEncode($data);

var_dump($json);
// expected output:
// string(20) "{
//     "foo": "bar"
// }"
```
