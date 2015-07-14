<?php
include ('lib/DB_conection.php');

if(isset($_GET['id'])) $id = $_GET['id'];

$qvery_item = "SELECT * FROM shopbd.item WHERE id=".(int)$_GET['id'];
$result_item = mysql_query($qvery_item);
$arrey_item = mysql_fetch_array($result_item);

echo $arrey_item.'<br />';
echo print_r($arrey_item).'<br />';

$x = (int)$arrey_item['categ_id'];
$z = (int)$arrey_item['id_img'];

echo $x.'<br />';
echo $z.'<br />';

$qvery_one_kat = "SELECT * FROM shopbd.category WHERE shopbd.category.id=$x";
$qvery_one_img = "SELECT * FROM shopbd.img WHERE shopbd.img.id=$z";

$one_q_kat = mysql_query($qvery_one_kat);
var_dump($one_q_kat).'<br />';
echo print_r($one_q_kat).'<br />';
$one_q_img = mysql_query($qvery_one_img);
var_dump($one_q_img).'<br />';
echo print_r($one_q_img).'<br />';

$one_kat = mysql_fetch_row($one_q_kat);
echo print_r($one_kat).'--------------<br />';
var_dump($one_kat).'<br />';
$one_img = mysql_fetch_row($one_q_img);
echo print_r($one_img).'------------<br />';
var_dump($one_img).'<br />';

$qvery_kat = "SELECT * FROM shopbd.category ORDER BY id";
$qvery_img = "SELECT * FROM shopbd.img";

$result_kat = mysql_query($qvery_kat);
$result_img = mysql_query($qvery_img);


$array_kat = mysql_fetch_array($result_kat);
$array_img = mysql_fetch_array($result_img);


?>
<form action="action/redact_item_action.php" method="post"  >
ВНИМАНИЕ В НОВОЕ ЗНАЧЕНИЕ ОБЯЗАТЕЛЬНО НУЖНО ЗАПОЛНИТЬ ПОЛЯ ЦЕНЫ, НАИМЕНОВАНИЯ, КАТЕГОРИИ!!!!!!!!!!
<table>
	<tr>
		<td>Параметр</td><td>Старое значение</td><td>Новое значение</td>		
	</tr>
	<tr>
		<td>Наименование</td><td><?php echo $arrey_item['name']?></td><td><input type="text" name="item_name"/></td>		
	</tr>
	<tr>
		<td>Категория</td><td><?php echo $one_kat['name_categry']?></td><td><select name="Kategory">
										                        <?php
										                        do
										                        {
										                            echo '<option value="'.$array_kat['id'].'">'.$array_kat['name_category'].'</option>';
										                        }while($array_kat = mysql_fetch_array($result_kat)) ;                       
										                        ?>
										                        </select></td>		
	</tr>
	<tr>
		<td>Цена</td><td><?php echo $arrey_item['price']?></td><td><input type="text" name="costs"/></td>		
	</tr>
	<tr>
		<td>Картинка</td><td><img src="<?php echo $one_img['path_img']?>" alt="<?echo $one_img['path_img']?>" /></td><td><select name="Image">
																								                        <?php
																								                        echo '<option style="background-repeat: no-repeat; width: 150px; height: 40px;" value="-1"></option>';
																								                        do
																								                        {	                        	
																								                            echo '<option style="background-repeat: no-repeat; width: 133px; height: 60px; background-image: url('.$array_img['path_img'].');" value="'.$array_img['id'].'">'.$array_img['path_img'].'</option>';
																								                        }while($array_img = mysql_fetch_array($result_img)) ;                       
																								                        ?>
																								                        </select></td>		
	</tr>
	<tr>
		<td>Описание</td><td><?php echo $arrey_item['discript']?></td><td><textarea name="text"></textarea><br /></td>		
	</tr>	
</table>       
<input type="submit" value="Добавить" name="ok"/>                        
</form>