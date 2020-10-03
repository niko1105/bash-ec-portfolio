<!DOCTYPE HTML>
<html lang = "ja">
<head>
<meta chrset="UTF-8">
<title>購入履歴</title>
<link rel="stylesheet" href="https://niko1105.github.io/bash-ec-portfolio/assets/css/style.css">
</head>
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
<h1>購入履歴</h1>
<div class="container">

    <?php include 'https://niko1105.github.io/bash-ec-portfolio/view/templates/messages.php'; ?>

    <?php if(count($orders) > 0){ ?>
      <table class="table-border">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>購入明細画面へ</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($orders as $order){ ?>
          <tr>
            <td><?php print $order['order_id'];?></td>
            <td><?php print $order['created']; ?></td>
            <td><?php print number_format($order['total_price']); ?>円</td>
            <td>
              <form action="https://niko1105.github.io/bash-ec-portfolio/controller/order_detail.php" method="get">
                <input type="submit" value="購入明細表示" class="btn btn-primary btn-block">
                <input type="hidden" name="order_id" value="<?php print $order['order_id'];?>">
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <?php } else { ?>
      <p>カートに商品はありません。</p>
    <?php } ?> 
 </div>
</body>
</html>
