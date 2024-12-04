<?php

// Initializing a multidimensional array representing 
//the weekly schedule for employees
$employees = [
    [
        "name" => "John Doe",
        "shift" => ["morning", "evening", "night", "morning", "evening", "night", "morning"],
        "hours" => [8, 6, 7, 8, 6, 7, 8]
    ],
    [
        "name" => "Jane Smith",
        "shift" => ["night", "morning", "evening", "night", "morning", "evening", "night"],
        "hours" => [7, 8, 6, 7, 8, 6, 7]
    ],
    [
        "name" => "Alice Johnson",
        "shift" => ["evening", "night", "morning", "evening", "night", "morning", "evening"],
        "hours" => [6, 7, 8, 6, 7, 8, 6]
    ]
];
// Function to calculate and display the total hours worked by each employee
function displayTotalHoursWorked($employees) {
    // Loop through each employee to calculate total hours worked
    foreach ($employees as $employee) {
        // Calculate the total hours for the week by summing the 'hours' array
        $totalHours = array_sum($employee['hours']);
        
        // Display the employee's name and their total hours worked for the week
        echo $employee['name'] . " worked a total of " . $totalHours . " hours this week.<br>";
    }
}

// Calling the function to display the total hours worked for each employee
displayTotalHoursWorked($employees);

?>

