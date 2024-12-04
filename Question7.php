<?php

/*
Develop a PHP program that proesses a User registration form
with fields for the first name, last name, email,password, and 
confirm password.Implement server-side validation to:
a. Ensure all fields are filled
b. Validate the email format.
c. check that the password is at least 8 characters,contains at 
list one Uppercase letter , one number and one special characters
d. Confirm that the password and confirm password field match.
if validation passes,display a success message, otherwise show 
detailed error messages for each field   

*/


// Initialize variables for form data and error messages
$firstName = $lastName = $email = $password = $confirmPassword = "";
$firstNameErr = $lastNameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";

// Function to sanitize input data
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate First Name
    if (empty($_POST["first_name"])) {
        $firstNameErr = "First name is required.";
    } else {
        $firstName = test_input($_POST["first_name"]);
        // Check if the name contains only letters and spaces
        if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
            $firstNameErr = "Only letters and spaces are allowed.";
        }
    }

    // Validate Last Name
    if (empty($_POST["last_name"])) {
        $lastNameErr = "Last name is required.";
    } else {
        $lastName = test_input($_POST["last_name"]);
        // Check if the name contains only letters and spaces
        if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
            $lastNameErr = "Only letters and spaces are allowed.";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = test_input($_POST["email"]);
        // Check if the email format is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required.";
    } else {
        $password = test_input($_POST["password"]);
        // Check if password meets the criteria
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long.";
        } elseif (!preg_match("/[A-Z]/", $password)) {
            $passwordErr = "Password must contain at least one uppercase letter.";
        } elseif (!preg_match("/[0-9]/", $password)) {
            $passwordErr = "Password must contain at least one number.";
        } elseif (!preg_match("/[\W_]/", $password)) {
            $passwordErr = "Password must contain at least one special character.";
        }
    }

    // Validate Confirm Password
    if (empty($_POST["confirm_password"])) {
        $confirmPasswordErr = "Please confirm your password.";
    } else {
        $confirmPassword = test_input($_POST["confirm_password"]);
        // Check if password and confirm password match
        if ($password !== $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match.";
        }
    }

    // If no errors, display success message
    if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>Welcome, $firstName $lastName!</p>";
        echo "<p>your password, $password!</p>";
        // Normally, you would store user data in a database here
        // For demo purposes, we just show the success message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <style>
        .error {color: red;}
        .success {color: green;}
    </style>
</head>
<body>
    
<h2>User Registration Form</h2>
<p><span class="error">* required field</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First Name: <input type="text" name="first_name" value="<?php echo $firstName;?>">
    <span class="error">* <?php echo $firstNameErr;?></span><br><br>

    Last Name: <input type="text" name="last_name" value="<?php echo $lastName;?>">
    <span class="error">* <?php echo $lastNameErr;?></span><br><br>

    Email: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span><br><br>

    Password: <input type="password" name="password" value="<?php echo $password;?>">
    <span class="error">* <?php echo $passwordErr;?></span><br><br>

    Confirm Password: <input type="password" name="confirm_password" value="<?php echo $confirmPassword;?>">
    <span class="error">* <?php echo $confirmPasswordErr;?></span><br><br>

    <input type="submit" name="submit" value="Register">
</form>

</body>
</html>
