<?php
require __DIR__.'/DatabaseSQLite3.php';

// Using :memory: as database file for demonstration.
// You would most probably point to a SQLite3 database file.

$db = new DatabaseSQLite3(':memory:');

$db->open(TRUE);

$db->write('CREATE TABLE students (id INTEGER PRIMARY KEY AUTOINCREMENT, birthyear INTEGER DEFAULT NULL);');
$db->write('INSERT INTO students (birthyear) VALUES (1979);');
$db->write('INSERT INTO students (birthyear) VALUES (1980);');
$db->write('INSERT INTO students (birthyear) VALUES (1981);');

$q = 'SELECT id, birthyear FROM students WHERE birthyear >= :minBirthyear';

$v = array(
    array('minBirthyear', 1980, SQLITE3_INTEGER),
);

$r = $db->query($q, $v);

$db->close();

var_dump($r);
// array(2) {
//     [0]=>
//     array(2) {
//       ["id"]=>
//       int(2)
//       ["birthyear"]=>
//       int(1980)
//     }
//     [1]=>
//     array(2) {
//       ["id"]=>
//       int(3)
//       ["birthyear"]=>
//       int(1981)
//     }
//   }
