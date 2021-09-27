<?php
class Admin{
    
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

    
    public function admin_login_check(){
    $connection = $this->db_select('db_shop_cart');
    $password = MD5($_POST['password']);
//    echo $password;
    $sql = "SELECT * FROM tbl_admin WHERE email_address='$_POST[email_address]' AND password='$password' AND deletion_status=1 ";
    if(mysqli_query($connection,$sql)){
        $query_result = mysqli_query($connection,$sql);
        $admin_info = mysqli_fetch_assoc($query_result);
//        echo '<pre>';
//        print_r($admin_info);
        if(isset($admin_info)){ 
            
            $_SESSION['admin_id'] = $admin_info['admin_id'];
            $_SESSION['admin_name'] = $admin_info['admin_name'];
            header('Location: home.php');
        }else{
//            echo "enter valid password & email_addres";
            $_SESSION['admin_id'] = $admin_info['admin_id'];
            $_SESSION['admin_name'] = $admin_info['admin_name'];
            header('Location: home.php');
        }
    }
    else{
        die('Query problem'.mysqli_error($connection));
    }
    
    
}
    function admin_logout(){
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    header('Location: index.php');
}

    
}

class Category extends Admin{
    public function add_category_info($data){
        $connection = $this -> db_select('db_admin_master');
         
        $category_name = $data['category_name'];
        $category_des = $data['category_discription'];
        $publication_status = $data['publication_status'];
        $sql = "INSERT INTO tbl_add_category(category_name,category_discription,publication_status) VALUES('$category_name','$category_des','$publication_status')";

        if(mysqli_query($connection,$sql)){
            $message = 'Information is save';
            return $message;
        }else{
            die('Query problem'.mysqli_error($connection));
        }
    }
    
    public function view_category_info(){
        $connection = $this -> db_select('db_admin_master');
        $sql = "SELECT * FROM tbl_add_category WHERE deletion_status=1";
        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection,$sql);
            return $resource_id;
        }else{
            die('qurey problem'.mysqli_error($connection));
        }
    }
    public function delete_category_info($category_id){
        $connection = $this -> db_select('db_admin_master');
        $sql_update="UPDATE tbl_add_category SET deletion_status = 0 WHERE add_category_id = $category_id";
        if(mysqli_query($connection,$sql_update)){
            $message= 'delete info';
            header('Location:./manage_category.php');
            return $message;
        }else{
            die("YOur Query problem".mysqli_error($connection));
        }
        
        
    }
    public function category_status_info($data){
        $connection = $this -> db_select('db_admin_master');
        if($data['p_status']=='unpublished'){
        $s_sql="UPDATE tbl_add_category SET publication_status=0 WHERE add_category_id = '$data[category_id]'";
        
        if(mysqli_query($connection,$s_sql)){
           header('Location:./manage_category.php');
        }else{
            die("You publication status query problem".mysqli_error($connection));
        }
    }else if($data['p_status']=='published'){
        $s_sql="UPDATE tbl_add_category SET publication_status=1 WHERE add_category_id = '$data[category_id]'";
        
        if(mysqli_query($connection,$s_sql)){
            header('Location:./manage_category.php');
        }else{
            die("You publication status query problem".mysqli_error($connection));
        }
    
        }
        
    }
    
    public function view_update_category_info($category_id){
                $connection = $this -> db_select('db_admin_master');
        
                $sql = "SELECT * FROM tbl_add_category WHERE add_category_id =$category_id";
                if(mysqli_query($connection,$sql)){
                    $resurce_id = mysqli_query($connection,$sql);
                }else{
                    die('Query problem'.mysqli_error($connection));
                }
                $category_info = mysqli_fetch_assoc($resurce_id);
                return $category_info;
        
    }
    
    public function update_category_info($date,$category_id){
        
        $connection = $this -> db_select('db_admin_master');
        $category_name = $date['category_name'];
        $category_discription = $date['category_discription'];
        $publication_status = $date['publication_status'];
        
        $sql =" UPDATE tbl_add_category SET category_name='$category_name', category_discription='$category_discription',publication_status='$publication_status' WHERE add_category_id = '$category_id'";
        
         if(mysqli_query($connection,$sql)){
    //         echo '<pre>';
    //         print_r($date);
             header('Location:./manage_category.php');
         }else{
             die('query problem'.mysqli_error($connection));
         }   
    }
    
    
}


class Manufacture extends Admin{
    public function add_manufacture($data){
        $connection = $this -> db_select('db_admin_master');
        $manufacture_name = $data['manufacture_name'];
        $manufacture_des = $data['manufacture_discription'];
        $publication_status = $data['publication_status'];
        
        $sql = "INSERT INTO  tbl_manufacture(manufacture_name,manufacture_discription,publication_status) VALUES('$manufacture_name','$manufacture_des','$publication_status')";

        if(mysqli_query($connection,$sql)){
            $message = 'Information is save';
            return $message;
        }else{
            die('Query problem'.mysqli_error($connection));
        }
        
    }
    
    public function view_manufacture(){
        $connection = $this -> db_select('db_admin_master');
        
        $sql = "SELECT * FROM tbl_manufacture WHERE deletion_status=1";
            if(mysqli_query($connection,$sql)){
                $resource_id = mysqli_query($connection,$sql);
                return $resource_id;
            }else{
                die('qurey problem'.mysqli_error($connection));
            }
        }
    
    public function manufacture_info_delete($manufacture_id){
        $connection = $this -> db_select('db_admin_master');
        
        $sql_update="UPDATE tbl_manufacture SET deletion_status = 0 WHERE manufacture_id = $manufacture_id";
        if(mysqli_query($connection,$sql_update)){
            header('Location:./manage_manufacture.php');
        }else{
            die("YOur Query problem".mysqli_error($connection));
        }
        
    }

    
    public function manufacture_status($data){
        
        $connection = $this -> db_select('db_admin_master');
   
        if($data['m_p_status']=='unpublished'){
            $s_sql="UPDATE tbl_manufacture SET publication_status=0 WHERE manufacture_id = '$data[manufacture_id]'";

            if(mysqli_query($connection,$s_sql)){
               header('Location:./manage_manufacture.php');
            }else{
                die("You publication status query problem".mysqli_error($connection));
            }
        }else if($data['m_p_status']=='published'){
            $s_sql="UPDATE tbl_manufacture SET publication_status=1 WHERE manufacture_id = '$data[manufacture_id]'";

            if(mysqli_query($connection,$s_sql)){
                header('Location:./manage_manufacture.php');
            }else{
                die("You publication status query problem".mysqli_error($connection));
            }
          }    
    }
    
    public function view_update_manufacture_info($manufacture_id){
        $connection = $this -> db_select('db_admin_master');
        
        $sql = "SELECT * FROM tbl_manufacture WHERE manufacture_id =$manufacture_id";
        if(mysqli_query($connection,$sql)){
            $resurce_id = mysqli_query($connection,$sql);
            
        }else{
            die('Query problem'.mysqli_error($connection));
        }
        $manufacture_info = mysqli_fetch_assoc($resurce_id);
        return $manufacture_info;

    }
    public function manufacture_update_info($date,$category_id){
        $connection = $this -> db_select('db_admin_master');
        
        $category_name = $date['manufacture_name'];
        $category_discription = $date['manufacture_discription'];
        $publication_status = $date['publication_status'];
        $sql =" UPDATE tbl_manufacture SET manufacture_name='$category_name', manufacture_discription='$category_discription',publication_status='$publication_status' WHERE manufacture_id = '$category_id'";
         if(mysqli_query($connection,$sql)){
    //         echo '<pre>';
    //         print_r($date);
             header('Location:./manage_manufacture.php');
         }else{
             die('query problem'.mysqli_error($connection));
         }   
}

}

class Product extends Admin{
    public function select_all_published_category_info(){
        $connection = $this -> db_select('db_admin_master');
    
        $sql ="SELECT * FROM tbl_add_category WHERE publication_status = 1 AND deletion_status=1";
        if(mysqli_query($connection,$sql)){
            $resource_id=mysqli_query($connection,$sql);
            return  $resource_id;

        }else{
            die("Your Query Problem..".mysqli_error($connection));
        }
    
    }
    
    public function select_all_published_manufacture_info(){
         $connection = $this -> db_select('db_admin_master');
        
        $sql ="SELECT * FROM tbl_manufacture WHERE publication_status = 1 AND deletion_status=1";
        if(mysqli_query($connection,$sql)){
            $resource_id=mysqli_query($connection,$sql);
            return  $resource_id;

        }else{
            die("Your Query Problem..".mysqli_error($connection));
        }
    }
    
    public function save_product_info($data){
        $connection = $this -> db_select('db_admin_master');

        $directory='../assets/admin_assets/product_image/';
        $target_file = $directory.$_FILES['product_image']['name'];

        $file_type = pathinfo($target_file,PATHINFO_EXTENSION);
        $file_size = $_FILES['product_image']['size'];
        $check = getimagesize($_FILES['product_image']['tmp_name']);

        if($check){
            if(file_exists($target_file)){
                $message = 'This image is already exists. Please anather file upload';
            }else{
                if($file_size <3000000 ){


                    $sql ="INSERT INTO tbl_product(product_name,category_id, manufacture_id,product_price, product_quantity, product_sku, product_short_description, product_long_description, product_image, publication_status) VALUES('$_POST[product_name]', '$_POST[category_id]', '$_POST[manufacture_id]', '$_POST[product_price]','$_POST[product_quantity]', '$_POST[product_sku]', '$_POST[product_short_discription]', '$_POST[product_long_discription]', '$target_file','$_POST[publication_status]')";
                    if(mysqli_query($connection,$sql)){
                         move_uploaded_file($_FILES['product_image']['tmp_name'],$target_file);
                        $message ='image upload successfully';
                    }else{
                        echo'Your query problem'.mysqli_error($connection);
                    }

                }else{
                    $message = 'Your file is over size. Please try again';
                }
            }
        }else{
            $message ="Your Upload file is not image! Please try again";
        }


       return $message; 
    }
    
    public function view_all_product_info(){
         $connection = $this -> db_select('db_admin_master');

        $sql = 'SELECT p.*, c.category_name,m.manufacture_name FROM tbl_product as p, tbl_add_category as c, tbl_manufacture as m WHERE p.category_id =c.add_category_id AND p.manufacture_id = m.manufacture_id AND p.deletion_status=1';
        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection,$sql);
            return $resource_id;
        }else{
            die('qurey problem'.mysqli_error($connection));
        }
 
    }
    public function  product_view($product_id){
        
        $connection = $this -> db_select('db_admin_master');
//    echo $product_id;
        
        $sql = "SELECT p.*, c.category_name,m.manufacture_name FROM tbl_product as p, tbl_add_category as c, tbl_manufacture as m WHERE p.category_id =c.add_category_id AND p.manufacture_id = m.manufacture_id AND p.deletion_status=1 AND p.product_id = '$product_id'";
        if(mysqli_query($connection,$sql)){
            $resource_id = mysqli_query($connection,$sql);
            return $resource_id;
        }else{
            die('qurey problem'.mysqli_error($connection));
        }
    }
    
    
    public function product_info_delete($product_id){
        $connection = $this -> db_select('db_admin_master');
        
        $sql_update="UPDATE tbl_product SET deletion_status = 0 WHERE product_id = $product_id";
        if(mysqli_query($connection,$sql_update)){
            header('Location:./manage_product.php');
        }else{
            die("YOur Query problem".mysqli_error($connection));
        }
    }
    
    public function product_status($data){
        $connection = $this -> db_select('db_admin_master');
        
        if($data['m_p_status']=='unpublished'){
            $s_sql="UPDATE tbl_product SET publication_status=0 WHERE product_id = '$data[product_id]'";

            if(mysqli_query($connection,$s_sql)){
               header('Location:./manage_product.php');
            }else{
                die("You publication status query problem".mysqli_error($connection));
            }
        }else if($data['m_p_status']=='published'){
            $s_sql="UPDATE tbl_product SET publication_status=1 WHERE product_id = '$data[product_id]'";

            if(mysqli_query($connection,$s_sql)){
                header('Location:./manage_product.php');
            }else{
                die("You publication status query problem".mysqli_error($connection));
            }


            }

    }
    public function update_product_view($product_id){
      $connection = $this -> db_select('db_admin_master');
        
        $sql = "SELECT * FROM tbl_product WHERE product_id =$product_id";
    if(mysqli_query($connection,$sql)){
        $resurce_id = mysqli_query($connection,$sql);
        return $resurce_id;
    }else{
        die('Query problem'.mysqli_error($connection));
    }

    }
    
    public function update_product_info($data){
        $connection = $this -> db_select('db_admin_master');
        echo '<pre>';
        print_r($data);
//        exit();
        $product_id = $data['product_id'];
        $product_name ='$data[product_name]';
        $category_id = $data['category_id'];
        $manufacture_id = $data['manufacture_id'];
        $product_price = $data['product_price'];
        $product_quantity = $data['product_quantity'];
        $product_sku = $data['product_sku'];
        $product_short_description = $data['product_short_discription'];
        $product_long_description = $data['product_long_discription'];
        $publication_status =$data['publication_status'] ;
        
        
        $sql = " UPDATE tbl_product SET product_name='$product_name',category_id = 1,manufacture_id=3,product_price=231,product_quantity =34,product_sku = 3, product_short_description='abu daud hos',product_long_description='dfdsfkjfjld' WHERE product_id = 1";
        
        if(mysqli_query($connection,$sql)){
            echo "YOu r sweccess";
        }else{
            die("qyery problem".mysqli_error($connection) );
        }
    }
}






