<?php
    //Development connection
    //$host = '127.0.0.1';
    //$db = 'attendance_db';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    //remote database connection
    $host = 'remotemysql.com';
    $db = '3Cvd3uuSNp';
    $user = '3Cvd3uuSNp';
    $pass = '1FEFAaiecQ';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //tell me if there's an error
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>