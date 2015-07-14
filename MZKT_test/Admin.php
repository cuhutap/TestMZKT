<?php
	include ('lib/encoding.php');
	//include ('lib/DB_conection.php');
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav>
		<ul>
			<li><a href="index.php">Каталог</a></li>
			<li><a href="Admin.php">Админка</a></li>
		</ul>		
	</nav>
	<section>
		<ul>
			<li class="SubMenu"><a href="Admin.php?act=add">Добавление</a></li>
			<li class="SubMenu"><a href="Admin.php?act=redact">Редактирование</a></li>
		</ul>
		<?php		
		if($_GET['act']==add){
			echo '
				<ul>
					<li class="SubMenu"><a href="Admin.php?act='.$_GET['act'].'&z=kat'.'">Категории</a></li>
					<li class="SubMenu"><a href="Admin.php?act='.$_GET['act'].'&z=rea'.'">Записи</a></li>
					<li class="SubMenu"><a href="Admin.php?act='.$_GET['act'].'&z=img'.'">картинки</a></li>
				</ul>';
			switch ($_GET['z']) {
				case 'kat':
					include('action/add_kat.php');
					break;
				case 'rea':
					include('action/add_val.php');
					break;
				case 'img':
					include('action/add_img.php');
					break;				
				default:					
					break;
			}

		}
		if($_GET['act']==redact){
			echo '
				<ul>
					<li class="SubMenu"><a href="Admin.php?act='.$_GET['act'].'&z=kat'.'">Категории</a></li>
					<li class="SubMenu"><a href="Admin.php?act='.$_GET['act'].'&z=rea'.'">Записи</a></li>
					<li class="SubMenu"><a href="Admin.php?act='.$_GET['act'].'&z=img'.'">картинки</a></li>
				</ul>';
			switch ($_GET['z']) {
				case 'kat':
					include('action/redact_kat.php');
					break;
				case 'rea':
					include('action/redact_val.php');
					break;
				case 'img':
					include('action/redact_img.php');
					break;				
				default:					
					break;
			}
		}
		?>	
	</section>
	
	<footer>
		
	</footer>
</body>
</html>	
