<?php
include('lib/DB_conection.php');
$my_qvery= mysql_query("SELECT * FROM shopbd.category ORDER BY id");
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
			$qvery = "SELECT COUNT(*) FROM shopbd.item WHERE shopbd.item.categ_id = {$_GET['id']}";
			$e = mysql_query($qvery);
			$i = mysql_fetch_row($e);	
			if($i[0] == 0){
				mysql_query("DELETE FROM shopbd.category WHERE shopbd.category.id = {$_GET['id']}");
				echo "Запись удалена";
			}else echo "На эту запись ссылаются записи из таблици товаров и она не может быть удалена";			
		}		
	}
}
?>

<table>
	<?php
		foreach($super_array as $one_writing){
			echo '<tr> <td>id ='.$one_writing['id'].';</td> 
					   <td>имя категории = '.$one_writing['name_category'].'</td>
					   <td><a href="http://localhost/MZKT_test/Test/Admin.php?act=redact&z=kat&activ=del&id='.$one_writing['id'].'" >Удалить запись</a></td>  
				  </tr>';			
		}
		
	?>	
</table>