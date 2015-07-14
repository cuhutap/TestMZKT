<?php
include ('lib/DB_conection.php');

$qvery_kat = "SELECT * FROM shopbd.category ORDER BY id";
$qvery_img = "SELECT * FROM shopbd.img";

$result_kat = mysql_query($qvery_kat);
$result_img = mysql_query($qvery_img);

$array_kat = mysql_fetch_array($result_kat);
$array_img = mysql_fetch_array($result_img);

?>
<form action="action/add_item_action.php" method="post"  >
Выберите категорию : <select name="Kategory">
                        <?php
                        do
                        {
                            echo '<option value="'.$array_kat['id'].'">'.$array_kat['name_category'].'</option>';
                        }while($array_kat = mysql_fetch_array($result_kat)) ;                       
                        ?>
                        </select><br />
Наименование : <input type="text" name="item_name"/><br />
Введите стоймость : <input type="text" name="costs"/><br />
Выберите картинку : <select name="Image">
                        <?php
                        echo '<option style="background-repeat: no-repeat; width: 150px; height: 40px;" value="-1"></option>';
                        do
                        {	                        	
                            echo '<option style="background-repeat: no-repeat; width: 133px; height: 60px; background-image: url('.$array_img['path_img'].');" value="'.$array_img['id'].'">'.$array_img['path_img'].'</option>';
                        }while($array_img = mysql_fetch_array($result_img)) ;                       
                        ?>
                        </select><br />
Текст описания:         <textarea name="text"></textarea><br />
                        <input type="submit" value="Добавить" name="ok"/>
                        
</form>