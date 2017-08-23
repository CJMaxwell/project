<?php 
/* Main page with register form */
require 'connect.php';
session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="bootstrap-3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap-3/jquery/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="bootstrap-3/js/bootstrap.min.js" type="text/javascript"></script>
        <style>
            input[type=text]:focus,input[type=text]:hover,input[type=password]:hover,input[type=password]:focus,
            input[type=email]:hover,input[type=email]:focus{
                background-color:#e7e7e7;
                border:1px solid steelblue;
                
            }
        </style>
    </head>
    <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
    <body>
        <div class="container">
            <div class="row col-md-12">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="post" action="connect.php" role="form">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" name="User" class="form-control" placeholder="username" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input type="text" name="mobile" class="form-control" placeholder="mobile phone number" required="required"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" required="required"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" value="Register" name="register" class="btn btn-block btn-primary">
        
                        </div>                
                    </form>
                    
                </div>
            </div>
            
        </div>
        
    </body>
</html>
