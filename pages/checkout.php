<?php

//$login_status_resource_id = 
if(isset($_SESSION['customer_id'])){
    header('Location: shipping.php');
}

if(isset($_POST['login_btn'])){
    $obj_application -> customer_login_chake($_POST);
}

if(isset($_POST['rg_btn'])){
    $obj_application -> add_customer_info($_POST);
}

?>
<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span7">
			<div class="well">
			<h5>CREATE YOUR ACCOUNT</h5><br/>
			Enter your e-mail address to create an account.<br/><br/><br/>
			<form action="" method="post">
                
                
              <div class="control-group">
                <label class="control-label" for="firstname">First Name</label>
                <div class="controls">
                    <input class="span6"  type="text" placeholder="fisrt_name" name="f_name">
                </div>
            
             </div>
             <div class="control-group">
                <label class="control-label" for="last_name">Last Name </label>
                <div class="controls">
                    <input class="span6"  type="text" placeholder="Last_Name" name="l_name">
                </div>
            
             </div>    
             <div class="control-group">
                <label class="control-label" for="inputEmail">E-mail address</label>
                <div class="controls">
                    <input class="span6"  type="email" placeholder="Email" name="email_address">
                </div>
            
             </div>
                <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                    <input class="span6"  type="password" placeholder="Password" name="password">
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
			  <input type="submit" class="btn block" value="Create Your Account" name="rg_btn">
			  </div>
			</form>
		</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form action="" method="post">
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				  <input class="span3" type="email" placeholder="Email" name="email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				  <input type="password" class="span3" placeholder="Password" name="password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <button type="submit" class="defaultBtn" name="login_btn">Sign in</button> <a href="#">Forget password?</a>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
	
</div>
