<?php

mb_internal_encoding("utf8");
session_start();

if(empty($SESSION['id'])){

    try{
    $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
    }catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセスができません。<br>しばらくしてから再度ログインをして下さい。</p>
    <a href='http://localhost/up/login.php'>ログイン画面へ</a>"
       );
    }    

    $stmt=$pdo->prepare("select * from login_mypage where mail=? && password=?");


    $stmt->bindValue(1,$_POST['mail']);
    $stmt->bindValue(2,$_POST['password']);

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

    if(empty($_SESSION['id'])){
        header("Location:http://localhost/up/login_error.php");
    }

    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
}
?>



<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="4eachblog_logo.jpg">
            <div class="logout"><a href="log_out.php" class="logout-button">ログアウト</a></div>
        </div>
    </header>
    
    <main>
        <div class="box">
            <div class="topic">
                <h2>会員情報</h2>
            </div>
            <div class="hello">
                <?php echo"こんにちは！".$_SESSION['name']."さん"; ?>    
            </div>    
            <div class="basic_info">
                <div class="left">
                    <img  class="profile" src="<?php echo $_SESSION['picture']; ?>">
                </div>
                <div class="right">
                    <p>氏名:<?php echo $_SESSION['name'];?></p>
                    <p>メール:<?php echo $_SESSION['mail'];?></p>
                    <p>パスワード:<?php echo $_SESSION['password'];?></p>
                </div>
            </div>
            <div class="comments">
                <?php echo $_SESSION['comments']; ?>
            </div>
            <form action ="mypage_hensyu.php" method="post" class="form_center">
                <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
                <div class="hensyubutton">
                    <input type="submit" class="submit_button" size="35" value="編集する">
                </div>
            </form>           
        </div>        
    </main>
</body>
    
</html>






