<?php 





function view_published_category_product($category_id){
    $connection = db_select('db_admin_master');
    
    $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 AND deletion_status = 1 AND category_id = $category_id";
    
    if(mysqli_query($connection,$sql)){
        $resource_id = mysqli_query($connection, $sql);
        return $resource_id;
    }else{
        die('Your Query problem'.mysqli_error($connection));
    }
}

function product_details($product_id){
    $connection = db_select('db_admin_master');
    
    $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 AND deletion_status = 1 AND product_id = $product_id";
    
    if(mysqli_query($connection,$sql)){
        $resource_id = mysqli_query($connection, $sql);
        return $resource_id;
    }else{
        die('Your Query problem'.mysqli_error($connection));
    }
    
}

function product_related($category_id){
    $connection = db_select('db_admin_master');
    
    $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 AND deletion_status = 1 AND category_id = $category_id";
    
    if(mysqli_query($connection,$sql)){
        $resource_id = mysqli_query($connection, $sql);
        return $resource_id;
    }else{
        die('Your Query problem'.mysqli_error($connection));
    }
}

function save_cart_product_info($data,$product_details_info){
//   echo "<pre>";
//    print_r($product_details_info);
//    print_r($data);
//    exit();
    $session_id = session_id();
//    echo $session_id;
    $connection = db_select('db_shop_cart');
    $sql = "INSERT INTO tbl_temp_cart(product_id,session_id,product_name,product_image,product_price,product_quantity) VALUES('$product_details_info[product_id]','$session_id','$product_details_info[product_name]','$product_details_info[product_image]','$product_details_info[product_price]','$data[product_quantity]')";
    if(mysqli_query($connection,$sql)){
        header("LOCATION:cart.php");
    }else{
        die('Your Query problem'.mysqli_error($connection));
    }
    
}

function view_cart_product(){
    $session_id = session_id();
    $connection = db_select('db_shop_cart');
    $sql = "SELECT * FROM tbl_temp_cart WHERE session_id = '$session_id'";
    if(mysqli_query($connection,$sql)){
        $resource_id = mysqli_query($connection, $sql);
        return $resource_id;
    }else{
        die('Your Query problem'.mysqli_error($connection));
    }
}





