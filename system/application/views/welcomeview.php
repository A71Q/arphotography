<?php include_once('header.php')?>        
                <div id="content">
                    <div>
                        <h1>Recent Uploads</h1>
                    </div>
                    <br>
                    <div id="gallery" class="gallery">
                        <?php foreach ($image_infos as $image_info):?>
                            <a description="<?=$image_info->description?>" title="<?=$image_info->title?>" href="/arp/uploads/resized/<?=$image_info->raw_name?>_resized<?=$image_info->file_ext?>">
                                <img src="/arp/uploads/thumb/<?=$image_info->raw_name?>_thumb<?=$image_info->file_ext?>" width="75" alt="" />
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
<?php include_once('footer.php')?>