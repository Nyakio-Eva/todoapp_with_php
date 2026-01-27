# Todo App with PHP

A simple task management application built using **PHP**, **MySQL**, and **Composer**.  
The app supports full CRUD operations for tasks and includes a **Recycle Bin** feature that allows users to restore deleted tasks instead of permanently removing them.

---

## Features

### Core Functionality
- Create a task
- View tasks on a dashboard
- Edit an existing task
- Mark tasks as completed or pending
- Delete a task

### Bonus Feature
- **Recycle Bin**
  - Deleted tasks are soft-deleted
  - Users can view deleted tasks
  - Users can restore tasks from the recycle bin

---

## User Stories
- A user can create a task
- A user can edit a task
- A user can mark a task as completed
- A user can view tasks on a dashboard
- A user can delete a task
- A user can restore deleted tasks

---

## Tech Stack
- PHP (Vanilla PHP)
- MySQL
- Composer
- HTML / CSS

---

## Database Design

### Tables
- `users` (reserved for future authentication)
- `tasks`

### Tasks Table (example fields)
- `id`
- `title`
- `is_completed`
- `deleted_at`
- `created_at`
- `updated_at`

---

## Relationships
- A user can have many tasks (planned for future)
- A task belongs to a user (planned for future)

---

## Prerequisites

Make sure you have the following installed on your machine:

- PHP 8.x
- MySQL
- Composer
- A web server (Apache, Nginx, or PHP built-in server)
- Git

---

## How to Run the Project Locally

### 1. Clone the repository
```bash
git clone https://github.com/your-username/todoapp_with_php.git
cd todoapp_with_php
```

### 2. Install dependencies
```bash
composer install
```

### 3. Set up the database
- Create a MySQL database (e.g. `todo_app`)
- Import the SQL schema provided in the project (or create the `tasks` table manually)
- Update database credentials in the configuration file

Example:
```php
DB_HOST=localhost
DB_NAME=todo_app
DB_USER=root
DB_PASSWORD=
```

### 4. Start the application
Using PHP’s built-in server:
```bash
php -S localhost:8000
```

Or place the project inside your web server’s root directory (`htdocs` or `www`).

### 5. Access the app
Open your browser and visit:
```
http://localhost:8000
```

---

## Future Improvements
- User authentication and authorization
- User-specific tasks
- Permanent delete option
- Task search and filtering
- Improved UI/UX

---

## License
This project is for learning and practice purposes.
