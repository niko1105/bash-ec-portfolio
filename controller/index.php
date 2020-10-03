<?php 
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/item.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';

session_start();

if(is_logined() === false){
    redirect_to('login.php');
}

$db = get_db_connect();
$user = get_login_user($db);
$sort = get_get('sort');
$items = get_items($db, false, $sort);

include_once 'https://niko1105.github.io/bash-ec-portfolio/view/index_view.php';