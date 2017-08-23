<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    /*$server = "localhost";
    $username = "root";
    $password = "";
    $dbName = "lil_dreams";*/
    
if(isset($_POST['register'])){
    // Escape all $_POST variables to protect against SQL injections
    $user = htmlspecialchars($_POST['User']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $pass = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = htmlspecialchars( md5( rand(0,1000) ) );
      
    //connect to database
    $con = new mysqli('localhost','root','','lil_dreams');

    if($con->connect_error){
        die("Database connection failed " . $con->connect_error);
    }
    // Check if user with that phone number already exists
    $check = "SELECT * FROM users WHERE phoneNumber='$mobile'";

    // We know user exists if the rows returned are more than 0
    $res = mysqli_query($con,$check);
   $count = mysqli_num_rows($res);
   if($count!=0){
       echo "User already exists.";
        header("Location: error.php");
    }
    else { // Phone number doesn't already exist in a database, proceed...

        $sql = "INSERT INTO users (userName, phoneNumber, passWord, hash) 
            VALUES ('$user','$mobile','$pass', '$hash')";

        // Add user to the database
        $reslt=$con->query($sql);
        if($reslt==1){
            //$_SESSION['active'] = 1; //0 until user activates their account with verify.php
            //$_SESSION['logged_in'] = true; // So we know the user has logged in
            //$_SESSION['message'] = "Registration successful";
            echo " Registration successful";
            header("Location: profile.php"); 

        }

        else {
            //$_SESSION['message'] = 'Registration failed!';
            echo "Registration failed";
            header("Location: error.php");
        }

    }

// sql to create table
/*$sql = "CREATE TABLE users (
id INT(15) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
userName VARCHAR(30) NOT NULL,
phoneNumber VARCHAR(30) NOT NULL,
PassWord VARCHAR(300) NOT NULL,
hash VARCHAR(50) NOT NULL,
active BOOL NOT NULL DEFAULT 0
)";

if ($con->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $con->error;
}*/

   
//close connection to database
$con->close();
}
?>