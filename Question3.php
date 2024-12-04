


<?php



/*
wrtie a PHP program to fetch employee data from staff table  where
 a. the department is "Sales" and the salary is greater than $4000
 b. use the ORDER BY clause to sort the result by salary in ascending  openssl_decrypt
  c. group the result by department using GROUP BY clause
  and display the total number of employee in each department


*/

// Database connection parameters
$servername = "localhost";
$username = "root"; // Default username for XAMPP MySQL
$password = "";     // Default password is empty for XAMPP MySQL
$dbname = "group"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch employee data
$sql = "
    SELECT department, COUNT(*) AS total_employees, name, salary 
    FROM staff 
    WHERE department = 'Sales' AND salary > 4000 
    GROUP BY department 
    ORDER BY salary ASC
";

// Execute the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the data
    echo "<h3>Sales Department Employees with Salary > 4000</h3>";
    echo "<table border='1'>
            <tr>
                <th>Department</th>
                <th>Employee Name</th>
                <th>Salary</th>
            </tr>";

    // Loop through the results and display them
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['department'] . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['salary'] . "</td>
              </tr>";
    }

    // Display the total number of employees in the Sales department
    $result->data_seek(0); // Move back to the first row to count employees
    $totalEmployees = $result->num_rows;
    echo "</table><br>";
    echo "Total number of employees in Sales Department with salary > 4000: $totalEmployees";
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>
