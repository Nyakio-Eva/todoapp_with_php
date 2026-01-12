<?php
require_once __DIR__ . '/../dbConfig.php';

$task_id=$_POST["task_id"];
$new_title=$_POST["title"];


$sql=$connection->prepare("UPDATE tasks SET title=:title WHERE id=:task_id");

$sql->execute(['task_id'=> $task_id, 'title'=> $new_title]);

header('Location: /index.php');