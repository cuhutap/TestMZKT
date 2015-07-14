<?php
include('lib/DB_conection.php');
$my_qvery= mysql_query("SELECT * FROM shopbd.img ORDER BY id");
$my_categ_array = mysql_fetch_array($my_qvery);

$super_array = array();
do{
	$super_array[] = $my_categ_array;
}while($my_categ_array = mysql_fetch_array($my_qvery));

if(isset($_GET['activ']) && $_GET['activ'] == 'del'){
	if(isset($_GET['id'])){
		$exist = FALSE;		
		foreach($super_array as $one){
			if(array_search($_GET['id'],$one) == 'id') $exist = TRUE;
		}		
		if($exist){ 
			$qvery = "SELECT COUNT(*) FROM shopbd.item WHERE shopbd.item.id_img = {$_GET['id']}";
			$e = mysql_query($qvery);
			$i = mysql_fetch_row($e);	
			if($i[0] == 0){
				$linc;
				foreach($super_array as $one){
					if(array_search($_GET['id'],$one) == 'id') $linc = $one['path_img'];
				}
				if(unlink($linc)){
					mysql_query("DELETE FROM shopbd.img WHERE shopbd.img.id = {$_GET['id']}");
					echo "Картинка удалена";
				}else echo"картинка не удалена";
				
			}else echo "Картинка не может быть удалена так как на неё ссылается запись товара";			
		}		
	}
}
?>

<table>
	<?php
		foreach($super_array as $one_writing){
			echo '<tr> <td>id ='.$one_writing['id'].';</td> 
					   <td><img src="'.$one_writing['path_img'].'" alt="'.$one_writing['path_img'].'"></td>
					   <td><a href="http://localhost/MZKT_test/Test/Admin.php?act=redact&z=img&activ=del&id='.$one_writing['id'].'" >Удалить картинку</a></td>  
				  </tr>';			
		}
		
	?>	
</table>