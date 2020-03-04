<?php
mb_internal_encoding("utf-8");

session_start();
    
    $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","root");

    $stmt=$pdo->prepare("update login_mypage set name=?,mail=?,password=?,comments=? where id=?");
    
    $stmt->bindValue(1,$_POST["name"]);
    $stmt->bindValue(2,$_POST["mail"]);
    $stmt->bindValue(3,$_POST["password"]);
    $stmt->bindValue(4,$_POST["comments"]);
	$stmt->bindValue(5,$_SESSION["id"]);
	
   

    $stmt->execute();

    $stmt=$pdo->prepare("select * from login_mypage where mail=? and password=?");

    $stmt->bindValue(1,$_POST["mail"]);
    $stmt->bindValue(2,$_POST["password"]);
    

    $stmt->execute();
    $pdo=NULL;

    while($row=$stmt->fetch()){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['picture']=$row['picture'];
        $_SESSION['comments']=$row['comments'];
    }

 
     header("Location:http://localhost/up/mypage.php");

?>
