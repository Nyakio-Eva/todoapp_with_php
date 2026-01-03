<?php
require_once __DIR__ . '/dbConfig.php';

$tasks="SELECT * FROM tasks";

$sql=$connection->prepare($tasks);


$sql->execute();

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
   <h1>INERTIABREAKER 2026</h1><br>
    <form action="src/createTask.php" method="post">
      <input type="text" name="task" placeholder="new task" required>
      <button type="submit">Add Task</button><br>
    </form>
    <br>
     <?php
      foreach ($allTasks as $row){
        
        echo "<div>
         <label>" . $row["title"] . "</label>
         <form action='/src/deleteTask.php' method='post' style='display:inline'>
          <input type='hidden' name='task_id' value='".$row["id"]."'><button type='submit'>Edit Task</button>
          </form> 
         <form action='/src/UpdateTask.php' method='post' style='display:inline'> mark complete
          <input type='hidden' name='task_id' value='".$row["id"]."'>
          <input type='checkbox' onchange='this.form.submit()'>
          </form>
          
        </div> \n";
      }
        
      ?>
    
</body>
</html>

