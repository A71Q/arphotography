<html>
    <head>
        <title>Upload Form</title>
    </head>
    <body>
        <h3>Your file was successfully uploaded!</h3>
        <img src="/arp/uploads/resized/<?=$upload_data['raw_name']?>_resized<?=$upload_data['file_ext']?>"/>
        <a href="/arp/uploads/original/<?=$upload_data['raw_name']?><?=$upload_data['file_ext']?>">Original Image</a>
        <ul>
            <?php foreach($upload_data as $item => $value):?>
            <li>
                <?php echo $item;?>: <?php echo $value;?>
            </li>
            <?php endforeach; ?>
        </ul>
        <p>
            Thumb: <?php echo $thumb_success ?>
        </p>
        <p>
            Watermark: <?php echo $watermark_success ?>
        </p>
        <p>
            <?php echo anchor('image_info/', 'Update Image Info'); ?>
        </p>
        <p>
            <?php echo anchor('upload', 'Upload Another File!'); ?>
        </p>
    </body>
</html>