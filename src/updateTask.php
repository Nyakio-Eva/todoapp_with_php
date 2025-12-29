<?php
require_once __DIR__ . '/../dbConfig.php';

$updatedTask= "UPDATE tasks SET is_completed=1 WHERE id=1"


$sql=$connection->prepare($updatedTask);

$sql->execute();

echo $sql->rowCount() . "task marked done!\n";