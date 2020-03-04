<?php
mb_internal_encoding("utf8");

$temp_pic_name=$_FILES['picture']['tmp_name'];

$original_pic_name=$_FILES['picture']['name'];
$path_filename='./image/'.$original_pic_name;

move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="register_confirm.css">
    </head>
    <header>
        <div class="logo">
            <img src="4eachblog_logo.jpg">
        </div>
    </header>
        <body>
          <div class="box">
            <h1>会員登録 確認</h1><br>
                <h2>こちらの内容で登録しても宜しいでしょうか？</h2><br>
              
                    <div class="contents">
                        <p>氏名 :<?php echo $_POST['name'];?></p>
                        <p>メール :<?php echo $_POST['mail'];?></p>
                        <p>パスワード :<?php echo $_POST['password'];?></p>
                        <p>プロフィール写真 :<?php echo $original_pic_name;?></p>
                        <p>コメント :<?php echo $_POST['comments'];?></p>
                    </div>
              
                    <div class="button">
                        <form action="register_insert.php" method="post" class="post1">        
                            <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                            <input type="hidden" value="<?php echo $path_filename;?>" name="picture">
                            <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
                            <input type="submit" class="button2" value="登録する" />
                        </form>
                        
                        <form action="register.php" method="post" class="post2">
                            <input type="submit" class="button1" value="戻って修正する" />
                        </form>
                    </div>
            </div>
                <footer>© 2018 InterNous.inc ALL rights reserved</footer>
            
            
        </body>


</html>