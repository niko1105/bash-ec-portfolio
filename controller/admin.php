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

$items = get_all_items($db);

include_once 'https://niko1105.github.io/bash-ec-portfolio/view/admin_view.php';