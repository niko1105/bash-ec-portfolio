<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>商品在庫管理</title>
  <style>
    section {
      margin-bottom: 20px;
      border-top: solid 1px;
    }

    ul li {
      list-style: none;
    }

    ul {
      width: 300px;
      padding-left: 0;
    }

    label {
      margin-right: 10px;
      width: 80px;
    }

    .label-item {
      margin-right: 6px;
    }

    .label-size {
      margin-right: 25px;
    }

    table {
      width: 660px;
      border-collapse: collapse;
    }

    table,
    tr,
    th,
    td {
      border: solid 1px;
      padding: 10px;
      text-align: center;
    }

    caption {
      text-align: left;
    }

    .name-d {
      width: 100px;
    }

    .price-d {
      text-align: right;
    }

    .stock-d {
      width: 60px;
    }

    .status_false {
      background-color: #A9A9A9;
    }
  </style>
</head>

<body>
  <h1>商品管理ページ</h1>
  <a href="https://niko1105.github.io/bash-ec-portfolio/controller/admin_user.php">ユーザー管理ページへ</a>
  <form action="https://niko1105.github.io/bash-ec-portfolio/controller/logout.php" method="post">
    <input type="submit" value="ログアウト">
  </form>

  <section>
    <h2>新規商品追加</h2>
    <?php include 'templates/messages.php'; ?>
    <form method="post" action="https://niko1105.github.io/bash-ec-portfolio/controller/admin_insert_item.php" enctype="multipart/form-data">
      <ul>
        <li><label class="label-item">商品名: </label><input type="text" name="name" value=""></li>
        <li><label class="label-size">価格:</label><input type="text" name="price" value=""></li>
        <li><label class="label-size">個数:</label><input type="text" name="stock" value=""></li>
      </ul>
      <div><input type="file" name="img"></div>
      <div>
        <select name="status">
          <option value="0">非公開</option>
          <option value="1">公開</option>
        </select>
      </div>
      <div><input type="submit" value="■□■□■商品追加■□■□■"></div>
    </form>
  </section>

  <section>
    <h2>商品情報変更</h2>
    <table>
      <caption>商品一覧</caption>
      <tr>
        <th>商品画像</th>
        <th>商品名</th>
        <th>価格</th>
        <th>在庫数</th>
        <th>ステータス</th>
      </tr>
      <?php foreach ($items as $item) { ?>
        <?php if ($item['status'] === 1) { ?>
          <tr>
          <?php } else { ?>
          <tr class="status_false">
          <?php } ?>
          <td><img src="<?php print 'https://niko1105.github.io/bash-ec-portfolio/assets/images' . $item['img']; ?>" width="200px" height="200px"></td>
          <td class="name-d"><?php print $item['name']; ?></td>
          <td class="price-d"><?php print $item['price']; ?>円</td>

          <form method="post" action="https://niko1105.github.io/bash-ec-portfolio/controller/admin_change_stock.php">
            <td><input type="text" class="stock-d" name="stock" value="<?php print $item['stock']; ?>">個&nbsp;&nbsp;<input type="submit" value="変更"></td>
            <input type="hidden" name='item_id' value="<?php print $item['item_id']; ?>">
          </form>

          <form method="post" action="https://niko1105.github.io/bash-ec-portfolio/controller/admin_change_status.php">
            <?php if (is_open($item) === true) { ?>
              <td><input type="submit" value="公開 → 非公開"></td>
              <input type="hidden" name="change_status" value="close">
            <?php } else { ?>
              <td><input type="submit" value="非公開 → 公開"></td>
              <input type="hidden" name="change_status" value="open">
            <?php } ?>
            <input type="hidden" name='item_id' value="<?php print $item['item_id']; ?>">
          </form>

          <form method="post" action="https://niko1105.github.io/bash-ec-portfolio/controller/admin_delete_item.php">
            <td><input type="submit" value="削除"></td>
            <input type="hidden" name='item_id' value="<?php print $item['item_id']; ?>">
          </form>
          </tr>
        <?php } ?>
    </table>
  </section>
</body>

</html>