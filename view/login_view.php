<!DOCTYPE HTML>
<html lang = "ja">
<head>
    <meta chrset = "UTF-8">
    <title>ログイン</title>
    <link rel = "stylesheet" href = "https://niko1105.github.io/bash-ec-portfolio/assets/css/style.css">
    <body>
        <header>
        <div class="left-header">
                <a class="icon" href="home.php">BASH-EC</a>
                <img src="img/dunk.png" width="70px" height="70px">
        </div>
        </header>
        <div class = "container-log">
            <?php include 'templates/messages.php'; ?>
            <form class="log-f" action = "https://niko1105.github.io/bash-ec-portfolio/controller/login_process.php" method = "POST">
            <input type = "text" name = "name" placeholder = "ユーザー名"><br>
            <input type = "password" name = "password" placeholder = "パスワード"><br>
            <input class = "submit_button" type = "submit" name = "submit" value = "ログイン">
            </form>
            <div class = "signin"><a href = "signin.php" >ユーザーの新規作成</a></div>
        </div>
    </body>
</head>
</html>