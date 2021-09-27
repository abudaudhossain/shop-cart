<?php
require './class_function/admin.php';
$obj_manufacture = new Manufacture();
$message ='';
if(isset($_POST['btn'])){
 $message = $obj_manufacture -> add_manufacture($_POST);
}
?>



<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Add Manufacture</span>
    </div>
    <div class="contain_area">
        <div class="form_area">
            <div class="category_manu"><span>Manufacture From</span></div>

            <form action="" method="post">
                <div class="form_span">
                    <div class="in_name"><span class="in_name_text">
                        Manufacture Name</span></div>
                    <div class="in_value">
                        <input name="manufacture_name" type="text">
                    </div>
                </div>
                <div class="form_span">
                    <div class="in_name"><span class="in_name_text">Manufacture Descripton</span></div>
                    <div class="in_value">
                        <textarea name="manufacture_discription" rows="10"></textarea>
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
                    <div class="botton_1"><input type="submit" name="btn" value="Save Manufacture"></div>
                    <div class="botton_2"><input type="reset" name="btn" value="cancel"></div>


                </div>

            </form>
            <div class="message"><span>
                <?php
                echo $message;
                unset($message);
                ?></span></div>
        </div>
    </div>
</div>