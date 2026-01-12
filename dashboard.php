<?php
require_once __DIR__. '/dbConfig.php';

$myTasks="SELECT * FROM tasks";
$sql=$connection->query($myTasks);
$sql->setFetchMode(PDO::FETCH_ASSOC);
$allMyTasks=$sql->fetchAll();

$tasksCompleted="SELECT * FROM tasks WHERE is_completed=1";
$result=$connection->query($tasksCompleted);
$result->setFetchMode(PDO::FETCH_ASSOC);
$allTasksCompleted=$result->fetchAll();

