<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv=Dotenv\Dotenv :: createImmutable(__DIR__);
$dotenv->load();


$dbPath=$_ENV['DB_PATH'];


try{
    $connection=new PDO("sqlite:$dbPath");  
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully!\n";

    $db="
        DROP TABLE IF EXISTS tasks;
        CREATE TABLE IF NOT EXISTS tasks(
            id INTEGER PRIMARY KEY,
            title TEXT NOT NULL,
            is_complete INTEGER DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
        CREATE TABLE IF NOT EXISTS users(
            id INTEGER PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            password VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";
    $connection->exec($db);


    echo "table created successfully!\n";
   
}catch(PDOException $e){
  echo "Connection failed: " . $e->getMessage()."\n";
}

?>