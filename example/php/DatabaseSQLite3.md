# php / DatabaseSQLite3

## Files

- nifty / php / [DatabaseSQLite3.php](../../php/DatabaseSQLite3.php)

## Usage

```php
require_once 'DatabaseSQLite3.php';
```

```php
// create object
$db = new DatabaseSQLite3(dbFile: '/tmp/mydb.sqlite3');

// for temporary databases you can also use :memory: instead of a file.
// e.g.: dbFile: ':memory:'
```

```php
// open the database with read+write access
$db->open(rw: true);
```

```php
// create a table
$q = 'CREATE TABLE "artist" ("id" INTEGER, "name" TEXT UNIQUE, PRIMARY KEY("id" AUTOINCREMENT));';

$r = $db->write(query: $q);

if (!$r) {
    // error while creating table
}
```

```php
// insert some data
$q = 'INSERT INTO artist ("name") VALUES ("DJ Shadow"), ("Amon Tobin"), ("Jazzanova");';

$r = $db->write(query: $q);

if (!$r) {
    // error while inserting data
}
```

```php
// get some data
$q = 'SELECT * FROM artist;';

$r = $db->query(query: $q);

if (!$r) {
    // error while getting data
}

var_dump($r);
// expected output:
// array(3) {
//     [0]=>
//     array(2) {
//       ["id"]=>
//       int(1)
//       ["name"]=>
//       string(9) "DJ Shadow"
//     }
//     [1]=>
//     array(2) {
//       ["id"]=>
//       int(2)
//       ["name"]=>
//       string(10) "Amon Tobin"
//     }
//     [2]=>
//     array(2) {
//       ["id"]=>
//       int(3)
//       ["name"]=>
//       string(9) "Jazzanova"
//     }
// }
```

```php
// get some data with query values
$q = 'SELECT * FROM artist WHERE name = :artistName;';

$v = array(
    array('artistName', 'Jazzanova', SQLITE3_TEXT)
);

$r = $db->query(query: $q, values: $v);

if (!$r) {
    // error while getting data with query values
}

var_dump($r);
// expected output:
// array(1) {
//     [0]=>
//     array(2) {
//       ["id"]=>
//       int(1)
//       ["name"]=>
//       string(9) "Jazzanova"
//     }
// }
```
