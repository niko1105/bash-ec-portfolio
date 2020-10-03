<?php 

require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';

session_start();

if(is_logined() === true){
    redirect_to('index.php');
}

$name = get_post('name');
$password = get_post('password');
$db = get_db_connect();
$user = login_as($db, $name, $password);

if( $user === false){
  set_error('ログインに失敗しました。');
  redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/login.php');
}
set_message('ログインしました。');

if($user['type'] === 1){
    redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/admin.php');
}

redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/index.php');