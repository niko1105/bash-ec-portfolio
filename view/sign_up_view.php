<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta chrset="UTF-8">
    <title>新規登録</title>
    <link rel="stylesheet" href="https://niko1105.github.io/bash-ec-portfolio/assets/css/style.css">

<body>
    <header>
        <div class="left-header">
            <a class="icon" href="https://niko1105.github.io/bash-ec-portfolio/controller/login.php">BASH-EC</a>
            <img src="img/dunk.png" width="70px" height="70px">
        </div>
    </header>
    <div class="container">
        <?php include 'https://niko1105.github.io/bash-ec-portfolio/view/templates/messages.php'; ?>
        <form class="log-f" action="" method="POST">
            <input type="text" name="user_name" placeholder="ユーザー名"><br>
            <input type="password" name="user_pass" placeholder="パスワード"><br>
            <input class="submit_button" type="submit" name="submit" value="新規登録">
        </form>
    </div>
</body>
</head>

</html>