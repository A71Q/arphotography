<?php include_once('header.php') ?>
    <div id="content">
        <?php echo $error; ?>
        <?php echo form_open_multipart('admin/upload/do_upload'); ?>
        <input type="file" name="userfile" size="20"/>
        <br/><br/>
        <input type="submit" value="upload"/>
        </form>
    </div>
<?php include_once('footer.php') ?>