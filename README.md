# todoapp_with_php

### Crud app with a simple db

### User stories
- A user can create a task
- A user can edit a task
- A user can mark a task completed
- A user can view their tasks or a specific task
- A user can delete a task

### Endpoints
- GET/tasks
- GET/tasks/task{id}
- GET/completed_tasks
- POST/tasks/task{id}
- PUT/tasks/task{id}
- PATCH/tasks/task{id}
- DELETE/tasks/task{id}

### DB
- store tasks data in tables 
- users table
- tasks table
- completed tasks table

### Relationships
- A user has many tasks
- A user has one task

## User AUTH
- create account POST/user{id}
- Login to account GET/user{id}
- Delete account DELETE/user{id}

### Start building
- Composer init - to create the json file
- composer require: vlucas/phpdotenv
- use sqlite db file = todos.db
- write a pdo connection script or database configuration = dbConfig.php
- create the first table= tasks
- write script file to add a task to db

