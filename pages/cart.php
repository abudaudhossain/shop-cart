<?php
$session_id = session_id();
//echo $session_id;
//exit();
$resource_id = $obj_application -> view_cart_product();
$items = 0;
$it =$_SESSION['items'];
$total_product_price = 0;

 

if(isset($_POST['btn_mns'])){
    
    $obj_application -> quantity_update_m($_POST);
//    header("LOCATION:cart.php");
}
if(isset($_POST['btn_p'])){
    $obj_application -> quantity_update_p($_POST);
//    header("LOCATION:cart.php");
    
}
if(isset($_POST['btn_d'])){
    $obj_application -> quantity_update_d($_POST);
//    header("LOCATION:cart.php");
}


?>

<div class="span12">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">Check Out</li>
    </ul>
    <div class="well well-small">
        <h1>Check Out <small class="pull-right"> <?php echo $_SESSION['items']; ?> Items are in the cart </small></h1>
        <hr class="soften" />

        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Description</th>
                    <th> Ref. </th>
                    <th>Avail.</th>
                    <th>Unit price</th>
                    <th>Qty </th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php while($cart_product_info=mysqli_fetch_assoc($resource_id)){ $items ++;$_SESSION['items'] = $items;?>
                <tr>
                    <td><img width="100" src="assets/<?php echo $cart_product_info['product_image']; ?>" alt=""></td>
                    <td>Product Name : <?php echo $cart_product_info['product_name']; ?><br>Carate : 22<br>Model : n/a</td>
                    <td> - </td>
                    <td><span class="shopBtn"><span class="icon-ok"></span></span> </td>
                    <td>$<?php echo $cart_product_info['product_price']; ?></td>
                    <td>
                       <form action="" method="post">
                           <input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" name="quantity" value="<?php echo $cart_product_info['product_quantity']; ?>">
                           <input type="number" name="product_id" value="<?php echo $cart_product_info['product_id']; ?>" style="display: none;">
                            <div class="input-append">
                                <button class="btn btn-mini" type="submit" name="btn_mns" onclick="return mns_quantity();">-</button><button class="btn btn-mini" type="submit" name="btn_p"> + </button><button class="btn btn-mini btn-danger" type="submit" name="btn_d"><span class="icon-remove"></span></button>
                            </div>

                       </form>
                        
                    </td>
                    <td>$<?php $total_price = $cart_product_info['product_quantity']*$cart_product_info['product_price']; echo $total_price; ?></td>
                </tr>
          <?php $total_product_price = $total_product_price + $total_price;}?>
                <tr>
                    <td colspan="6" class="alignR">Total products price: </td>
                    <td> $<?php echo $total_product_price;?></td>
                </tr>
                <tr>
                    <td colspan="6" class="alignR">Total vat(1.5%) : </td>
                    <td>$<?php echo $vat =$total_product_price * 0.015;?> </td>
                </tr>
                <tr>
                    <td colspan="6" class="alignR">Total Discount: </td>
                    <td> $0</td>
                </tr>
                <tr>
                    <td colspan="6" class="alignR">Total price: </td>
                    <td class="label label-primary"> $<?php echo $total_product_price = $total_product_price + $vat;?></td>
                </tr>
            </tbody>
        </table><br />


       
        <a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
        
        
        <a href="checkout.php" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

    </div>
</div>

<?php
$_SESSION['price'] =  $total_product_price;
if($it != $_SESSION['items']){header("LOCATION:cart.php"); }
                            ?>

<script>
    function qnt(){
        alert('Your not use');
    }

</script>






