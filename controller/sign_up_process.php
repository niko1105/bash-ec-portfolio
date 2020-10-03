<?php
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/user.php';

session_start();

if(is_logined() === true){
    redirect('https://niko1105.github.io/bash-ec-portfolio/controller/index.php');
}

$name = get_post('name');
$password = get_post('passwprd');
$db = get_db_connect();

try{
    if(valid_user($name, $password) === true){
        return insert_user($db, $name, $password);
    }else{
        set_error('ユーザー登録に失敗しました。');
        redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/sign_up.php');
    }
}catch(PDOException $e){
    set_error('ユーザー登録に失敗しました。');
    redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/sign_up.php');
}

set_message('ユーザー登録が完了しました。');
login_as($db, $name, $password);
redirect_to('https://niko1105.github.io/bash-ec-portfolio/controller/index.php');

