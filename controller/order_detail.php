<?php
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/item.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/cart.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/order_detail.php';

session_start();

if(is_logined() === false){
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$db = get_db_connect();
$user = get_login_user($db);
$order_id = get_get('order_id');
$order = get_order($db,$order_id);

if($user['user_id'] !== $order['user_id'] && is_admin($user) === false){
  set_error('不正なアクセスです');
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/order.php');
}
$order_details = get_order_details($db, $order_id);


include_once 'https://niko1105.github.io/bash-ec-portfolio/view/order_detail_view.php';