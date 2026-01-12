<?php
require_once __DIR__ . '/dbConfig.php';

$task_id=$_GET["id"] ?? null;

$sql=$connection->prepare("SELECT * FROM tasks WHERE id=:id");
$sql->execute(['id'=>$task_id]);

$task=$sql->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inertiabreaker</title>
</head>
<body>
    <form action='/src/editTask.php' method='post' style='display:inline'>
          <input type='hidden' name='task_id' value='<?=$task["id"]?>'>
          <input type='text' name='title' value='<?= htmlspecialchars($task["title"])?>'>
          <select id="priority" name="priority" required>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
          </select>
          <input type="date" name="due_date" value='<?= htmlspecialchars($task["due_date"])?>' required>
          <button type='submit'>Save Task</button>
   </form> 
</body>
</html>