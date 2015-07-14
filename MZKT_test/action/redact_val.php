<?php

include('lib/DB_conection.php');
$my_qvery= mysql_query("SELECT  item.id id,
							item.name name, 
					        item.price price,
							category.name_category categ,
					        img.path_img img, 
					        item.discript dis 
					        FROM shopbd.item
					        LEFT JOIN shopbd.category ON shopbd.item.categ_id = shopbd.category.id
							LEFT JOIN shopbd.img ON shopbd.item.id_img = shopbd.img.id 
							ORDER BY id");
							
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
				mysql_query("DELETE FROM shopbd.img WHERE shopbd.img.id = {$_GET['id']}");
				echo "Запись удалена";					
		}		
	}
}
if(isset($_GET['activ']) && $_GET['activ'] == 'red'){
	if(isset($_GET['id'])){
		$exist = FALSE;		
		foreach($super_array as $one){
			if(array_search($_GET['id'],$one) == 'id') $exist = TRUE;
		}
		if($exist){
			//$_COOKIE['id'] = 'id';
			include('action/redact_kat_action.php');			
		}
	}
}
?>

<table>
	<?php
		foreach($super_array as $one_writing){
				echo '<tr> <td>id ='.$one_writing['id'].';</td>
						   <td>Наименование ='.$one_writing['name'].';</td>
						   <td><img src="'.$one_writing['img'].'" alt="'.$one_writing['img'].'"></td>						   
						   <td>Цена ='.$one_writing['price'].';</td>
						   <td>Категория ='.$one_writing['categ'].';</td> 
						   <td>Описание ='.$one_writing['dis'].';</td>						   
						   <td><a href="http://localhost/MZKT_test/Test/Admin.php?act=redact&z=rea&activ=del&id='.$one_writing['id'].'" >Удалить запись</a></td>  
						   <td><a href="http://localhost/MZKT_test/Test/Admin.php?act=redact&z=rea&activ=red&id='.$one_writing['id'].'" >Редактировать запись</a></td>
				  </tr>';			
		}
		
	?>	
</table>