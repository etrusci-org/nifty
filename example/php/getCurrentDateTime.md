# php / getCurrentDateTime

## Files

- nifty / php / [getCurrentDateTime.php](../../php/getCurrentDateTime.php)

## Usage

```php
require_once 'getCurrentDateTime.php';
```

```php
$default = getCurrentDateTime();

var_dump($default);
// expected output:
// string(33) "2022-09-01 00:21:27 Europe/Berlin"
```

```php
$nohuman = getCurrentDateTime(human: false);

var_dump($nohuman);
// expected output:
// int(1661984582)
```

```php
$custom  = getCurrentDateTime(humanFmt: 'd. M Y H:i');

var_dump($custom);
// expected output:
// string(18) "01. Sep 2022 00:23"
```
