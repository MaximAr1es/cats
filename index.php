<?php 
error_reporting(0);
define(ROOT, $_SERVER['DOCUMENT_ROOT']);


$pdo = init();
$stmt = $pdo->query("SHOW DATABASES");
$dbs = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Соединение с БД
function init(){
    $config = parse_ini_file(ROOT.'/sys/config.ini');
    $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['schema']}";
    return new PDO($dsn, $config['user'], $config['password']);
}




$sql_check = "SELECT MAX(id) FROM ct_peoples";
$stmt = $pdo->query($sql_check);
$row = $stmt->fetch(PDO::FETCH_NUM);
$id = $row[0] + 1;


register($pdo, $id);

function register($pdo, $id){
    $insert = "INSERT INTO ct_peoples (id) VALUES ($id)";
    $sql_insert = $pdo->query($insert);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>&#10084;CATS&#10084;</title>
    <link rel="stylesheet" href="style/reset.css" />
    <link rel="stylesheet" href="style/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="block-audio">
	    <audio class="audio" controls autoplay="autoplay" loop="loop" preload="auto">
            <source src="media/cats.mp3" type="audio/mpeg">
        </audio>
	    <p class="audio">Если ты юзаешь iOS и музыка не включилась, то включи её сам. :)</p>
	</div>
    <div class="block-video">
        <video class="video" id="vid" preload="auto" muted playsinline autoplay="autoplay" loop="loop" poster="media/cats.jpg">
		    <source src="media/cats.mp4" type='video/mp4'>
        </video>
	</div>
    <div class="footer">
        <p class="amount">Количество посещений = </p><p class="value"><?php print $id;?></p><br>
        <a target="_blank" class="copyright" href="https://vk.com/ar1es_dx1y">&copy;Максим</a>
    </div>
	
</body>
</html>




