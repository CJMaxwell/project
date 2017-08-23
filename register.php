<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
//$_SESSION['username'] = $_POST['username'];
//$_SESSION['mobile'] = $_POST['phoneNumber'];
//$_SESSION['password'] = $_POST['password'];

if(isset($_POST['submit'])){
// Escape all $_POST variables to protect against SQL injections
    $username = $mysqli->escape_string($_POST['username']);
    $mobile = $mysqli->escape_string($_POST['mobile']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that phone number already exists
    $result = $mysqli->query("SELECT * FROM users WHERE mobile='$mobile'") or die($mysqli->error());

// We know user phone number exists if the rows returns are more than 0
    if ( $result->num_rows > 0 ) {
    
        $_SESSION['message'] = 'User with this phone number already exists!';
        header("location: error.php");
    
    }
    else { // Phone number doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
        $sql = "INSERT INTO users (userName, phoneNumber, passWord, hash) 
            VALUES ('$username','$mobile','$password', '$hash')";

    // Add user to the database
        if ( $mysqli->query($sql) ){

            $_SESSION['active'] = 1; //0 until user activates their account with verify.php
            $_SESSION['logged_in'] = true; // So we know the user has logged in
            $_SESSION['message'] = "Registration successful";
            header("location: profile.php"); 

        }

        else {
            $_SESSION['message'] = 'Registration failed!';
            header("location: error.php");
        }

    }
}