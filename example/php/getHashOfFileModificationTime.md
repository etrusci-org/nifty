# php / getHashOfFileModificationTime

## Files

- nifty / php / [getHashOfFileModificationTime.php](../../php/getHashOfFileModificationTime.php)

## Usage

```php
require_once 'getHashOfFileModificationTime.php';
```

```php
$hash = getHashOfFileModificationTime(__FILE__);

var_dump($hash);
// expected output:
// string(40) "93d6ceaa761b43ecdf2c9412b46b6dd0487e097d"
```
