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
$amount = get_post('amount');

if(update_cart_amount($db, $cart_id, $amount)){
    set_message('購入数を変更しました。');
}else{
    set_error('購入数の更新に失敗しました。');
}

redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/cart.php');