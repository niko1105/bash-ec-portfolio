<?php 
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/item.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/cart.php';

session_start();

if(is_logined() === false){
    redirect_to('login.php');
}

$db = get_db_connect();
$user = get_login_user($db);
$item_id = get_post('item_id');

if(add_cart($db, $user['user_id'], $item_id)){
  set_message('カートに商品を追加しました。');
}else{
  set_error('カートの更新に失敗しました。');
}

redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/index.php');