<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Тесты для студентов</title>
</head>
<body>
<?php

if(!isset($_GET['act'])) :

	?>
	<h3>Тесты для студентов</h3>
	<ul>
		<li><a href="?act=admin">Загрузить тест</a></li>
		<li><a href="?act=list">Список тестов</a></li>
	</ul>
	<?php

else :
	if($_GET['act']=='admin') :


		include_once 'admin.php';

	elseif ($_GET['act']=='list') :

		include_once 'list.php';
	elseif ($_GET['act']=='test') :

		include_once 'test.php';
	endif;
endif;

?>
</body>
</html>