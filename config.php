<?php
$host = 'localhost';
$db = 'blog_platform';
$user = 'interns';
$pass = 'interns1234';

//block for db error handling 
try {
    //new pdo connection with string format
    $connect = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    //pdo metod, sro to throw exception error 
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //display error and end execution
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
