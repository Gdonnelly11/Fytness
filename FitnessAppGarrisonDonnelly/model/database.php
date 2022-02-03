<?php

    /***************************************************************************************************************
     * Final Project
     * Author: Garrison Donnelly
     * Date: 12/7/2021
     * 
     * Filename: database.php
     * 
     * Model page for connecting to database. Includes error page if the PDO throws an exception.
     **************************************************************************************************************/

// Set up the database connection
$dsn = 'mysql:host=localhost;dbname=fitness_app';
$username = 'root';
$password = '';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/db_error_connect.php');
    exit();
}
?>