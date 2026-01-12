<?php
require_once __DIR__ . '/../dbConfig.php';

$task_id=$_POST["task_id"];
$new_title=$_POST["title"];
$new_priority=$_POST["priority"];
$new_duedate=$_POST["due_date"];


$sql=$connection->prepare("UPDATE tasks SET title=:title, priority=:priority, due_date=:due_date WHERE id=:task_id");

$sql->execute([
    'task_id'=> $task_id, 
    'title'=> $new_title,
    'priority'=>$new_priority,
    'due_date'=>$new_duedate,
]);

header('Location: /index.php');