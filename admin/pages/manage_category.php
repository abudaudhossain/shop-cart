<?php

require './class_function/admin.php';
//$connection = db_select('db_admin_master');
//
//$sql = "SELECT * FROM tbl_add_category WHERE deletion_status=1";
//if(mysqli_query($connection,$sql)){
//    $resource_id = mysqli_query($connection,$sql);
//}else{
//    die('qurey problem'.mysqli_error($connection));
//}
 $obj_category = new Category();
$resource_id = $obj_category -> view_category_info();
if(isset($_GET['deletion_status'])){
    $category_id = $_GET['category_id'];
//    echo $category_id;
    $obj_category -> delete_category_info($category_id);
}


if(isset($_GET['p_status'])){
$obj_category -> category_status_info($_GET);
}
?>

<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Manage Category</span>
    </div>
    <div class="contain_area">
        <div class="table_area">
            <table border="1" align="center" width='90%'>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Category Descriptin</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                <?php while($data = mysqli_fetch_assoc($resource_id)) { ?>
                <tr>
                    <td><?php echo $data['add_category_id'];?></td>
                    <td><?php echo $data['category_name'];?></td>
                    <td><?php echo $data['category_discription'];?></td>
                    <td><?php if($data['publication_status'] == 1){
                        echo' Published';
                        }else echo "Unpublished";?></td>
                    <td>
                        <?php if($data['publication_status'] == 1){?>
                        <a href="?p_status=unpublished&category_id=<?php echo $data['add_category_id'];?>">
                        <button class="published"></button>
                        </a>
                        
                        <?php } else {?>
                        <a href="?p_status=published&category_id=<?php echo $data['add_category_id'];?>">
                        <button class="unpublished"></button>
                        </a>
                        <?php }?>

                        <a href="edit.php?category_id=<?php echo $data['add_category_id']?>">edit</a>|<a href="?deletion_status=delete&category_id=<?php echo $data['add_category_id']?>" onclick="return check_delete();"> Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
    
</div>