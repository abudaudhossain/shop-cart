<?php
 require './class_function/admin.php';
$obj_product = new Product();
$product_id =$_GET['product_id'];
//echo $product_id;

 $resource_id = $obj_product -> product_view($product_id);
$product_info = mysqli_fetch_assoc($resource_id);
?>


<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Product Veiw</span>
    </div>
    <div class="contain_area">
        <div class="table_area">
            <table border="1" align="center" width='90%'>
                <tr>
                    <th width='30%'>Product ID</th>
                    <td><?php echo $product_info['product_id'];?></td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td><?php echo $product_info['product_name'];?></td>
                </tr>
                <tr>
                    <th>Categgory Name</th>
                    <td><?php echo $product_info['category_name'];?></td>
                </tr>
                <tr>
                    <th>Manufacture Name</th>
                    <td><?php echo $product_info['manufacture_name'];?></td>
                </tr>
                <tr>
                    <th>Product Price</th>
                    <td><?php echo $product_info['product_price'];?></td>
                </tr>
                <tr>
                    <th>Product Quantity</th>
                    <td><?php echo $product_info['product_quantity'];?></td>
                </tr>
                <tr>
                    <th>Product SKU</th>
                    <td><?php echo $product_info['product_sku'];?></td>
                </tr>
                <tr>
                    <th>Product Image</th>
                    <td><img src="<?php echo $product_info['product_image'];?>"></td>
                
                </tr>
                <tr>
                    <th>Product Short Description</th>
                    <td><?php echo $product_info['product_short_description'];?></td>
                </tr>
                <tr>
                    <th>Product long Description</th>
                    <td><?php echo $product_info['product_long_description'];?></td>
                </tr>
                <tr>
                    <th>Publication Status</th>
                    <td>
                        <?php if($product_info['publication_status'] == 1){
                        echo' Published';
                        }else echo "Unpublished";?>
                    </td>
                </tr>
                
            </table>
        </div>
    </div>
    
    
</div>