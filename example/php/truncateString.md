# php / truncateString

## Files

- nifty / php / [truncateString.php](../../php/truncateString.php)

## Usage

```php
require_once 'truncateString.php';
```

```php
$text = '0123456789';
```

```php
$trunc = truncateString(str: $text, length: 6);

var_dump($trunc);
// expected output:
// string(6) "012..."
```

```php
$trunc = truncateString(str: $text, length: 6, end: '');

var_dump($trunc);
// expected output:
// string(6) "012345"
```

```php
$trunc = truncateString(str: $text, length: 10);

var_dump($trunc);
// expected output:
// string(10) "0123456789"
```
