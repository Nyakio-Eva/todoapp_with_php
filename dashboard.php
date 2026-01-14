<?php
require_once __DIR__. '/dbConfig.php';

$sql=$connection->query("SELECT COUNT(*) AS total FROM tasks");
$total_tasks=$sql->fetch(PDO::FETCH_ASSOC)['total'];


$sql=$connection->query("SELECT COUNT(*) AS completed FROM tasks WHERE is_complete=1");
$result=$sql->fetch(PDO::FETCH_ASSOC)['completed'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inertiabreaker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="">
     <h3>MY TASKS DASHBOARD</h3>
    </div>
    
   <div class="container">
    <a href="#" class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">All Tasks</h5>
       <h4 class="mb-3 text-2xl text-purple-500 font-semibold tracking-tight text-heading leading-8"><?=  $total_tasks?></h4>
    </a>
    <a href="#" class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Completed Tasks</h5>
         <h4 class="mb-3 text-2xl text-purple-500 font-semibold tracking-tight text-heading leading-8"><?=  $result?></h4>
    </a>
    <a href="#" class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Deleted Tasks</h5>
        
    </a>
   </div>
   <div>
    view tasks here based on the click of stats 
   </div>

    
</body>
</html>