<?php
require_once __DIR__ . '/../dbConfig.php';

$tasks="SELECT * FROM tasks";

$sql=$connection->prepare($tasks);


$sql->execute();

$sql->setFetchMode(PDO::FETCH_ASSOC);

$allTasks=$sql->fetchAll();

foreach($allTasks as $row){
    echo $row["title"] ."\n";
    echo '<form> <input="checkbox">
    </form>'  .$row["is_complete"] ."\n";
}