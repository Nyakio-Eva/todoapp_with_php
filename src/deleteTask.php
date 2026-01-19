<?php
require_once __DIR__ . '/../mysqlDbConfig.php';

$task_id=$_POST["task_id"];

$sql=$connection->prepare("DELETE FROM tasks WHERE id=:task_id");

// Bind the parameter
$sql->bindParam(':task_id', $task_id, PDO::PARAM_INT);

$sql->execute();

header('Location: /index.php');




