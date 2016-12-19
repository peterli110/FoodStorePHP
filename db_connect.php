<?php

/* 
 * Student Info: Name=Xinkai Li, ID=16271
 * Subject: CS526B_HW3_Fall_2016
 * Author: PeterLi
 * Filename: db_connect.php
 * Date and Time: 2016-11-11 22:07:56
 * Project Name: HW3
 */

$dsn = 'mysql:host=localhost;dbname=restaurantdb';
$username = 'admin';
$password = 'pass@word';

try {
    $db = new PDO($dsn, $username, $password);
    echo 'Connected.';
} catch (PDOException $ex) {
    $error_msg = $ex->getMessage();
}
        
?>
