<?php
include ('../lib/DB_conection.php');
$kat_name = $_POST[kat_name];
if(isset($_POST[ok]))
{
    $qveri = mysql_query("INSERT INTO shopbd.category(name_category) VALUES ('$kat_name')");
    echo 'запрос выполнен успешно';
}
else{
    echo 'запрос не выполнен';
}
?>
</br>
<a href="../Admin.php">вернуться</a>
