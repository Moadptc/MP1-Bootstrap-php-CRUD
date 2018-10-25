<?php

$dsn = 'localhost';
$dbname = 'oop';
$username = 'root';
$password = '';

try{
$db = new PDO("mysql:host=$dsn;dbname=$dbname",$username,$password);
}catch (PDOException $e)
{
	echo $e->getMessage();
}

include 'class/Etudiant.php';


