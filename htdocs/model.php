<?php

define('DSN', 'mysql:dbname=php; host=db; charset=utf8');
define('USER_NAME', 'php');
define('PASSWD', 'php');

try {
    $pdo = new PDO(
        DSN,
        USER_NAME,
        PASSWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );


} catch (PDOException $e) {
    print "しっぱいしっぱい:{$e->getMessage()}";
    exit;
}


