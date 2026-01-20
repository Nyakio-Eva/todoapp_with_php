<?php
require_once __DIR__ . '/mysqlDbConfig.php';

$tasks="SELECT * FROM tasks WHERE deleted_at= NULL";

$sql=$connection->query($tasks);


$sql->setFetchMode(PDO::FETCH_ASSOC);

$allTasks=$sql->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inertiabreaker</title>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <div class=" py-6 mb-8">
        <div class="max-w-9xl mx-auto px-4">
            <h1 class="flex justify-center text-6xl text-heading font-bold text-purple-400 mb-4">INERTIABREAKER</h1>
            <div class="flex justify-end">
                <a href="/dashboard.php" class="bg-purple-500 px-8 py-3 text-white inline-block font-semibold rounded-lg hover:bg-purple-600 transition">
                    View Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4">
        
        <!-- Add Task Form -->
        <div class="bg-slate-800 rounded-lg shadow-xl p-6 mb-8 border border-slate-700">
            <form action="src/createTask.php" method="post" class="space-y-4">
                <input 
                    type="text" 
                    name="task" 
                    placeholder="new task" 
                    required
                    class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500"
                >
                
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label for="priority" class="block text-sm text-gray-300 mb-2">Priority:</label>
                        <select 
                            id="priority" 
                            name="priority" 
                            required
                            class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                            <option value="High">High</option>
                            <option value="Medium">Medium</option>
                            <option value="Low">Low</option>
                        </select>
                    </div>
                    
                    <div class="flex-1">
                        <label for="due_date" class="block text-sm text-gray-300 mb-2">Due date:</label>
                        <input 
                            type="date" 
                            name="due_date" 
                            required
                            class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                    </div>
                </div>
                
                <button 
                    type="submit"
                    class="w-full bg-purple-500 hover:bg-purple-600 text-white font-semibold py-3 px-6 rounded-lg transition"
                >
                    Add Task
                </button>
            </form>
        </div>

        <!-- Tasks List -->
        <div class="space-y-4">
            <?php
            foreach ($allTasks as $task){
                $completedTask=$task['is_complete'] ? 'text-decoration: line-through;' : '';
                $checked=$task['is_complete'] ? 'checked': '';
                $value=$task['is_complete'] ? 1:0;
                
                echo "<div class='bg-slate-800 rounded-lg p-6 border border-slate-700 hover:border-purple-500 transition'>
                    <div class='mb-4'>
                        <label style='{$completedTask}' class='text-lg font-semibold text-white'>" . htmlspecialchars($task["title"]) . "</label>
                    </div>
                    
                    <div class='flex gap-4 mb-4 text-sm'>
                        <label class='text-green-400'>priority: ". $task["priority"]."</label>
                        <label class='text-amber-400'>Due date: ". $task["due_date"]."</label>
                    </div>
                    
                    <div class='flex flex-wrap gap-2'>
                        <a href='/edit_task.php?id=".htmlspecialchars($task['id'])."' class='bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition inline-block'>Edit Task</a>

                        <form action='/src/updateTask.php' method='post' class='inline-block'> 
                            <input type='hidden' name='task_id' value='".$task["id"]."'>
                            <label class='flex items-center gap-2 bg-slate-700 hover:bg-slate-600 px-4 py-2 rounded-lg transition cursor-pointer'>
                                <input type='checkbox' {$checked} name='is_checked' value='{$value}' onchange='this.form.submit()' class='w-5 h-5'>
                                <span class='text-sm font-medium text-white'>mark complete</span>
                            </label>
                        </form>

                        <form action='/src/deleteTask.php' method='post' class='inline-block'>
                            <input type='hidden' name='task_id' value='".$task["id"]."'>
                            <button type='submit' class='bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition'>Delete Task</button>
                        </form>
                    </div>
                </div>\n";
            }
            ?>
        </div>
        
    </div>

    <footer class="bg-neutral-primary-soft rounded-base shadow-xs mt-4 flex justify-center ">
        <div class="">
          <span class="text-sm text-body sm:text-center">© 2026 <a href="/" class="hover:underline">InertiaBreaker™</a>. All Rights Reserved.
        </span>
        
        </div>
    </footer>

    
</body>
</html>