<?php 
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';

session_start();

if(is_logined() === false){
    redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}

$db = get_db_connect();
$users = admin_user($db);


include_once 'https://niko1105.github.io/bash-ec-portfolio/view/admin_user_view.php';