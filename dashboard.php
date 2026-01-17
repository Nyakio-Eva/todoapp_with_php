<?php
require_once __DIR__. '/dbConfig.php';

$sql=$connection->query("SELECT COUNT(*) AS total FROM tasks");
$total_tasks=$sql->fetch(PDO::FETCH_ASSOC)['total'];

$sth=$connection->query("SELECT * FROM tasks");
$sth->setFetchMode(PDO::FETCH_ASSOC);
$all_tasks=$sth->fetchAll();


$sql=$connection->query("SELECT COUNT(*) AS completed FROM tasks WHERE is_complete=1");
$result=$sql->fetch(PDO::FETCH_ASSOC)['completed'];


$smt=$connection->query("SELECT * FROM tasks WHERE is_complete=1");
$smt->setFetchMode(PDO::FETCH_ASSOC);
$completed_tasks=$smt->fetchAll();


$sql_query=$connection->query("SELECT COUNT(*) AS incomplete FROM tasks WHERE is_complete=0");
$pending=$sql_query->fetch(PDO::FETCH_ASSOC)['incomplete'];


$dbc=$connection->query("SELECT * FROM tasks WHERE is_complete=0");
$dbc->setFetchMode(PDO::FETCH_ASSOC);
$incomplete_tasks=$dbc->fetchAll();

$view_tasks = htmlspecialchars($_GET['filter']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inertiabreaker</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900">
    <div class="text-white flex justify-center text-5xl font-bold p-20">
     <h3>MY TASKS DASHBOARD</h3>
    </div>
    
   <div class="container flex flex-row mx-auto gap-5 max-w-9xl justify-center">
    <a href="dashboard.php?filter=all" class="bg-white/20 block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-3xl font-semibold  text-white tracking-tight text-heading leading-8">All Tasks</h5>
       <h4 class="mb-3 text-2xl text-center text-purple-500 font-bold tracking-tight text-heading leading-8"><?=  $total_tasks?></h4>
    </a>   
   
    <a href="dashboard.php?filter=completed" class="bg-white/20 block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-3xl font-semibold text-white tracking-tight text-heading leading-8">Completed Tasks</h5>
        <h4 class="mb-3 text-2xl  text-center text-purple-500 font-bold tracking-tight text-heading leading-8"><?=  $result?></h4>
    </a>
    <a href="dashboard.php?filter=pending" class="bg-white/20 block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-3xl font-semibold text-white tracking-tight text-heading leading-8">Pending Tasks</h5>
        <h4 class="mb-3 text-2xl  text-center text-purple-500 font-bold tracking-tight text-heading leading-8"><?=  $pending?></h4>
    </a>
    <a href="#" class="bg-white/20 block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
        <h5 class="mb-3 text-3xl font-semibold text-white tracking-tight text-heading leading-8">Deleted Tasks</h5>
        
    </a>
   </div>
   <div class="container-fluid text-white py-20 px-10">
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-xl text-purple-500 text-heading">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-xl text-orange-500 text-heading">
                        Priority
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-xl text-red-500 text-heading">
                        Due Date
                    </th>
                </tr>
            </thead>
            <tbody>

             <?php
               if($all_tasks){
                filter_list();
               }elseif($completed_tasks){
                 filter_has_var(INPUT_GET, "is_complete=1");
               }else{
        
                filter_has_var(INPUT_GET, "is_complete=0");
               }

             ?>
                
            </tbody>
        </table>
    </div>

    view tasks here based on the click of stats 
   </div>

    
</body>
</html>