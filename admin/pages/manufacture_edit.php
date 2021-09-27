<?php
require './class_function/admin.php';
$obj_manufacture = new Manufacture();

$manufacture_id = $_GET['manufacture_id'];

$manufacture_info = $obj_manufacture -> view_update_manufacture_info($manufacture_id);


if(isset($_POST['btn'])){
    $obj_manufacture -> manufacture_update_info($_POST,$manufacture_id);
}


?>


<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Update manufacture info</span>
    </div>
    <div class="contain_area">
        <div class="form_area">
            <div class="manufacture_manu"><span>manufacture From</span></div>
            <form name="edit_manufacture_form" action="" method="post">
                <div class="form_span">
                    <div class="in_name"><span class="in_name_text">manufacture Name</span></div>
                    <div class="in_value">
                        <input name="manufacture_name" type="text" value='<?php echo $manufacture_info['manufacture_name']?>'>
                    </div>
                </div>
                <div class="form_span">
                    <div class="in_name"><span class="in_name_text">manufacture Descripton</span></div>
                    <div class="in_value">
                        <textarea name="manufacture_discription" rows="10">
                            <?php
                                echo $manufacture_info['manufacture_discription']

                            ?>
                        </textarea>
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
                    <div class="botton_1"><input type="submit" name="btn" value="Save manufacture"></div>
                    <div class="botton_2"><input type="reset" name="btn" value="cancel"></div>
                </div>
            </form>
            
        </div>
    </div>
</div>

<script>
    document.forms['edit_manufacture_form'].elements['publication_status'].value='<?php echo $manufacture_info['publication_status'];?>';
</script>