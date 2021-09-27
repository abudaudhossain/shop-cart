<?php


require './class_function/admin.php';
$obj_manufacture = new Manufacture();

$resource_id = $obj_manufacture -> view_manufacture();

if(isset($_GET['deletion_status'])){
    $manufacture_id = $_GET['manufacture_id'];
//    echo $manufacture_id;
    $obj_manufacture -> manufacture_info_delete($manufacture_id);
}


if(isset($_GET['m_p_status'])){
    $obj_manufacture -> manufacture_status($_GET);
}
?>

<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Manage Manufacture</span>
    </div>
    <div class="contain_area">
        <div class="table_area">
            <table border="1" align="center" width='90%'>
                <tr>
                    <th>manufacture ID</th>
                    <th>manufacture Name</th>
                    <th>manufacture Descriptin</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                <?php while($data = mysqli_fetch_assoc($resource_id)) { ?>
                <tr>
                    <td><?php echo $data['manufacture_id'];?></td>
                    <td><?php echo $data['manufacture_name'];?></td>
                    <td><?php echo $data['manufacture_discription'];?></td>
                    <td><?php if($data['publication_status'] == 1){
                        echo' Published';
                        }else echo "Unpublished";?></td>
                    <td>
                        <?php if($data['publication_status'] == 1){?>
                        <a href="?m_p_status=unpublished&manufacture_id=<?php echo $data['manufacture_id'];?>">
                        <button class="published"></button>
                        </a>
                        
                        <?php } else {?>
                        <a href="?m_p_status=published&manufacture_id=<?php echo $data['manufacture_id'];?>">
                        <button class="unpublished"></button>
                        </a>
                        <?php }?>

                        <a href="manufacture_edit.php?manufacture_id=<?php echo $data['manufacture_id']?>">edit</a>|<a href="?deletion_status=delete&manufacture_id=<?php echo $data['manufacture_id']?>" onclick="return check_delete();"> Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
    
</div>