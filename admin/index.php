<?php

session_start();
//unset($_SESSION['admin_name']);
// echo $_SESSION['admin_name'];
if(isset($_SESSION['admin_id'])){
    header('Location: home.php');
}


if(isset($_POST['btn'])){
    
    require 'class_function/admin.php';
    $obj_admin = new Admin();
    $obj_admin->admin_login_check();
   
}



?>


<!DOCTYPE html>

<html lang="utf-8">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewprot" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/admin_assets/css/login_style.css">
    </head>
    <body>
        <div class="main_contain">
        <div class="row">
            <div class="span_1">&nbsp;</div>
            <div class="span_2">
                <h3>Login To Your Account</h3>
                <hr/>
            </div>
            <div class="span_3">
                <form action="" method="post">
                    <div class="form_span_1">
                        <div class="in_name">Email Address</div>
                        <div class="in_value">
                            <input type="email" name="email_address" placeholder="Your Email-Address">
                        </div>
                        
                      
                        <div class="in_name">Password</div>
                        <div class="in_value">
                            <input type="password" name="password" placeholder="Your Password">
                        </div>
                  
                    </div>
                    
                    <div class="form_span_3">
                        <input type="checkbox"><span>Remeber Password?</span>
                    </div>
                    <div class="form_span_4">
                        <div class="btn">
                            <input type="submit" value="login" name="btn">
                                
                        </div>
                    </div>
                </form>
            
            </div>
            <div class="span_2">
               <h4><a href="#">forget password?</a>clike here</h4>
                <hr/>
            </div>
        </div>
                 
    </div>

    </body>
</html>