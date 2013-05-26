<?php include_once('header.php')?>
                <div id="content">
                    <div>
                        <?php foreach ($image_gallery_list as $image_gallery):?>
                            <a title="<?=$image_gallery->name?>" href="<? echo site_url('gallery_controller/selected/');?>/<?=$image_gallery->id?>">
                                <img src="/arp/uploads/thumb/<?=$image_gallery->raw_name?>_thumb<?=$image_gallery->file_ext?>" width="75" alt="<?=$image_gallery->name?>" />
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <br>
                    <?php
                        if (isset($image_list)) {
                            echo '<div id="gallery" class="gallery"">';
                                foreach ($image_list as $image) {
                                    echo '<a description="'.$image->description.'" title="'.$image->title.'" href="/arp/uploads/resized/'.$image->raw_name.'_resized'.$image->file_ext.'">';
                                        echo '<img src="/arp/uploads/thumb/'.$image->raw_name.'_thumb'.$image->file_ext.'" width="75" alt="" />';
                                    echo '</a>';
                                }
                            echo '</div>';
                        }
                    ?>
                    </div>
<?php include_once('footer.php')?>