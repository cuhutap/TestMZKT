<?php
include ('../lib/DB_conection.php');

if ($_FILES['file']['size'] > 0 && $_FILES['file']['size'] < (2*1024*1024)) upload();
else echo'�������� �� ���������';

function upload() {
    if(move_uploaded_file($_FILES['file']['tmp_name'],'../worck_img/'.$_FILES['file']['name'])){
	
	   	$path = 'worck_img/'.$_FILES['file']['name']; 
	    if(mysql_query("INSERT INTO shopbd.img (path_img) VALUES('$path')"))echo "������ ���������";
	    echo '�������� ���������';
    }
}
?>
</br>
<a href="../Admin.php">���������</a>