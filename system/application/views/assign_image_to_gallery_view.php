<?php include_once('header.php')?>
        <div id="content">
            <form id="command" name="frm" method="post" action="assign_image_to_gallery_controller/save_image_gallery_info">
                <h3>Assign Image to Gallery</h3>
                <?php foreach ($image_info_list as $image_info):?>
                    <img src="/arp/uploads/thumb/<?=$image_info->raw_name?>_thumb<?=$image_info->file_ext?>" width="75" alt="" />
                <?php endforeach; ?>

            </form>
        </div>
<?php include_once('footer.php')?>