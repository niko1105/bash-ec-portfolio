<?php
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/item.php';

session_start();

if(is_logined() === false){
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$db = get_db_connect();
$user = get_login_user($db);

if(is_admin($user) === false){
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$item_id = get_post('item_id');
$stock = get_post('stock');

if(update_item_stock($db, $item_id, $stock)){
  set_message('在庫数を変更しました。');
} else {
  set_error('在庫数の変更に失敗しました。');
}
redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/admin.php');