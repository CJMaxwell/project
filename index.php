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
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <script src="bootstrap-3/jquery/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="bootstrap-3/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="index.js" type="text/javascript"></script>
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
                        <div id="firstPage">
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
                            <input id="next_btn1" onclick="next_step1()" type="button" value="Next">
                        </div>
                        <div id="secondPage">
                            <div class="form-group">
                                <label class="control-label">Skill</label>
                                <input type="text" name="skill" class="form-control" placeholder="E.g Mechanic, Plumber, et.c" required="required"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea value="description" class="form-control" placeholder="I am an Automobile Mechanic with over 9years of experience..." required="required"></textarea>
                            </div>
                            <input id="pre_btn1" onclick="prev_step1()" type="button" value="Previous">
                             <input id="next_btn2" onclick="next_step2()" type="button" value="Next">
                        </div>
                        <div id="thirdPage">
                            <div id="img">
                                <input type="file" onchange='previewFile(event)'>
                                <img src="" id="upload" height="100" width="100" alt='Image preview'>
                            </div>
                            <input id="pre_btn2" onclick="prev_step2()" type="button" value="Previous">
                            <input type="submit" value="Register" name="register" class="">
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
        
    </body>
</html>
