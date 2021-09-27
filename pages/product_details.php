 <?php
//echo 'product_details';
//session_start();
// $_SESSION['category_id']=$_GET['category_id'];
 $product_id=$_GET['product_id'];
$resource_id = $obj_application -> product_details($product_id);

$product_details_info = mysqli_fetch_assoc($resource_id);

$resource_id1 = $obj_application -> product_related($product_details_info['category_id']);


if(isset($_POST['btn'])){
    $obj_application -> save_cart_product_info($_POST,$product_details_info);
}
//echo '<pre>';
//print_r($product_details_info);
//exit();

?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li><a href="product.php?category_id=<?php echo $product_details_info['category_id']; ?>">Items</a> <span class="divider">/</span></li>
        <li class="active">Preview</li>
    </ul>
    <div class="well well-small">
        <div class="row-fluid">
            <div class="span5">
                <div id="myCarousel" class="carousel slide cntr">
                   
                        <div class="item">
                             <img src="admin/<?php echo $product_details_info['product_image'];?>" alt="" style="width:100%">
                        </div>
                </div>
            </div>
            <div class="span7">
                <h3><?php echo 'Product Name : '. $product_details_info['product_name'];?>[$<?php echo $product_details_info['product_price'];?>]</h3>
                <hr class="soft" />

                <form class="form-horizontal qtyFrm" action="" method="post">
                    <div class="control-group">

                       <h4><span><?php echo 'Product Price : '.'$'. $product_details_info['product_price'];?> </span></h4>
                        
                    </div>


                    <h4><?php echo $product_details_info['product_quantity'];?> items in stock</h4>
                    <p><?php echo $product_details_info['product_short_description'];?> ...
                    </p>
                    
                    <input type="number" value="1" name="product_quantity">
<!--                    <input class="shopBtn" type="submit" name="btn" value=" Add to cart">-->
                    <button type="submit" class="shopBtn" name="btn"><span class=" icon-shopping-cart"></span> Add to cart</button>
                </form>
            </div>
        </div>
        <hr class="softn clr" />


        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Related Products </a></li>

        </ul>
        <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
                <h4>Product Information</h4>
                <table class="table table-striped">
                    <tbody>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Product Name :</td>
                            <td class="techSpecTD2"><?php echo $product_details_info['product_name'];?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Category Name :</td>
                            <td class="techSpecTD2"><?php echo $product_details_info['product_quantity'];?></td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Manufacture Name :</td>
                            <td class="techSpecTD2"><?php echo $product_details_info['manufacture_name'];?></td>
                        </tr>
                        
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Product Quantity:</td>
                            <td class="techSpecTD2"><?php echo $product_details_info['product_quantity'];?></td>
                        </tr>
                        
                        
                        
                    </tbody>
                </table>
                <h2 class="text-center">Product Description</h2>
                <p> <?php echo $product_details_info['product_long_description'];?></p>

            </div>
            <div class="tab-pane fade" id="profile">
                <?php while($product_info = mysqli_fetch_assoc($resource_id1)) {?>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="admin/<?php echo $product_info['product_image'];?>" alt="">
                    </div>
                    <div class="span6">
                        <h5><?php echo $product_info['product_name'];?> </h5>
                        <p>
                            <?php echo $product_info['product_short_description'];?>
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $<?php echo $product_info['product_price'];?></h3>
                            <label class="checkbox">
                                <input type="checkbox"> Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.php" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.php?product_id=<?php echo $product_info['product_id']; ?>" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft">
                <?php }?>
            </div>
        </div>
    </div>

</div>