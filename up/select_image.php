<?php
mb_internal_encoding("utf8");

$pdo =new PDO("mysql:dbname=lesson01;host=localhost;","root","");

$stmt=$pdo->prepare("select * from login_mypage where mail=? && password=?");

$stmt->bindvalue(1,$POST["mail"]);
$stmt->bindvalue(2,$POST["password"]);

$stmt->execute();
$pdo=NULL;

while($row=$stmt->fetch()){
    echo $row['mail'];
    echo $row['password'];
}
?>