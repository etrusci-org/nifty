# php / normalizeWhitespace

## Files

- nifty / php / [normalizeWhitespace.php](../../php/normalizeWhitespace.php)

## Usage

```php
require_once 'normalizeWhitespace.php';
```

```php
$text = '   foo bar    moo     cow          ';

$clean = normalizeWhitespace($text);

var_dump($clean);
// expected output:
// string(15) "foo bar moo cow"
```
