<!DOCTYPE html>
<html>
	<head>
		<title>Tables</title>
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

		<h2>Project Table</h2>
		<table>
			<thead>
				<tr>
					<th>PROJNO</th>
					<th>PROJNAME</th>
					<th>DEPTNO</th>
					<th>STARTDATE</th>
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
				$sql = "SELECT * FROM project";
				$result = $conn->query($sql);

				// Loop through the rows of data and output them in the table
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["PROJNO"] . "</td>";
						echo "<td>" . $row["PROJNAME"] . "</td>";
						echo "<td>" . $row["DEPTNO"] . "</td>";
						echo "<td>" . $row["STARTDATE"] . "</td>";
						echo "</tr>";
					}
				} else {
					echo "0 results";
				}

				$conn->close();
				?>
			</tbody>
		</table>

		<h2>Supervision Table</h2>
		<table>
			<thead>
				<tr>
					<th>EMPNO</th>
					<th>MGRNO</th>
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
			  $sql = "SELECT * FROM supervision";
			  $result = $conn->query($sql);
  
			  // Loop through the rows of data and output them in the table
			  if ($result->num_rows > 0) {
				  while($row = $result->fetch_assoc()) {
					  echo "<tr>";
					  echo "<td>" . $row["EMPNO"] . "</td>";
					  echo "<td>" . $row["MGRNO"] . "</td>";
					  echo "</tr>";
				  }
			  } else {
				  echo "0 results";
			  }
  
			  $conn->close();
			  ?>
		  </tbody>
	  </table>
	  <h2>Works On Table</h2>
	<table>
		<thead>
			<tr>
				<th>EMPNO</th>
				<th>PROJNO</th>
				<th>HOURS</th>
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
			$sql = "SELECT * FROM works_on";
			$result = $conn->query($sql);

			// Loop through the rows of data and output them in the table
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["EMPNO"] . "</td>";
					echo "<td>" . $row["PROJNO"] . "</td>";
					echo "<td>" . $row["HOURS"] . "</td>";
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
</html>



