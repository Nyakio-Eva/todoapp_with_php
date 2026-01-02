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
        
        echo "<form>
         <label>" . $row["title"] . "</label> 
          <button>edit</button>
          mark complete
          <input type='checkbox'>
          <button>delete</button>
        </form> \n";
      }
        
      ?>
    
</body>
</html>

