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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ename = $_POST["ename"];
	$job = $_POST["job"];
	$mgr = $_POST["mgr"];
	$hiredate = $_POST["hiredate"];
	$sal = $_POST["sal"];
	$comm = $_POST["comm"];
	$deptno = $_POST["deptno"];
  
	// Prepare SQL statement
	$stmt = $conn->prepare("INSERT INTO employee (ENAME, JOB, MGR, HIREDATE, SAL, COMM, DEPTNO) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssisddi", $ename, $job, $mgr, $hiredate, $sal, $comm, $deptno);
  
	// Execute statement
	if ($stmt->execute() === TRUE) {
	  echo "New employee added successfully";
	} else {
	  echo "Error: " . $stmt->error;
	}
  
	$stmt->close();
  }
 
$conn->close();
?>

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
	    <title>Add Employee</title>
    </head>
	<body>
		<nav>
			<a href="employee.php">Employee Table</a>
			<a href="department.php">Department Table</a>
			<a href="alt_tables.php">Other Tables</a>
			<a href="add_employee.php">Add Employee</a>
			<a href="add_department.php">Add Department</a>
			<a href="queries.php">Queries</a>
		</nav>
	<h2>Add Employee</h2>
	<form action="add_employee.php" method="POST">
		<label for="ename">Name:</label>
		<input type="text" name="ename" required>
		<br>
		<label for="job">Job:</label>
		<input type="text" name="job" required>
		<br>
		<label for="mgr">Manager:</label>
		<input type="number" name="mgr">
		<br>
		<label for="hiredate">Hire Date:</label>
		<input type="date" name="hiredate" required>
		<br>
		<label for="sal">Salary:</label>
		<input type="number" name="sal" required>
		<br>
		<label for="comm">Commission:</label>
		<input type="number" name="comm">
		<br>
		<label for="deptno">Department Number:</label>
		<input type="number" name="deptno" required>
		<br>
		<input type="submit" value="Add Employee">
	</form>
</body>
</html>
