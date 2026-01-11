<?php
require_once __DIR__ . '/dbConfig.php';

$tasks="SELECT * FROM tasks";

$sql=$connection->query($tasks);


$sql->setFetchMode(PDO::FETCH_ASSOC);

$allTasks=$sql->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inertiabreaker</title>
    
</head>
<body>
   <h1>INERTIABREAKER</h1><br>
    <form action="src/createTask.php" method="post">
      <input type="text" name="task" placeholder="new task" required>
      <button type="submit">Add Task</button><br>
    </form>
    <br>
     <?php
      foreach ($allTasks as $task){
        $completedTask=$task['is_complete'] ? 'text-decoration : line-through;' : '';
        $checked=$task['is_complete']? 'checked disabled':'';
        
        echo "<div>
         <label style='{$completedTask}'>" . htmlspecialchars($task["title"]) . "</label>
         <form action='/src/deleteTask.php' method='post' style='display:inline'>
          <input type='hidden' name='task_id' value='".$task["id"]."'><button type='submit'>Delete Task</button>
          </form> 
         <form action='/src/updateTask.php' method='post' style='display:inline'> mark complete
          <input type='hidden' name='task_id' value='".$task["id"]."'>
          <input type='checkbox' {$checked} onchange='this.form.submit()'>
          
          </form>
          
        </div> \n";
      }
        
      ?>
    
</body>
</html>

