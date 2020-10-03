<?php
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/item.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/cart.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/order.php';

session_start();

if(is_logined() === false){
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$db = get_db_connect();
$user = get_login_user($db);

if(is_admin($user) === true){
      $orders = get_all_orders($db);
}else{
      $orders = get_user_orders($db,$user['user_id']);
}


include_once 'https://niko1105.github.io/bash-ec-portfolio/view/order_view.php';