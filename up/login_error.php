<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="login_error.css">
</head>
    <header>
        <div class="logo">
            <img src="4eachblog_logo.jpg">
            <div class="login-page"><a href="Login.php">ログイン</a></div>
        </div>
    </header>
<body>
    <form action="mypage.php" method="post">
        <div class="contents">
            <div class="message">
                <p>メールアドレスまたはパスワードが間違っています。</p>
            </div>
            
            <div class="mail">
                <label>メールアドレス</label><br>
                <input type="text" class="text"  name="mail">
            </div>
            <div class="password">    
                <label>パスワード</label><br>
                <input type="text" class="text"  name="password">
            </div>
            <div class="login">
                <input type="submit" class="submit-button" name="login" value="ログイン">
            </div>
        </div>
    </form>
    
     <footer>© 2018 InterNous.inc ALL rights reserved</footer>
            
    
</body>




</html>




