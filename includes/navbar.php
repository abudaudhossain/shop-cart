<?php

//require "./admin/class_function/application.php";
//$obj_application = new Application();

$resource_id= $obj_application -> view_p_category();

?>


<div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>
              <div class="nav-collapse">
                <ul class="nav">
                  <li class="active"><a href="index.php">Home	</a></li>
                    <?php 
                    while($p_category_info = mysqli_fetch_assoc($resource_id)){
                    ?>
                    <li class="active"><a href="product.php?category_id=<?php echo $p_category_info['add_category_id']?>"><?php echo $p_category_info['category_name'] ;?></a></li>
                    <?php } ?>
                 
                </ul>
                
                <ul class="nav pull-right">
                    <form action="#" class="navbar-search pull-left">
                  <input type="text" placeholder="Search" class="search-query span2">
                </form>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
                    <div class="dropdown-menu">
                    <form class="form-horizontal loginFrm">
                      <div class="control-group">
                        <input type="text" class="span2" id="inputEmail" placeholder="Email">
                      </div>
                      <div class="control-group">
                        <input type="password" class="span2" id="inputPassword" placeholder="Password">
                      </div>
                      <div class="control-group">
                        <label class="checkbox">
                        <input type="checkbox"> Remember me
                        </label>
                        <button type="submit" class="shopBtn btn-block">Sign in</button>
                      </div>
                    </form>
                    </div>
                </li>
                </ul>
              </div>
            </div>
          </div>
        </div>