
<?php



/*Using PHPMyAdmin , create a database school_management with a table students 
containing the following fields : id,first_name, last_name,age, and grade.
Write a PHP program to connect to this database and fetch all records from the 
students table using a MySQL query . display the data in an html table
explain the steps taken in PHPMyAdmin to create the database and the table*/




// Step 1: Connect to the database
$servername = "localhost"; // or the appropriate server address
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "schoolmanagement"; // the name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Fetch records from the 'students' table
$sql = "SELECT id, first_name, last_name, age, grade FROM students";
$result = $conn->query($sql);

// Step 3: Display the records in an HTML table
if ($result->num_rows > 0) {
    // Start the table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Grade</th>
            </tr>";
    
    // Output each row of data
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["first_name"]. "</td>
                <td>" . $row["last_name"]. "</td>
                <td>" . $row["age"]. "</td>
                <td>" . $row["grade"]. "</td>
              </tr>";
    }
    // End the table
    echo "</table>";
} else {
    echo "0 results found.";
}

// Step 4: Close the connection
$conn->close();
?>
