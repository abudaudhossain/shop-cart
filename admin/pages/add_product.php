<?php
require './class_function/admin.php';
$obj_product = new Product();


  $resource_id=$obj_product -> select_all_published_category_info();
//while($category_info= mysqli_fetch_assoc($resource_id)){
//    echo $category_info['category_name']."<br>";
//}

 
$resource_id1= $obj_product -> select_all_published_manufacture_info();
 
//while($category_info= mysqli_fetch_assoc($resource_id)){
//    echo $category_info['category_name']."<br>";
//}
//echo '<pre>';
//print_r($_POST);
//print_r($_FILES);
//echo $_POST[category_name];



if(isset($_POST['btn'])){
    $mes =$obj_product -> save_product_info($_FILES);
}
if(isset($mes)){
    echo $mes;
}
?>

<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Add Product</span>
    </div>
   <div class="contain_area">
     <div class="form_area">
         <div class="category_manu">
             <span>Product Info From</span>
             
         </div>

         <form action="" method="post" enctype="multipart/form-data">
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Product Name</span></div>
                 <div class="in_value">
                     <input name="product_name" type="text">
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Category Name</span></div>
                 <div class="in_value_s">
                     <select name="category_id">
                         <option value="">-- Select Category Name --</option>
                         <?php while($category_info= mysqli_fetch_assoc($resource_id)){ ?>
                         <option value="<?php echo $category_info['add_category_id']; ?>"><?php echo $category_info['category_name']; ?></option>
                         <?php }?>
                     </select>
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Manufacture Name</span></div>
                 <div class="in_value_s">
                     <select name="manufacture_id">
                         <option value="">-- Select Manufacture Name --</option>
                        <?php while($manufacture_info= mysqli_fetch_assoc($resource_id1)){ ?>
                         <option value="<?php echo $manufacture_info['manufacture_id']; ?>"><?php echo $manufacture_info['manufacture_name']; ?></option>
                         <?php }?>
                     </select>
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Product Price</span></div>
                 <div class="in_value">
                     <input name="product_price" type="number">
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Product Quantity</span></div>
                 <div class="in_value">
                     <input name="product_quantity" type="number">
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Product Sku</span></div>
                 <div class="in_value">
                     <input name="product_sku" type="text">
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Product Short Descripton</span></div>
                 <div class="in_value">
                     <textarea name="product_short_discription" rows="10"></textarea>
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Product long Descripton</span></div>
                 <div class="in_value">
                     <textarea name="product_long_discription" rows="10"></textarea>
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Product Imge</span></div>
                 <div class="in_value">
                     <input name="product_image" type="file">
                 </div>
             </div>
             <div class="form_span">
                 <div class="in_name"><span class="in_name_text">Publication Status</span></div>
                 <div class="in_value_s">
                     <select name="publication_status">
                         <option>--publication status--</option>
                         <option value="1">Published</option>
                         <option value="0">Unpublished</option>
                     </select>
                 </div>
             </div>
             
             <div class="form_control">
                 <div class="botton_1"><input type="submit" name="btn" value="Save Category"></div>
                 <div class="botton_2"><input type="reset" name="btn" value="cancel"></div>


             </div>

         </form>
     </div>
 </div>
          
</div>