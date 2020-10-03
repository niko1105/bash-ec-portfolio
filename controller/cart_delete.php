<?php
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/item.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/cart.php';

session_start();

if(is_logined() === false){
    redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$db = get_db_connect();
$user = get_login_user($db);
$cart_id = get_post('cart_id');

if(delete_cart($db, $cart_id)){
    set_message('商品を削除しました。');
}else{
    set_error('削除に失敗しました。');
}

redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/cart.php');