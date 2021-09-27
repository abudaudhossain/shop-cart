<?php
session_start();
class Application{
    protected function db_select($db_name){
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
    //        $db_name = 'db_shop_cart';
        $con = mysqli_connect($hostname,$username,$password);
        if($con){
    //        echo 'Server is connected';
        //    $db_name = 'db_my_first_project';
            $select_db = mysqli_select_db($con,$db_name);
            if($select_db){
    //            echo' database select';
                return $con;
            }else{
                die('database select error'.mysqli_error($con));
            }
        }else{
            die('Server connected error'.mysqli_error($con));
        }
    }
    
    public function view_p_category(){
        $connection =$this -> db_select('db_admin_master');

        $sql = "SELECT * FROM tbl_add_category WHERE publication_status = 1 AND deletion_status = 1";

        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection,$sql);
    //                $product_info = mysqli_fetch_assoc($resource_id);


            return $resource_id;
        }else{
            echo "errro";

        }

    }
    
    public function view_published_product(){
        $connection = $this -> db_select('db_admin_master');

        $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 AND deletion_status = 1";

        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection, $sql);
            return $resource_id;
        }else{
            die('Your Query problem'.mysqli_error($connection));
        }
    }
//    public function view_published_product_latest(){
//        $connection = $this -> db_select('db_admin_master');
//        $last_product_id = mysqli_insert_id($connection);
//        echo $last_product_id;
//        exit();
//        
//        
//    }
//    
    public function view_published_category_product($category_id){
        $connection = $this -> db_select('db_admin_master');

        $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 AND deletion_status = 1 AND category_id = $category_id";

        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection, $sql);
            return $resource_id;
        }else{
            die('Your Query problem'.mysqli_error($connection));
        }
    }

    public function product_details($product_id){
        $connection = $this -> db_select('db_admin_master');

         $sql = "SELECT p.*, c.category_name,m.manufacture_name FROM tbl_product as p, tbl_add_category as c, tbl_manufacture as m WHERE p.category_id =c.add_category_id AND p.manufacture_id = m.manufacture_id AND p.deletion_status=1 AND product_id = $product_id";
        
//        $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 AND deletion_status = 1 AND product_id = $product_id";

        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection, $sql);
            return $resource_id;
        }else{
            die('Your Query problem'.mysqli_error($connection));
        }

    }

    public function product_related($category_id){
        $connection = $this -> db_select('db_admin_master');

        $sql = "SELECT * FROM tbl_product WHERE publication_status = 1 AND deletion_status = 1 AND category_id = $category_id";

        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection, $sql);
            return $resource_id;
        }else{
            die('Your Query problem'.mysqli_error($connection));
        }
    }

    public function save_cart_product_info($data,$product_details_info){
        $connection = $this -> db_select('db_shop_cart');
        $session_id = session_id();
        $product_id = $product_details_info['product_id'];
    //    echo $session_id;
        
         if($product_details_info['product_quantity'] > $data['product_quantity']){
            $sql1 = "SELECT * FROM tbl_temp_cart WHERE session_id = '$session_id' AND product_id = '$product_id'";
             $r =mysqli_query($connection,$sql1);
              if(mysqli_fetch_assoc($r)){
                  header("LOCATION:cart.php");
             }else{
       
        $sql = "INSERT INTO tbl_temp_cart(product_id,session_id,product_name,product_image,product_price,product_quantity) VALUES('$product_details_info[product_id]','$session_id','$product_details_info[product_name]','$product_details_info[product_image]','$product_details_info[product_price]','$data[product_quantity]')";
        if(mysqli_query($connection,$sql)){
            header("LOCATION:cart.php");
        }else{
            die('Your Query problem'.mysqli_error($connection));
        }
              }
         }
        else{
            echo '<script>
            
                alert("You have order equl or less then product quantity--");
            </script>';
        }

    }

    public function view_cart_product(){
        
        $session_id = session_id();
        $connection = $this -> db_select('db_shop_cart');
        $sql = "SELECT * FROM tbl_temp_cart WHERE session_id = '$session_id'";
        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection, $sql);
            return $resource_id;
        }else{
            die('Your Query problem'.mysqli_error($connection));
        }
    }
    public function quantity_update_m($data){
        $session_id = session_id();
        $connection = $this -> db_select('db_shop_cart');
        
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        $quantity --;
       if($quantity >= 0){
            $sql = "UPDATE tbl_temp_cart SET product_quantity ='$quantity' WHERE session_id ='$session_id' AND product_id ='$product_id' ";
        if(mysqli_query($connection,$sql)){
            header('Location:cart.php');
        }
       }    
    }
    public function quantity_update_p($data){
        $session_id = session_id();
        $connection = $this -> db_select('db_shop_cart');
        
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        $quantity ++;
//       if($quantity >= 0){
            $sql = "UPDATE tbl_temp_cart SET product_quantity ='$quantity' WHERE session_id ='$session_id' AND product_id ='$product_id' ";
        if(mysqli_query($connection,$sql)){
            header('Location:cart.php');
        }
//       }    
    }
    public function quantity_update_d($data){
        $session_id = session_id();
        $connection = $this -> db_select('db_shop_cart');
        
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        $quantity = 0;
       
            $sql = "UPDATE tbl_temp_cart SET product_quantity ='$quantity' WHERE session_id ='$session_id' AND product_id ='$product_id' ";
        if(mysqli_query($connection,$sql)){
//            header('Location:cart.php');
        }
           
    }
    
    
    
    public function add_customer_info($data){
        if($data['password']== NULL){
        
        }else{
            $connection = $this -> db_select('db_shop_cart');
        $password = md5($data[password]);
        $sql = "INSERT INTO tbl_customer(first_name, last_name, email_address, password, phone_number, address, city)VALUES('$data[f_name]','$data[l_name]', '$data[email_address]', '$password', '$data[p_number]', '$data[address]', '$data[city]')";
        if(mysqli_query($connection,$sql)){
            $customer_id = mysqli_insert_id($connection);
           $_SESSION['customer_id'] = $customer_id;
            $_SESSION['customer_name'] = $data['f_name'].' '.$data['l_name'];
                                               
                                               
            header('Location:shipping.php');
        }
        else{
            die("your query problem".mysqli_error($connection));
        }
        }
        
        
    }

    public function save_shipping_info($data){
        if($data['p_number'] == NULL){
            
        }else{
            $connection = $this -> db_select('db_shop_cart');
        $sql = "INSERT INTO tbl_shipping(full_name, email_address,address, phone_number,  city)VALUES('$data[f_name]','$data[email_address]', '$data[address]', '$data[p_number]','$data[city]')";
        if(mysqli_query($connection,$sql)){
            $shipping_id = mysqli_insert_id($connection);
            $_SESSION['shipping_id'] = $shipping_id;
            header('Location:payment_page.php');
        }
        else{
            die("your query problem".mysqli_error($connection));
        }
        }
        
        
    }

    
    public function customer_login_chake($data){
       if($data['password']== NULL){
        
        }else{
        $connection = $this->db_select('db_shop_cart');
        $email_address = $data['email'];
        $password = MD5($_POST['password']);
//        echo $email_address;
//        echo $password;
        
//        exit();
        $sql ="SElECT * FROM tbl_customer WHERE email_address = '$email_address' AND password = '$password' AND login_status = 1 ";
        if(mysqli_query($connection, $sql)){
            $query_result = mysqli_query($connection, $sql);
            $customer_info = mysqli_fetch_assoc($query_result);
            if(isset($customer_info)){
                $_SESSION['customer_id'] = $customer_info['customer_id'];
                $_SESSION['customer_name'] = $customer_info['first_name'].$customer_info['last_name']; 
                header('Location: shipping.php');

            }else{
                echo "You are not registed.";
            }
            
            
        }else{
            die('Query problem '.mysqli_error($connection));
        }
        
       }
    }
    
    public function order_details($data){
        $payment_type = $data['payment_type'];
        $connection = $this -> db_select('db_shop_cart');
        $session_id = session_id();
        $customer_id = $_SESSION['customer_id'];
        $shipping_id = $_SESSION['shipping_id'];
        $order_total = $_SESSION['price'];
        
//        echo '<pre>';
//        print_r($_SESSION);
//       
////        exit();
        $sql = "INSERT INTO tbl_order(customer_id, shipping_id, order_total )VALUES('$customer_id','$shipping_id','$order_total')";
        mysqli_query($connection,$sql);
        $order_id = mysqli_insert_id($connection);
        $_SESSION['order_id'] = $order_id;
//        echo $_SESSION['order_id'] ;
//        echo "<br>";
        
        
        $sql_tmp = "SELECT * FROM tbl_temp_cart WHERE session_id = '$session_id'";
        if(mysqli_query($connection,$sql_tmp)){
        $resource_id = mysqli_query($connection,$sql_tmp);
            while($temp_cart_info = mysqli_fetch_assoc($resource_id)){
                $product_id = $temp_cart_info['product_id'];
                $product_name = $temp_cart_info['product_name'];
                $product_quantity = $temp_cart_info['product_quantity'];
                $product_price = $temp_cart_info['product_price'];
                
//                echo $product_id;
//                echo "<br>";
//                echo $product_name;
//                echo "<br>";
//                echo $product_quantity;
//                echo "<br>";
//                echo $order_id;
//                echo '<pre>';
//                print_r($temp_cart_info);
////                exit();
                
               $sql = "INSERT INTO tbl_order_details(order_id,product_id,product_name,product_quantity,product_price)VALUES('$order_id','$product_id','$product_name','$product_quantity','$product_price')";
                
                if(mysqli_query($connection,$sql)){
                    echo('your seccess');
                }else{
                    die("your query problem".mysqli_error($connection));
                }
            }
        }else{
            die("Your query problem".mysqli_error($connection));
        }
    }
    
    
//    $sql = "SELECT p.*, c.category_name,m.manufacture_name FROM tbl_product as p, tbl_add_category as c, tbl_manufacture as m WHERE p.category_id =c.add_category_id AND p.manufacture_id = m.manufacture_id AND p.deletion_status=1 AND product_id = $product_id";
    
}


