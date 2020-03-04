<?php
mb_internal_encoding("utf8");

session_start();


if(empty($_POST['from_mypage'])){
    header("Location:login_error.php");
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="4eachblog_logo.jpg">
            <div class="logout"><a href="log_out.php" class="logout-button">ログアウト</a></div>
        </div>
    </header>
    
    <main>
        <form action="mypage_update.php" method="post" enctype="multipart/form-data">
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
                        <p>氏名:<input type="text"  size="30" name="name" value="<?php echo $_SESSION['name']?>" required></p>
                        <p>メール:<input type="text"  size="30" name="mail" pattern="^[a-z0-9._+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['mail']?>" required></p>
                        <p>パスワード:<input type="password"  size="30" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" value="<?php echo $_SESSION['password']?>" required></p>
                    </div>
                </div>
				
                <div class="comments">
                    <textarea rows="5" cols="85" name="comments" value="<?php echo $_SESSION['comments']?>"　required></textarea>
                </div>
                <div class="hensyubutton">
                        <input type="submit" class="submit_button" size="35" value="この内容に変更する">
                </div> 
             </div>  
        </form>
    </main>
</body>
    
</html>