


<?php

/*
PHP program that creates a simple registration form, implements server-side form validation, 
and ensures that the form retains the previously entered values if any validation fails. It validates the following:
The name is not empty.
The password is at least 8 characters long.
The email is in a valid format.
If any validation fails, appropriate error messages are displayed.

*/



//INTIALIZE ERROR MESSAGES AND FORM values

$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";

//Handle form submission

if($_SERVER["REQUEST_METHOD"]=="POST"){

    // Validate name (must not be empty)

    if(empty($POST["name"])){
        $nameErr = "Name is required.";
    }
    else{
        $name = test_input($_POST["name"]);
    }

 // Validate email (must be a valid email format)
 if (empty($_POST["email"])) {
    $emailErr = "Email is required.";
} else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
    }
}

    // validate password (at least 8 charcater long)

    if(empty($_POST["password"])){
        $passwordErr = "Password is required.";
    }
    else{
        $password = test_input($_POST["password"]);

        if(strlen($password)  < 8) {
            $passwordErr = "Password must be at least 8 character long.";

        }
    }


    // Function to clean input data

    function test_input($data){
        return htmlspecialchars(stripslashes(trim($data)));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>">
    <span style="color:red;"><?php echo $nameErr; ?></span><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php echo $email; ?>">
    <span style="color:red;"><?php echo $emailErr; ?></span><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>">
    <span style="color:red;"><?php echo $passwordErr; ?></span><br><br>

    <input type="submit" value="Register">
</form>

</body>
</html>
