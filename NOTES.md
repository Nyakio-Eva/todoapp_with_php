
### Learning points
- What is PDO? PHP Database Objects= acts as an abstraction layer between php and the database of choice.
- 
### Database connections
- Each database has a different connection method.
- e.g $conn= new PDO("mysql: host=$host; dbname=$dbname;", $username, $password);
- $conn= new PDO("sqlite3:my/database/path/database.db");