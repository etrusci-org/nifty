<?php
class DatabaseSQLite3 {
    protected $dbFile;
    protected $db;
    protected $encryptionKey;
    protected $sqliteVersion;

    public function __construct($dbFile, $encryptionKey='') {
        $this->dbFile = $dbFile;
        $this->encryptionKey = $encryptionKey;
        $this->sqliteVersion = SQLite3::version();
    }

    public function open($rw=FALSE) {
        if (is_object($this->db)) return $this->db;

        $flag = (!$rw) ? SQLITE3_OPEN_READONLY : SQLITE3_OPEN_READWRITE;

        $this->db = new SQLite3($this->dbFile, $flag, $this->encryptionKey);
    }

    public function close() {
        if (!is_object($this->db)) return FALSE;

        $this->db->close();
    }

    public function query($query, $values=array()) {
        if (!is_object($this->db)) return FALSE;

        $stmt = $this->db->prepare($query);
        foreach ($values as $v) {
            $stmt->bindValue($v[0], $v[1], $v[2]);
        }

        $result = $stmt->execute();

        $dump = array();
        while ($row = $result->fetchArray(TRUE)) {
            $dump[] = $row;
        }

        $stmt->close();

        return $dump;
    }

    public function querySingle($query, $values=array()) {
        if (!is_object($this->db)) return FALSE;

        $result = $this->query($query, $values);

        if (count($result) < 1) {
            return array();
        }

        return $result[0];
    }

    public function write($query, $values=array()) {
        if (!is_object($this->db)) return FALSE;

        $stmt = $this->db->prepare($query);

        foreach ($values as $v) {
            $stmt->bindValue($v[0], $v[1], $v[2]);
        }

        return $stmt->execute();
    }
}


/* Example:

// Using :memory: as database file for demonstration.
// You should point to a SQLite3 database file.

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

*/
