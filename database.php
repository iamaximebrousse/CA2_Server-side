<?php
    $dsn = 'mysql:host=localhost;dbname=D00251731';
    $username = 'D00251731';
    $password = 'Hy1SizSD';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>