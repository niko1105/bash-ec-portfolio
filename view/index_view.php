<!DOCTYPE HTML>
<html lang = "ja">
<head>
<meta chrset="UTF-8">
<title>ホーム</title>
<link rel="stylesheet" href="https://niko1105.github.io/bash-ec-portfolio/assets/css/style.css">
<body>
<header>
    <div class="left-header">
            <a class="icon" href="https://niko1105.github.io/bash-ec-portfolio/controller/index.php">BASH-EC</a>
            <img src="https://niko1105.github.io/bash-ec-portfolio/assets/images/dunk.png" width="70px" height="70px">
    </div>
    <div class="right-header">
        <p><?php print $user['name'] ; ?>さん</p>
        <div class="cartin"><a href="https://niko1105.github.io/bash-ec-portfolio/controller/cart.php"><img src="https://niko1105.github.io/bash-ec-portfolio/assets/images/cart.png" width ="50px" height="50px"></a></div>
        <div class="right_header_text"><a href="https://niko1105.github.io/bash-ec-portfolio/controller/order.php">購入履歴</a></div>
        <div class="right_header_text"><a href="logout.php">ログアウト</a></div>
    </div>
</header>
<main>
    <form method="get">
        <select name="sort">
            <option value="new"<?php if($sort === 'new'){ print 'selected';}?>>新着順</option>
            <option value="low_price"<?php if($sort === 'low_price'){ print 'selected';}?>>価格の安い順</option>
            <option value="high_price"<?php if($sort === 'high_price'){ print 'selected';}?>>価格の高い順</option>
        </select>
    <input type="submit" name="submit" value="並び替え">
    </form>
    <div id="container-home">
        <?php include 'templates/messages.php'; ?>
        <div id = "flex">
            <?php foreach ($items as $item)  { ?>
                <div class = "bash">
                    <span class="img_size"><img src="<?php print "https://niko1105.github.io/bash-ec-portfolio/assets/images" . $item['img']; ?>"></span>
                    <span><?php print $item['name']; ?></span>
                    <span>￥<?php print $item['price']; ?></span>
                <?php if ($item['stock'] > 0) { ?>
                    <form action="https://niko1105.github.io/bash-ec-portfolio/controller/index_add_cart.php" method="post">
                        <input type="hidden" name="item_id" value="<?php print $item['item_id']; ?>">
                        <p>
                        <input id="add" type="submit" name="submit" value="カートに追加">
                        </p>
                    </form>
                <?php } else { ?>
                    <span class="red">sold out</span>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</main>
</body>
</head>
</html>