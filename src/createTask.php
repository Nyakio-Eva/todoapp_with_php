<?php
require_once __DIR__ . '/../dbConfig.php';

$task=trim($_POST["task"]);


$sql=$connection->prepare("INSERT INTO tasks(title) values(:title)");

$sql->execute(['title'=> $task]);

