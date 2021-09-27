<?php
session_start();
$admin_id = $_SESSION['admin_id'];
if($admin_id == NULL){
    header('Location: index.php');
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php
        if(isset($pages)){
            echo $pages;
        }
        else {
           echo 'Home';}
        ?></title>
    <meta name="viewprot" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/admin_assets/css/style.css">
    
    <?php include'class_function/js_function.php' ?>
</head>

<body>
    <div class="main_container">
        <?php include 'includes/navbar.php'?>
        <div class="row_1">
            <?php include'includes/manubar.php';?>
            <?php 
            if(isset($pages)){
               if($pages == 'dashbord'){
                    include 'pages/dashbord.php';
                  
               }
                else if($pages == 'Add Category'){
                    include 'pages/add_category.php';
                }else if($pages == 'Manage Category'){
                    include 'pages/manage_category.php';
                }else if($pages == 'Add_manufacture'){
                    include 'pages/add_manufacture.php';
                }else if($pages == 'Manage Manufacture'){
                    include 'pages/manage_manufacture.php';
                }else if($pages == 'dropdown'){
                    include 'pages/dropdown.php';
                }else if($pages == 'Add Product'){
                    include 'pages/add_product.php';
                }else if($pages == 'Manage Product'){
                    include 'pages/manage_product.php';
                }else if($pages == 'charts'){
                    include 'pages/charts.php';
                }else if($pages == 'Edit'){
                    include 'pages/edit.php';
                }else if($pages == 'Manufacture Edit'){
                    include 'pages/manufacture_edit.php';
                }
                else if($pages == 'Product Edit'){
                    include 'pages/product_edit.php';
                }else if($pages == 'Product View'){
                    include 'pages/product_view.php';
                }
                
                    
                
            }else{
                include 'pages/dashbord.php';
            }
            ;?>
        </div>
        <?php include 'includes/footer.php'?>
    </div>
</body>

</html>