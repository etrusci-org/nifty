# php / getSumOfDurations

## Files

- nifty / php / [getSumOfDurations.php](../../php/getSumOfDurations.php)

## Usage

```php
require_once 'getSumOfDurations.php';
```

```php
$dur = array(
    '00:00:00:01',
    '00:00:01:00',
    '00:01:00:00',
    '01:00:00:00',
);

$sum = getSumOfDurations(durations: $dur);

var_dump($sum);
// expected output:
// int(90061)
```
