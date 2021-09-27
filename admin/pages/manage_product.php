<?php
require './class_function/admin.php';
$obj_product = new Product();

$resource_id = $obj_product -> view_all_product_info();

 
if(isset($_GET['deletion_status'])){
    $product_id = $_GET['product_id'];
//    echo $product_id;
    $obj_product -> product_info_delete($product_id);
}




if(isset($_GET['m_p_status'])){
    
    $obj_product -> product_status($_GET);
}
?>

<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Manage product</span>
    </div>
    <div class="contain_area">
        <div class="table_area">
            <table border="1" align="center" width='90%'>
                <tr>
                    
                    <th>product Name</th>
                    <th>Category Name</th>
                    <th>Manufacture Name</th>
                    <th>product Price</th>
                    <th>product Quantity</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                <?php while($data = mysqli_fetch_assoc($resource_id)) { ?>
                <tr>
                    <td><?php echo $data['product_name'];?></td>
                    <td><?php echo $data['category_name'];?></td>
                     <td><?php echo $data['manufacture_name'];?></td>
                    <td><?php echo $data['product_price'];?></td>
                    <td><?php echo $data['product_quantity'];?></td>
                    
                    
                    <td><?php if($data['publication_status'] == 1){
                        echo' Published';
                        }else echo "Unpublished";?></td>
                    <td>
                        <?php if($data['publication_status'] == 1){?>
                        <a href="?m_p_status=unpublished&product_id=<?php echo $data['product_id'];?>">
                        <button class="published"></button>
                        </a>
                        
                        <?php } else {?>
                        <a href="?m_p_status=published&product_id=<?php echo $data['product_id'];?>">
                        <button class="unpublished"></button>
                        </a>
                        <?php }?>
                        <a href="product_view.php?product_id=<?php echo $data['product_id']?>">view</a>|
                        <a href="product_edit.php?product_id=<?php echo $data['product_id']?>">edit</a>|<a href="?deletion_status=delete&product_id=<?php echo $data['product_id']?>" onclick="return check_delete();"> Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
    
</div>