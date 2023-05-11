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

	<h2>Department Table</h2>
	<?php
		$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
		$departmentCollection = $mongoClient->Department;
		$departments = $departmentCollection->find();
		echo "<table>";
		echo "<tr><th>Department Name</th><th>Location</th></tr>";
		foreach ($departments as $department) {
			echo "<tr><td>" . $department->name . "</td><td>" . $department->location . "</td></tr>";
		}
		echo "</table>";
	?>

	<h2>Employee Table</h2>
	<?php
		$employeeCollection = $mongoClient->test->Employee;
		$employees = $employeeCollection->find();
		echo "<table>";
		echo "<tr><th>Name</th><th>Department</th><th>Salary</th></tr>";
		foreach ($employees as $employee) {
			echo "<tr><td>" . $employee->ENAME . "</td><td>" . $employee->DEPTNO . "</td><td>" . $employee->SAL . "</td></tr>";
		}
		echo "</table>";
	?>

	<h2>Queries</h2>
	<?php
		$employeesByDepartment = $employeeCollection->aggregate([
			[ '$group' => [ '_id' => '$DEPTNO', 'count' => [ '$sum' => 1 ] ] ]
		]);
		echo "<p>Number of employees by department:</p>";
		echo "<ul>";
		foreach ($employeesByDepartment as $employeeByDepartment) {
			echo "<li>Department " . $employeeByDepartment->_id . ": " . $employeeByDepartment->count . " employees</li>";
		}
		echo "</ul>";

		$projectsByEmployee = $employeeCollection->aggregate([
			[ '$unwind' => '$works_on' ],
			[ '$group' => [ '_id' => '$ENAME', 'count' => [ '$sum' => 1 ] ] ]
		]);
		echo "<p>Number of projects by employee:</p>";
		echo "<ul>";
		foreach ($projectsByEmployee as $projectByEmployee) {
			echo "<li>" . $projectByEmployee->_id . ": " . $projectByEmployee->count . " projects</li>";
		}
		echo "</ul>";
	?>

</body>
</html>
