<?php
require_once __DIR__ . '/../mysqlDbConfig.php';

$task=trim($_POST["task"]);


$sql=$dbh->prepare("INSERT INTO tasks(title) values(:title)");

$sql->execute(['title'=> $task]);

header('Location: /index.php');