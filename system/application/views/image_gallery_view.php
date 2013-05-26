<?php include_once('header.php')?>
        <div id="content">
            <?php foreach ($image_gallery_list as $image_gallery):?>
                Name: <?=$image_gallery->name?>&nbsp;Desc: <?=$image_gallery->description?><br>
            <?php endforeach; ?>
            <form id="command" name="frm" method="post" action="image_gallery_controller/save_image_gallery_info">
                <h3>Create New Image Gallery</h3>
                Name: <input type="text" id="gallery_name" name="gallery_name"><br>
                Description: <input type="text" id="gallery_desc" name="gallery_desc"><br>
                <button type="submit" style="float:left;margin-left:100px">Save</button>
            </form>
        </div>
<?php include_once('footer.php')?>