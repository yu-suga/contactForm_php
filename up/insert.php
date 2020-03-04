<?php

mb_internal_encoding("utf8");
try{}
$pdo = new PDO("mysql:dbname=lesson01;localhost;","root","root");
}catch(PDOException $e){
    die("<p>現在サーバーが混み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインをしてください。</p> <a href='http://localhost/login/_mypge/login.php')ログイン画面へ</a>"
);
} 
$stmt=$pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");

$stmt->bindValue(1,$_POST["name"]);
$stmt->bindValue(2,$_POST["mail"]);
$stmt->bindValue(3,$_POST["password"]);
$stmt->bindValue(4,$_POST["path_filename"]);
$stmt->bindValue(5,$_POST["comments"]);


$stmt->execute();
$pdo=NULL;


?>