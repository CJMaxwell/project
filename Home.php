<?php
    //require 'connect.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            //connect to database
            $con = new mysqli('localhost','root','','lil_dreams');
            
            $get_data = "SELECT * FROM users";
            $show_data = mysqli_query($con,$get_data); 
            while($result_data = mysqli_fetch_assoc($show_data)){
           
        ?>
        <div>
            <strong>Username:</strong><span><?php echo $result_data['userName']; ?></span><br>
            <strong>Phone number:</strong><span><?php echo $result_data['phoneNumber']; ?></span><br>
            <br>
        </div>
            <?php } ?>
    </body>
</html>    