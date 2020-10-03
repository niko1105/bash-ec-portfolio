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

$carts = get_user_carts($db, $user['user_id']);
$total_price = sum_carts($carts);

include_once 'https://niko1105.github.io/bash-ec-portfolio/view/cart_view.php';