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
   <div style="display:flex; justify-content:center; margin:10px;">
   <a href="/dashboard.php" style="background-color:purple; padding:10px 20px; color:white; text-decoration:none;" >View Dashboard</a>
   </div>
    
    <form action="src/createTask.php" method="post">
      <input type="text" name="task" placeholder="new task" required>
      <label for="priority">Priority:</label>
      <select id="priority" name="priority" required>
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
      </select>
      <label for="due_date">Due date:</label>
      <input type="date" name="due_date" required>
      <button type="submit">Add Task</button><br>
    </form>
   
    <br>
     <?php
      foreach ($allTasks as $task){
        $completedTask=$task['is_complete'] ? 'text-decoration : line-through;' : '';
        $checked=$task['is_complete'] ? 'checked': '';
        $value=$task['is_complete'] ? 1:0;
        
        echo "<div>
         <label style='{$completedTask}'>" . htmlspecialchars($task["title"]) . "</label>
         <label style='color:green'>priority: ". $task["priority"]."</label>
         <label style='color:brown'>Due date: ". $task["due_date"]."</label>
         <a href='/edit_task.php?id=".htmlspecialchars($task['id'])."' style='display:inline-block; padding:3px; border:1px solid #000000; text-decoration:none;'> Edit Task</a>

         <form action='/src/updateTask.php' method='post' style='display:inline'> mark complete
          <input type='hidden' name='task_id' value='".$task["id"]."'>
          <input type='checkbox' {$checked} name='is_checked' value='{$value}'  onchange='this.form.submit()'>
          </form>

         <form action='/src/deleteTask.php' method='post' style='display:inline'>
          <input type='hidden' name='task_id' value='".$task["id"]."'><button type='submit'>Delete Task</button>
          </form> 

        </div> \n";
      }
        
      ?>
    
</body>
</html>

