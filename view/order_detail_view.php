<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta chrset="UTF-8">
    <title>購入明細画面</title>
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
    <h1>購入明細</h1>
    <div class="container">
    
    <?php include 'https://niko1105.github.io/bash-ec-portfolio/view/templates/messages.php'; ?>
    
      <table class="table-border">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php print $order['order_id'];?></td>
            <td><?php print $order['created']; ?></td>
            <td><?php print number_format($order['total_price']); ?>円</td>
    
      <table class="table-border">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>購入時の商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($order_details as $order_detail){ ?>
          <tr>
            <td><?php print $order_detail['name'];?></td>
            <td><?php print number_format($order_detail['price']); ?>円</td>
            <td><?php print $order_detail['amount']; ?></td>
            <td><?php print number_format($order_detail['subtotal']); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</body>
</html>