<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "sql_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $deptno = $_POST["deptno"];
    $dname = $_POST["dname"];
    $loc = $_POST["loc"];
    if (empty($deptno) || empty($dname) || empty($loc)) {
        echo "Please fill out all fields.";
    } else {
        // Insert data into database
        $sql = "INSERT INTO dept (DEPTNO, DNAME, LOC) VALUES ('$deptno', '$dname', '$loc')";
        if (mysqli_query($conn, $sql)) {
            echo "Department added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
			nav {
				background-color: #333;
				overflow: hidden;
			}
			nav a {
				float: left;
				color: white;
				text-align: center;
				padding: 14px 16px;
				text-decoration: none;
				font-size: 18px;
			}
			nav a:hover {
				background-color: #ddd;
				color: black;
			}
		</style>
    <title>Add Department</title>
</head>
    <body>
        <nav>
            <a href="employee.php">Employee Table</a>
            <a href="department.php">Department Table</a>
            <a href="alt_tables.php">Other Tables</a>
            <a href="add_employee.php">Add Employee</a>
            <a href="add_department.php">Add Department</a>
            <a href="queries.php">Queries</a>
            <a href="mongo.php">Mongo</a>
        </nav>
    <h1>Add Department</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="deptno">Department Number:</label>
        <input type="number" name="deptno"><br><br>
        <label for="dname">Department Name:</label>
        <input type="text" name="dname"><br><br>
        <label for="loc">Location:</label>
        <input type="text" name="loc"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>