<?php
require_once __DIR__ . '/mysqlDbConfig.php';

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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Inertiabreaker</title>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    
    <!-- Header -->
    <div class="bg-slate-800 border-b border-slate-700 py-6 mb-8">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-purple-400">INERTIABREAKER</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4">
        
        <!-- Back Button -->
        <div class="mb-6">
            <a href="/" class="inline-block bg-slate-700 hover:bg-slate-600 text-white px-6 py-3 rounded-lg font-semibold transition">
                Go Back
            </a>
        </div>

        <!-- Edit Task Form -->
        <div class="bg-slate-800 rounded-lg shadow-xl p-6 border border-slate-700">
            <h2 class="text-2xl font-semibold text-purple-300 mb-6">Edit Task</h2>
            
            <form action='/src/editTask.php' method='post' class="space-y-4">
                <input type='hidden' name='task_id' value='<?=$task["id"]?>'>
                
                <!-- Title Input -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Task</label>
                    <input 
                        type='text' 
                        name='title' 
                        id='title'
                        value='<?= htmlspecialchars($task["title"])?>'
                        class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                    >
                </div>

                <!-- Priority and Due Date Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Priority -->
                    <div>
                        <label for="priority" class="block text-sm font-medium text-gray-300 mb-2">Priority:</label>
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

                    <!-- Due Date -->
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-300 mb-2">Due date:</label>
                        <input 
                            type="date" 
                            name="due_date" 
                            id="due_date"
                            value='<?= htmlspecialchars($task["due_date"])?>' 
                            required
                            class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-purple-500"
                        >
                    </div>
                </div>

                <!-- Submit Button -->
                <button 
                    type='submit'
                    class="w-full bg-purple-500 hover:bg-purple-600 text-white font-semibold py-3 px-6 rounded-lg transition"
                >
                    Save Task
                </button>
            </form>
        </div>
        
    </div>
    
</body>
</html>