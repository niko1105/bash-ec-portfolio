<?php 
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/item.php';

session_start();

if(is_logined() === false){
    redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$db = get_db_connect();
$user = get_login_user($db);

if (is_admin($user) === false){
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$name = get_post('name');
$price = get_post('price');
$status = get_post('status');
$stock = get_post('stock');
$img = get_file('img');

if(regist_item($db, $name, $price, $stock, $status, $img)){
  set_message('商品を登録しました。');
}else {
  set_error('商品の登録に失敗しました。');
}

redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/admin.php');
