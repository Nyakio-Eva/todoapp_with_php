<?php
require_once __DIR__ . '/../dbConfig.php';

$task_id=$_POST["task_id"];

//soft delete task

$sql=$connection->prepare("UPDATE tasks SET deleted_at= CURRENT_TIMESTAMP WHERE id=:task_id");


$sql->execute([
  'task_id'=> $task_id,
]);

header('Location: /index.php');




