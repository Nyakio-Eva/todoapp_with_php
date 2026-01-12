<?php
require_once __DIR__ . '/../dbConfig.php';

$task=trim($_POST["task"]);
$priority=($_POST["priority"]);
$duedate=($_POST["due_date"]);


$sql=$connection->prepare("INSERT INTO tasks(title,priority,due_date) values(:title, :priority, :due_date)");

$sql->execute([
    'title'=> $task,
    'priority'=>$priority,
    'due_date'=>$duedate

]);

header('Location: /index.php');