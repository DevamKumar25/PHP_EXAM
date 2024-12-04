<?php
/*
Questions = PHP program that demonstrates call-by-value by defining a function doubleValues() 
which accepts an array of numbers by value, doubles each number inside the function, and displays 
the modified array. After the function call, the original array is printed to show that the changes
 inside the function did not affect the original array.

*/


/*
Call by Value makes a copy of the data, so changes inside the function don't affect the original data.
Call by Reference passes the actual data to the function, so any changes made in the function directly affect the original data.

*/


// Define the function to double the values of the array elements
function doubleValues($arr) {
    // Loop through the array and double each value
    for ($i = 0; $i < count($arr); $i++) {
        $arr[$i] = $arr[$i] * 2;
    }
    // Display the modified array inside the function
    echo "Modified array inside function: ";
    print_r($arr);
    echo "<br>";
}

// Original array
$numbers = [1, 2, 3, 4, 5];

// Display the original array before the function call
echo "Original array before function call: ";
print_r($numbers);
echo "<br>";

// Call the function with the array
doubleValues($numbers);

// Display the original array after the function call
echo "Original array after function call: ";
print_r($numbers);
?>
