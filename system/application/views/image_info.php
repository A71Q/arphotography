<?php include_once('header.php')?>
    <div id="content">
        <form id="command" name="frm" method="post" action="save_image_info">
            <h3>Your file was successfully uploaded!</h3>
            <input type="hidden" value="<?=$image_id?>" id="image_id" name="image_id"/>
            <img src="/arp/uploads/resized/<?=$upload_data['raw_name']?>_resized<?=$upload_data['file_ext']?>"/>
            <br>
            <p>
                Image Title: <input id="image_title" name="image_title" type="text" value="" size="70" maxlength="200"/>
            </p>
            <br>
            <p>
                Description: <textarea id="image_description" name="image_description" value="" rows="3" cols="70"></textarea>
            </p>
            <br>
            <p>
                Choose Gallery: <select name="select_gallery">
                <?php foreach ($image_gallery_list as $image_gallery):?>
                    <option value="<?=$image_gallery->id?>"><?=$image_gallery->name?></option>
                <?php endforeach; ?>
                </select>
            </P>
            <br>
            <p>
                <button type="submit" style="float:left;margin-left:100px">Save</button>
            </p>
        </form>
    </div>
<?php include_once('footer.php')?>