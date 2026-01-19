<?php

require_once  __DIR__ . '/vendor/autoload.php';

$dotenv=Dotenv\Dotenv :: createImmutable(__DIR__);
$dotenv->load();

$host=$_ENV['HOST'];
$dbname=$_ENV['DB_NAME'];
$username=$_ENV['USER_NAME'];
$password=$_ENV['PASSWORD'];



try{
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

}catch(PDOException $e){
  echo "connection failed:" . $e->getMessage(). "\n";
}

?>