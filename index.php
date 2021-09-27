<?php
require "./admin/class_function/application.php";
$obj_application = new Application();

ob_start();
//session_start();
$_SESSION['name'] ='abudaud';
if(!isset($_SESSION['price'] )){
    $_SESSION['price'] = 0;
    $_SESSION['items'] = 0;
}
if(!isset($_SESSION['items'] )){
    
    $_SESSION['items'] = 0;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php 
        if(isset($pages)){
            echo $pages;
        }else echo'Home';
         ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/front_ent_assets/css/bootstrap.css" rel="stylesheet" />
    <!-- Customize styles -->
    <link href="assets/front_ent_assets/style.css" rel="stylesheet" />
    <!-- font awesome styles -->
    <link href="assets/front_ent_assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

    <!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/front_ent_assets/ico/favicon.ico">
</head>

<body>
    <!-- 
	Upper Header Section 
-->
    <?php
    include 'includes/navbar_top.php';
    
?>

    <!--
Lower Header Section 
-->
    <div class="container">
        <div id="gototop"> </div>
        
        <?php include 'includes/header.php'; ?>
        
        <?php include'includes/navbar.php'; ?>
        
        <div class="row">
            
            
            <?php
            if(isset($pages)){
            if($pages == 'Contact'){
                include 'pages/contact.php';
            }else if($pages== 'Cart'){
                include 'pages/cart.php';
            }else if($pages== 'Checkout'){
                include 'pages/checkout.php';
            }else{
                
                include 'includes/sidebar.php';
            
            
                if ($pages == 'Home'){
                    include 'pages/home.php';
                }
                else if($pages == 'Register'){
                    include 'pages/register.php';
                }else if($pages == 'Product'){
                    include 'pages/product.php';
                }else if($pages == 'Product Details'){
                    include 'pages/product_details.php';
                }else if($pages == 'Shipping'){
                    include 'pages/shipping.php';
                }else if($pages == 'Payment Page'){
                    include 'pages/payment_page.php';
                }
               
            }
            }else{
                include 'includes/sidebar.php';
                include 'pages/home.php';
            }
            
            
            
            ?>
        </div>
        <!-- 
    Clients 
    -->
        <?php include 'includes/our_client_section.php'?>

        <!--
    Footer
    -->
        <?php include'includes/footer.php';?>
    </div><!-- /container -->
    <?php include'includes/copyright.php'; ?>
    <a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    
    
    <script src="assets/front_ent_assets/js/jquery.js"></script>
    <script src="assets/front_ent_assets/js/bootstrap.min.js"></script>
    <script src="assets/front_ent_assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/front_ent_assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/front_ent_assets/js/shop.js"></script>
</body>

</html>