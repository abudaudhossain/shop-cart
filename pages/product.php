<?php

$category_id = $_GET['category_id'];
//echo $category_id;
//exit();
$resource_id = $obj_application -> view_published_category_product($category_id);
//session_start();

//while($product_info=mysqli_fetch_assoc($resource_id)){
//    echo '<pre>';
//    print_r($product_info);
//}
//exit();
?>


<div id="product_contenner" class="span9">
    <div class="well well-small">
        <h3><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a>Products </h3>
        <hr class="soften" />
        
        <ul class="thumbnails aa">
            <?php while($product_info = mysqli_fetch_assoc($resource_id)) {?>
            <li class="product_span">
                <div class="thumbnail">
                    <a href="product_details.php?product_id=<?php echo $product_info['product_id']; ?>" class="overlay"></a>
                    <a class="zoomTool" href="product_details.php?product_id=<?php echo $product_info['product_id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                    <a href="product_details.php?product_id=<?php echo $product_info['product_id']; ?>"><img src="admin/<?php echo $product_info['product_image']; ?>" alt=""></a>
                    <div class="caption cntr">
                        <p><?php echo $product_info['product_name'];?></p>
                        <p><strong><?php $product_info['product_price'];?> </strong></p>
                        <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
                        <div class="actionList">
                            <a class="pull-left" href="#">Add to Wish List </a>
                            <a class="pull-left" href="#"> Add to Compare </a>
                        </div>
                        <br class="clr">
                    </div>
                </div>
            </li>
            <?php }?>
        </ul>

    </div>
</div>