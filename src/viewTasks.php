<?php
require_once __DIR__ . '/../dbConfig.php';

$tasks="SELECT * FROM tasks";

$sql=$connection->prepare($tasks);


$sql->execute();

$sql->setFetchMode(PDO::FETCH_ASSOC);

$allTasks=$sql->fetchAll();

foreach($allTasks as $row){
    
    echo '<form>';
    echo htmlspecialchars($row["title"]);
    echo '<input type="checkbox">';
    echo '</form>'  .$row["is_complete"] ."\n";
}