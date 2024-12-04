<!-- submit.php -->
<?php
// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate the form data
    $errors = [];

    if (empty($first_name)) {
        $errors[] = "First Name is required.";
    }

    if (empty($last_name)) {
        $errors[] = "Last Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid Email is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // If there are no errors, display success message with user details (excluding password)
    if (empty($errors)) {
        echo "<h1>Registration Successful!</h1>";
        echo "<p><strong>First Name:</strong> $first_name</p>";
        echo "<p><strong>Last Name:</strong> $last_name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
    } else {
        // Display errors if validation failed
        echo "<h1>There were some errors with your submission:</h1>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo '<p><a href="register.php">Go back to registration form</a></p>';
    }
} else {
    // If the form is not submitted via POST, redirect back to the registration form
    header("Location: register.php");
    exit();
}
?>
