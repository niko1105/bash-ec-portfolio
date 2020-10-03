<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta chrset="UTF-8">
    <title>カート</title>
    <link rel="stylesheet" href="https://niko1105.github.io/bash-ec-portfolio/assets/css/style.css">
</head>

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
            <div class="right_header_text"><a href="logout.php">ログアウト</a></div>
        </div>

    </header>
    <main>
        <h1>カート</h1>
        <?php include 'templates/messages.php'; ?>

        <?php if (count($carts) > 0) { ?>
            <div class="container-cart">
                <?php foreach ($carts as $cart) { ?>
                    <div class="cart-item">
                        <div><img src="<?php print "https://niko1105.github.io/bash-ec-portfolio/assets/images" . $cart['img']; ?>"></span></div>
                        <p><?php print $cart['name']; ?></p>
                        <p>￥<?php print $cart['price']; ?></p>
                        <form method="post" action='https://niko1105.github.io/bash-ec-portfolio/controller/cart_change_amount.php'>
                            <input type="number" name="amount" value="<?php print $cart['amount']; ?>">個
                            <input type="hidden" name="cart_id" value="<?php print $cart['cart_id']; ?>">
                            <input type="submit" value="変更">
                        </form>
                        <form method="post" action='https://niko1105.github.io/bash-ec-portfolio/controller/cart_delete.php'>
                            <input type="hidden" name="cart_id" value="<?php print $cart['cart_id']; ?>">
                            <input type="submit" value="削除">
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class="price">
                <p>合計&nbsp;<span>￥<?php print $total_price; ?></span></p>
                <form method="post" action='https://niko1105.github.io/bash-ec-portfolio/controller/purchase.php'>
                    <input id="buy" type="submit" name="purchase" value="購入する">
                </form>
            </div>
        <?php } else { ?>
            <div class="message"><?php print 'カートに商品がございません。'; ?></div>
        <?php } ?>
    </main>
</body>

</html>