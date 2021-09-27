<?php
//session_start();
if(isset($_GET['status'])){
    require 'class_function/admin.php';
    $obj_admin = new Admin();
    unset($_SESSION['name']);
    $obj_admin ->admin_logout(); 
//    unset($_GET[status]);
    
}

 
?>

<div class="navbar">
    <div class="logo_text">
        <h3>Admip</h3>
    </div>
    <div class="profile">
       <div class="drop_btn"><span><?php echo $_SESSION['admin_name'];?></span></div>
        <div class="dropdown_content">
            <div class="text"><span>account settings
                </span></div>
            <div class="manu">
                <a href="#">Profile</a>
           <a href="?status=logout" onclick="return check_logout()">Logout</a>
            </div>
        </div>
    </div>
</div>