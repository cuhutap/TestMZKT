<form action="action/add_img_action.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo (2*1024*1024); ?>">
    <input type="file" name="file"><br />
    <input type="submit" name="ok" value="Добавить"/>
</form>