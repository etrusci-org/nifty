# php / joinPath

## Files

- nifty / php / [joinPath.php](../../php/joinPath.php)

## Usage

```php
require_once 'joinPath.php';
```

```php
$path = joinPath('foo', 'bar', 'file.dat');

var_dump($path);
// expected output:
// string(16) "foo\bar\file.dat"
```
