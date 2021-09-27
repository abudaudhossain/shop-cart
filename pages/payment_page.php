<?php 
//$obj_application ->

if(isset($_POST['btn'])){
    
    $obj_application -> order_details($_POST);
}
?>

   <div class="container span9">
    <div class="row">
        <div class="span9">
            <form action="" method="post">
                <table class='table'>
                    <tr>
                        <td>Cash On delivery</td>
                        <td><input type="radio" name="payment_type" value="cash_on_delivary"></td>
                    </tr>
                    <tr>
                        <td>BKash</td>
                        <td><input type="radio" name="payment_type" value="bkash"></td>
                    </tr>
                    <tr>
                        
                        <td colspan="2"><input type="submit" name="btn" class="btn btn-primary btn-block" value="Confirm Order"></td>
                    </tr>
                    
                </table>
                
            </form>
            
        </div>
    </div>
</div>