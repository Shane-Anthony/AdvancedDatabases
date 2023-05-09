<!DOCTYPE html>
<html>
	<head>
		<title>Queries</title>
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
			table {
				border-collapse: collapse;
				width: 100%;
			}
			th, td {
				text-align: left;
				padding: 8px;
				border-bottom: 1px solid #ddd;
			}
			th {
				background-color: #f2f2f2;
			}
		</style>
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
	<h1>Queries</h1>
	
	<h2>Department with Highest Average Salary</h2>
	<table>
		<thead>
			<tr>
				<th>Department Name</th>
				<th>Average Salary</th>
			</tr>
		</thead>
		<tbody>
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

			// SQL query to fetch data from the table
			$sql = "SELECT d.DNAME, AVG(e.SAL) AS average_salary FROM employee e INNER JOIN DEPT d ON e.DEPTNO = d.DEPTNO GROUP BY d.DNAME ORDER BY average_salary DESC LIMIT 1";
			$result = $conn->query($sql);

			// Loop through the rows of data and output them in the table
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["DNAME"] . "</td>";
					echo "<td>" . $row["average_salary"] . "</td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

			$conn->close();
			?>
		</tbody>
	</table>
	
	<h2>Employees Hired Before 1982</h2>
	<table>
		<thead>
			<tr>
				<th>EMPNO</th>
				<th>ENAME</th>
				<th>HIREDATE</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$servername = "localhost";
			$username = "username";
			$password = "password";
			$dbname = "sql_database";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname, 3307);

			// Checkconnection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
            // SQL query to fetch data from the table
            $sql = "SELECT * FROM employee WHERE HIREDATE < '1982-01-01'";
            $result = $conn->query($sql);
    
            // Loop through the rows of data and output them in the table
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["EMPNO"] . "</td>";
                    echo "<td>" . $row["ENAME"] . "</td>";
                    echo "<td>" . $row["HIREDATE"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
    
            $conn->close();
            ?>
        </tbody>
    </table>
    
    <h2>Average Salary of All Employees</h2>
    <table>
        <thead>
            <tr>
                <th>Average Salary</th>
            </tr>
        </thead>
        <tbody>
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
    
            // SQL query to fetch data from the table
            $sql = "SELECT AVG(SAL) AS average_salary FROM employee";
            $result = $conn->query($sql);
    
            // Loop through the rows of data and output them in the table
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["average_salary"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
    
            $conn->close();
            ?>
        </tbody>
    </table>
    </body>
</html>