<?php
require_once __DIR__ . '/../dbConfig.php';

$task_id=$_POST["task_id"];

$updatedTask= "UPDATE tasks SET is_completed=1 WHERE id=:task_id";

$sql=$connection->prepare($updatedTask);

// Bind the parameter
$sql->bindParam(':task_id', $task_id, PDO::PARAM_INT);


$sql->execute();



header('Location: /index.php');