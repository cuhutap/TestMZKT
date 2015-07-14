<?php 
include ('../lib/DB_conection.php');
if(isset($_POST['ok'])){
	$kateg_id = $_POST['Kategory'];
	$item_name = $_POST['item_name'];
	$costs = $_POST['costs'];
	if(isset($_POST['Image']) && ($_POST['Image'] != -1))$img_id = $_POST['Image'];
	if(isset($_POST['text']) && ($_POST['text'] !=NULL))$text = $_POST['text'];
	
	if((!isset($img_id)) &&
		 (!isset($text))){
		 	mysql_query("INSERT INTO shopbd.item(categ_id , 
		 										 name,
		 										 price)
		 								  VALUES ('$kateg_id',
		 								  		 '$item_name',
		 								  		 '$costs')");
		 	echo 'запрос выполнен успешн';
		 }
	if((isset($img_id)) &&
		(!isset($text))){
			mysql_query("INSERT INTO shopbd.item(categ_id , 
		 										 name,
		 										 price,
		 										 id_img)
		 								  VALUES ('$kateg_id',
		 								  		 '$item_name',
		 								  		 '$costs',
		 								  		 '$img_id')");
		 	echo 'запрос выполнен успешн';
		}
	if((isset($text)) &&
		(!isset($img_id))){
			mysql_query("INSERT INTO shopbd.item(categ_id , 
		 										 name,
		 										 price,
		 										 discript)
		 								  VALUES ('$kateg_id',
		 								  		 '$item_name',
		 								  		 '$costs',
		 								  		 '$text')");
		 	echo 'запрос выполнен успешн';
		}
	if((isset($img_id)) &&
		(isset($text))){
			mysql_query("INSERT INTO shopbd.item(categ_id , 
		 										 name,
		 										 price,
		 										 id_img,
		 										 discript)
		 								  VALUES ('$kateg_id',
		 								  		 '$item_name',
		 								  		 '$costs',
		 								  		 '$img_id',
		 								  		 '$text')");
		 	echo 'запрос выполнен успешн';
		}	
}
?>
</br>
<a href="../Admin.php">вернуться</a>