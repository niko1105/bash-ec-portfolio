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

$item_id = get_post('item_id');
$change_status = get_post('change_status');

if($change_status === 'open'){
    update_item_status($db, $item_id, 1);
    set_message('ステータスを変更しました。');
}else if($change_status === 'close'){
    update_item_status($db, $item_id, 0);
    set_message('ステータスを変更しました。');
}else{
    set_error('不正なリクエストです。');
}

redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/admin.php');
