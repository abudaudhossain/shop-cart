<?php

if($_SESSION['customer_id']==NULL){
    header('Location: checkout.php');
}

if(isset($_POST['btn'])){
    $obj_application -> save_shipping_info($_POST);
    
}

?>

	<div class="row">
		<div class="span9">
			<div class="well" >
			<h3 class='text-center text-success'>Shipping Form</h3><br/>
			<h5>Helle <?php echo $_SESSION['customer_name'];?>.You have to give us product shipping address to complete your valuable order!</h5><br/><br/><br/>
			<form action="" method="post">
                
                
              <div class="control-group">
                <label class="control-label" for="firstname">Full Name</label>
                <div class="controls">
                    <input class="span6 "  type="text" placeholder="fisrt_name" name="f_name">
                </div>
            
             </div>
               
             <div class="control-group">
                <label class="control-label" for="inputEmail">E-mail address</label>
                <div class="controls">
                    <input class="span6"  type="email" placeholder="Email" name="email_address">
                </div>
            
             </div>
                
                <div class="control-group">
                <label class="control-label" for="inputEmail">Phone Number</label>
                <div class="controls">
                    <input class="span6"  type="number" placeholder="Phone Number" name="p_number">
                </div>
            
             </div>
                <div class="control-group">
                <label class="control-label" for="inputEmail">Address</label>
                <div class="controls">
                    <textarea class="span6" name="address"></textarea>
                </div>
            
             </div>
                
                <div class="control-group">
                <label class="control-label" for="inputEmail">City</label>
                <div class="controls">
                    <input class="span6"  type="text" placeholder="Ciry" name="city">
                </div>
            
             </div>
                
                
			  <div class="controls">
			  <input type="submit" class="btn span6" value="Shipping Product" name="btn">
			  </div>
			</form>
		</div>
		</div>
		
	</div>	