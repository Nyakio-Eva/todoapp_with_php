<?php
require_once __DIR__ . '/../mysqlDbConfig.php';



$task_id=$_POST["task_id"];
$is_complete=isset($_POST["is_checked"]) ? 1:0;




$updatedTask= "UPDATE tasks SET is_complete=:is_complete WHERE id=:task_id";


$sql=$connection->prepare($updatedTask);

// Bind the parameter
// $sql->bindParam(':task_id', $task_id, PDO::PARAM_INT);


$sql->execute([
    'task_id'=>$task_id,
    'is_complete'=>$is_complete
    
]);



header('Location: /index.php');

exit();