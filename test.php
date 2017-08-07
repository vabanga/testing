<?php
if(isset($_GET["fileid"])) {
	define(PATH_UPLOAD,'test');
	$files = array();
	$k = 1;
	foreach (glob(PATH_UPLOAD."/*.json") as $filename) {
		$files[$k] = $filename;
		$k++;
		}
	if (file_exists($files[$_GET['fileid']])) {
		$cont = file_get_contents($files[$_GET['fileid']]);
		$tests = json_decode($cont,true);
		$title1 = $tests[0]["title"];
		$title2 = $tests[1]["title"];
		$ot1 = $tests[0]["answer"][0];
		$ot2 = $tests[0]["answer"][1];
		$ot3 = $tests[0]["answer"][2];
		$ot4 = $tests[0]["answer"][3];
		$otv1 = $tests[1]["answerr"][0];
		$otv2 = $tests[1]["answerr"][1];
		$otv3 = $tests[1]["answerr"][2];
		$otv4 = $tests[1]["answerr"][3];

	} else {
		?>
		<p style="color:red">Файл не найден</p>
		<?php
	}

}else{
	?>
	<p style="color:red">Неверные параметры</p>
	<?php
}
?>

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<form method="POST">
	<div name="var1">
		<p><?php echo $title1; ?></p>
		<label><input type="radio" name="raz[0]" value="no"><?php echo $ot1;?></label>
		<label><input type="radio" name="raz[0]" value=10><?php echo $ot2;?></label>
		<label><input type="radio" name="raz[0]" value="no"><?php echo $ot3;?></label>
		<label><input type="radio" name="raz[0]" value="no"><?php echo $ot4;?></label>
	</div>
	<div name="var2">
		<p><?php echo $title2; ?></p>
		<label><input type="radio" name="raz[1]" value="no"><?php echo $otv1;?></label>
		<label><input type="radio" name="raz[1]" value="no"><?php echo $otv2;?></label>
		<label><input type="radio" name="raz[1]" value=100><?php echo $otv3;?></label>
		<label><input type="radio" name="raz[1]" value="no"><?php echo $otv4;?></label>
	</div>
	<button type="submit">Ответить</button>
</form>
</body>
</html>

<?php

$otvet = $_POST["raz"];
var_dump($otvet);
echo "$otvet<br>";
foreach ($otvet as $v5){}

if(!is_numeric($v5)){
	echo "Вы ответили НЕ правильно";
}else{
	echo "Вы ответили правильно";
}


?>