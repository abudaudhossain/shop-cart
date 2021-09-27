<?php
require'./class_function/admin.php';
$obj_category = new Category();

$category_id = $_GET['category_id'];

$category_info = $obj_category -> view_update_category_info($category_id);


if(isset($_POST['btn'])){
    $obj_category -> update_category_info($_POST,$category_id);
}


?>


<div class="container">
    <div class="contain_manu">
        <span class="text_manu">Home > Update Category info</span>
    </div>
    <div class="contain_area">
        <div class="form_area">
            <div class="category_manu"><span>Category From</span></div>
            <form name="edit_category_form" action="" method="post">
                <div class="form_span">
                    <div class="in_name"><span class="in_name_text">Category Name</span></div>
                    <div class="in_value">
                        <input name="category_name" type="text" value='<?php echo $category_info['category_name']?>'>
                    </div>
                </div>
                <div class="form_span">
                    <div class="in_name"><span class="in_name_text">Category Descripton</span></div>
                    <div class="in_value">
                        <textarea name="category_discription" rows="10">
                            <?php
                                echo $category_info['category_discription']

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
                    <div class="botton_1"><input type="submit" name="btn" value="Save Category"></div>
                    <div class="botton_2"><input type="reset" name="btn" value="cancel"></div>
                </div>
            </form>
            
        </div>
    </div>
</div>

<script>
    document.forms['edit_category_form'].elements['publication_status'].value='<?php echo $category_info['publication_status'];?>';
</script>