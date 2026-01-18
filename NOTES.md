

### Learning points
- What is PDO? PHP Database Objects= acts as an abstraction layer between php and the database of choice.
- 
### Database connections
- Each database has a different connection method.
- e.g $conn= new PDO("mysql: host=$host; dbname=$dbname", $username, $password);
- $conn= new PDO("sqlite3:my/database/path/database.db");
- $conn= new PDO("pgsql:host=$host; dbname=$dbname", $username, $password);

### handling errors
- PDOs use exceptions to handle errors, so everything with pdos should be wrapped in a try except block
- You can force PDO into one of three error modes by setting the error mode attribute on your newly created database handle.
- $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT ); = default error mode. In this mode, you'll have to check for errors.
- $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); = This mode will issue a standard PHP warning and allow the program  to continue execution. Useful for debugging.
- $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); = It fires an exception, allowing you to handle errors gracefully and hide data that might help someone exploit your system.
- No matter what error mode you set, an error connecting will always produce an exception
- $conn -> setattribute(PDO::ATRR_ERRMODE, PDO::ERRMODE_EXCEPTION)
- The exception sends the details of the error to a log file and displays a friendly message to the user.

#### Querying the db
- $sth=statement handle
- $sth=$conn->prepare("SELECT * FROM tasks);
- $sth=$conn->prepare("INSERT INTO tasks (task_name) VALUES (value1, value2)");
- $sth=$conn->prepare("UPDATE tasks SET column1=value1 WHERE condition");
- $sth=$conn->prepare("DELETE * FROM tasks");
-$sth->excecute();

#### Prepared statements
- A prepared statement is a pre-compiled SQL statement that can be executed multiple times by sending just the data to the server.
- You use a prepared statement by including placeholders in your SQL.
- no placeholders - ripe for SQL Injection! 
    * $STH = $DBH->prepare("INSERT INTO folks (name, addr, city) values ($name, $addr, $city)"); 
- unnamed placeholders 
   * $STH = $DBH->prepare("INSERT INTO folks (name, addr, city) values (?, ?, ?)");
- named placeholders 
   * $STH = $DBH->prepare("INSERT INTO folks (name, addr, city) values (:name, :addr, :city)");
- named placeholders start with a colon
- its easier to use unnamed and named paceholders with data stored in an array or associative array
- the keys of the associative array need to match the named placeholders
- Another nice feature of named placeholders is the ability to insert objects directly into your database, assuming the properties    match the named fields. 

#### Fetching data
- data is fetched using the ->fetch() method
- $STH->setFetchMode(PDO::FETCH_ASSOC);
- Before calling fetch, it's best to tell PDO how you'd like the data to be fetched. You have the following options:
    PDO::FETCH_ASSOC: returns an array indexed by column name.
    PDO::FETCH_BOTH (default): returns an array indexed by both column name and number.
    PDO::FETCH_BOUND: assigns the values of your columns to the variables set with the ->bindColumn() method.
    PDO::FETCH_CLASS: assigns the values of your columns to properties of the named class. It will create the properties if matching properties do not exist.
    PDO::FETCH_INTO: updates an existing instance of the named class.
    PDO::FETCH_LAZY: combines PDO::FETCH_BOTH/PDO::FETCH_OBJ, creating the object variable names as they are used.
    PDO::FETCH_NUM: returns an array indexed by column number.
    PDO::FETCH_OBJ: returns an anonymous object with property names that correspond to the column names.

#### Superglobal arrays
- $_POST- a superglobal array provided by php. Its available in every scope.
- Its populated by php when the request method is POST.
- the request body is parsed by php into an associative array where keys = form name attributes , values= user input.

- $_GET is filled from the query string

## Start building
- Composer init - to create the json file
- composer require: vlucas/phpdotenv
- use sqlite db file = todos.db
- write a pdo connection script or database configuration = dbConfig.php
- create the first table= tasks
- write script file to add a task to db(
     - a connection
     - the query
     - html form
)
- Browser -> Web Server-> PHP -> Database