<?php

require_once  __DIR__ . '/vendor/autoload.php';

$dotenv=Dotenv\Dotenv :: createImmutable(__DIR__);
$dotenv->load();

$host=$_ENV['HOST'];
$dbname=$_ENV['DB_NAME'];
$username=$_ENV['USERNAME'];
$password=$_ENV['PASSWORD'];

var_dump($_ENV['USERNAME']);

try{
    $dbh = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

}catch(PDOException $e){
  echo "connection failed:" . $e->getMessage(). "\n";
}

?>