<?php

$cc = $obj_application -> view_published_product();
//$cc1 = $obj_application -> view_published_product_latest();


?>










<div id="product_contenner" class="span9">
	   <div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
			  <div class="item">
                <img style="width:100%" src="assets/front_ent_assets/img/bootstrap_free-ecommerce.png" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4>Bootstrap shopping cart</h4>
                      <p><span>Very clean simple to use</span></p>
                </div>
              </div>
			  <div class="item">
                <img style="width:100%" src="assets/front_ent_assets/img/carousel1.png" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4>Bootstrap Ecommerce template</h4>
                      <p><span>Highly Google seo friendly</span></p>
                </div>
              </div>
			  <div class="item active">
                <img style="width:100%" src="assets/front_ent_assets/img/carousel3.png" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4>Twitter Bootstrap cart</h4>
                      <p><span>Very easy to integrate and expand.</span></p>
                </div>
              </div>
              <div class="item">
                <img style="width:100%" src="assets/front_ent_assets/img/bootstrap-templates.png" alt="bootstrap templates">
                <div class="carousel-caption">
                      <h4>Bootstrap templates integration</h4>
                      <p><span>Compitable to many more opensource cart</span></p>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
        </div>
<!--
New Products
-->
	   <div class="well well-small">
	<h3>New Products </h3>
	<hr class="soften"/>
		<div class="row-fluid">
		<div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
			<div class="item active">
			  <ul class="thumbnails">
				<li class="span3">
				<div class="thumbnail">
					<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a href="#" class="tag"></a>
					<a href="product_details.php"><img src="assets/front_ent_assets/img/bootstrap-ring.png" alt="bootstrap-ring"></a>
				</div>
				</li>
				<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/front_ent_assets/img/i.jpg" alt=""></a>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/front_ent_assets/img/f.jpg" alt=""></a>
			  </div>
			</li>
          <li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/front_ent_assets/img/f.jpg" alt=""></a>
			  </div>
			</li>
			  </ul>
			  </div>
		   <div class="item">
		  <ul class="thumbnails">
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/front_ent_assets/img/i.jpg" alt=""></a>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/front_ent_assets/img/f.jpg" alt=""></a>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/front_ent_assets/img/h.jpg" alt=""></a>
			  </div>
			</li>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php"><img src="assets/front_ent_assets/img/j.jpg" alt=""></a>
			  </div>
			</li>
		  </ul>
		  </div>
		   </div>
		  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
	</div>
	<!--all published product -->
        <div class="well well-small">
            <h3><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a>All Products  </h3>
		  <hr class="soften"/>
            
           <ul class="thumbnails aa">
             <?php while($product_info = mysqli_fetch_assoc($cc)){ ?>
			<li class="product_span">
			  <div class="thumbnail">
				<a href="product_details.php?product_id=<?php echo $product_info['product_id']; ?>" class="overlay"></a>
				<a class="zoomTool" href="product_details.php?product_id=<?php echo $product_info['product_id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php?product_id= <?php echo $product_info['product_id'];?>"><img src="admin/<?php echo $product_info['product_image'] ?>" alt=""></a>
				<div class="caption cntr">
					<p><?php echo $product_info['product_name'] ?></p>
					<p><strong>$<?php echo $product_info['product_price'] ?></strong></p>
					<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>

            <?php } ?>
            </ul>
        
        </div>
        <!--
	Featured Products
	-->
		<div class="well well-small">
		  <h3><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a> Featured Products  </h3>
		  <hr class="soften"/>
		
           <ul class="thumbnails aa">
			<li class="product_span">
			  <div class="thumbnail">
				<a href="product_details.php" class="overlay"></a>
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php"><img src="assets/front_ent_assets/img/g.jpg" alt=""></a>
				<div class="caption cntr">
					<h5>Manicure & Pedicure</h5>
				  <h4>
					  <a class="defaultBtn" href="product_details.php" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">$22.00</span>
				  </h4>
				</div>
			  </div>
			</li>
               <li class="product_span">
			  <div class="thumbnail">
				<a href="product_details.php" class="overlay"></a>
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php"><img src="assets/front_ent_assets/img/g.jpg" alt=""></a>
				<div class="caption cntr">
					<h5>Manicure & Pedicure</h5>
				  <h4>
					  <a class="defaultBtn" href="product_details.php" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">$22.00</span>
				  </h4>
				</div>
			  </div>
			</li>
               <li class="product_span">
			  <div class="thumbnail">
				<a href="product_details.php" class="overlay"></a>
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php"><img src="assets/front_ent_assets/img/g.jpg" alt=""></a>
				<div class="caption cntr">
					<h5>Manicure & Pedicure</h5>
				  <h4>
					  <a class="defaultBtn" href="product_details.php" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">$22.00</span>
				  </h4>
				</div>
			  </div>
			</li>
               <li class="product_span">
			  <div class="thumbnail">
				<a href="product_details.php" class="overlay"></a>
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php"><img src="assets/front_ent_assets/img/g.jpg" alt=""></a>
				<div class="caption cntr">
					<h5>Manicure & Pedicure</h5>
				  <h4>
					  <a class="defaultBtn" href="product_details.php" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">$22.00</span>
				  </h4>
				</div>
			  </div>
			</li>
            </ul>
        
        
	</div>
	
	<div class="well well-small">
	<a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
	Popular Products 
	</div>
	<hr>
	<div class="well well-small">
	<a class="btn btn-mini pull-right" href="#">View more <span class="icon-plus"></span></a>
	Best selling Products 
	</div>
	</div>
	