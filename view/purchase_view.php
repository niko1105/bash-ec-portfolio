<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta chrset="UTF-8">
    <title>購入完了ページ</title>
    <link rel="stylesheet" href="https://niko1105.github.io/bash-ec-portfolio/assets/css/style.css">

<body>
    <header>
        <div class="left-header">
            <a class="icon" href="https://niko1105.github.io/bash-ec-portfolio/controller/index.php">BASH-EC</a>
            <img src="https://niko1105.github.io/bash-ec-portfolio/assets/images/dunk.png" width="70px" height="70px">
        </div>
        <div class="right-header">
            <p><?php print $user['name']; ?>さん</p>
            <div class="cartin"><a href="https://niko1105.github.io/bash-ec-portfolio/controller/cart.php"><img src="https://niko1105.github.io/bash-ec-portfolio/assets/images/cart.png" width="50px" height="50px"></a></div>
            <div class="right_header_text"><a href="https://niko1105.github.io/bash-ec-portfolio/controller/order.php">購入履歴</a></div>
            <div class="right_header_text"><a href="https://niko1105.github.io/bash-ec-portfolio/controller/logout.php">ログアウト</a></div>
        </div>
    </header>
    <main>
        <div class="message">
            <p><?php print 'ご購入ありがとうございました。'; ?></p>
        </div>
        <div class="container-cart">
            <?php include 'https://niko1105.github.io/bash-ec-portfolio/view/templates/messages.php'; ?>
            <?php foreach ($carts as $cart) { ?>
                <div class="cart-item">
                    <img src="<?php print "https://niko1105.github.io/bash-ec-portfolio/assets/images" . $cart['img']; ?>">
                    <p><?php print $cart['name']; ?></p>
                    <p><?php print $cart['amount']; ?>個</p>
                    <p>￥<?php print $cart['price']; ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="price">
            <p>合計&nbsp;<span>￥<?php print $total_price; ?></span></p>
        </div>
    </main>
</body>

</html>