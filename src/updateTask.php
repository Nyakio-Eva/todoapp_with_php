<?php
require_once __DIR__ . '/../mysqlDbConfig.php';

$task_id=$_POST["task_id"];


$updatedTask= "UPDATE tasks SET is_complete=1 WHERE id=:task_id";

$sql=$dbh->prepare($updatedTask);

// Bind the parameter
// $sql->bindParam(':task_id', $task_id, PDO::PARAM_INT);


$sql->execute([':task_id'=>$task_id]);



header('Location: /index.php');

exit();