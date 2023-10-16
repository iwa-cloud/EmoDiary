<?php
$pdo=new PDO('mysql:host=mysql212.phy.lolipop.lan;dbname=LAA1418431-music;charset=utf8','LAA1418431', 'music07');
$sql1 = "SELECT user_id FROM user_tbl ORDER BY user_id DESC LIMIT 1";
$ps1 = $pdo->prepare($sql1);
$ps1->execute();
$result =$ps1->fetchAll();
$user_id = $result[0][0]+1;
$icon_id = (int)$user_id % 20;   
// $pdo = new PDO('mysql:host=mysql208.phy.lolipop.lan;dbname=LAA1418431-php;charset=utf8','LAA1418431','pass0817');
$sql = "INSERT INTO user_tbl(user_id,icon_id,user_mail,user_name,user_pass) VALUES ( ?,?,?,?,?)";
$ps=$pdo->prepare($sql);
$ps->bindValue(1,$user_id,PDO::PARAM_INT);
$ps->bindValue(2,$icon_id,PDO::PARAM_INT);
$ps->bindValue(3,$_POST['mail'],PDO::PARAM_STR);
$ps->bindValue(4,$_POST['name'],PDO::PARAM_STR);
$ps->bindValue(5,$_POST['pass'],PDO::PARAM_STR);
// $ps->bindValue(4,$_POST['address'],PDO::PARAM_STR);
$ps->execute();
header('Location:sinnkitourokukanryou.php');
// echo"新規会員登録が完了しました<br>";
// echo"メアド(アカウント):".$_POST['mail']."<br>";
// echo"氏名:".$_POST['name']."<br>";
// echo"住所:".$_POST['address'];
?>