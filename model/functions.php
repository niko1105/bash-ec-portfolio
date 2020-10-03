<?php 

function dd($str){
     return var_dump($str);
}

function redirect_to($url){
    header('Location:'. $url);
    exit;
}

function get_post($name){
    if(isset($_POST[$name]) === true){
        return $_POST[$name];
    }
    return '';
}

function get_get($name){
    if(isset($_GET[$name]) === true){
        return $_GET[$name];
    }
    return '';
}

function get_file($name){
  if(isset($_FILES[$name]) === true){
    return $_FILES[$name];
  };
  return array();
}

function get_session($name){
  if(isset($_SESSION[$name]) === true){
    return $_SESSION[$name];
  };
  return '';
}

function set_session($name, $value){
  $_SESSION[$name] = $value;
}


function get_errors(){
  $errors = get_session('__errors');
  if($errors === ''){
    return array();
  }
  set_session('__errors',  array());
  return $errors;
}

function set_error($error){
  $_SESSION['__errors'][] = $error;
}

function get_messages(){
  $messages = get_session('__messages');
  if($messages === ''){
    return array();
  }
  set_session('__messages',  array());
  return $messages;
}

function set_message($message){
  $_SESSION['__messages'][] = $message;
}


function is_logined(){
  return get_session('user_id') !== '';
}

function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function has_error(){
    return isset($_SESSION['__errors']) && count($_SESSION['__errors']) !== 0;
}

function get_upload_filename($file){
    if(is_valid_upload_image($file) === false){
        return '';
    }
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    return get_random_string() . '.' . $extension;
}

function get_random_string($length = 20){
  return substr(base_convert(hash('sha256', uniqid()), 16, 36), 0, $length);
}

function save_image($img, $filename){
  return move_uploaded_file($img['tmp_name'], 'https://niko1105.github.io/bash-ec-portfolio/assets/images' . $filename);
}

function is_valid_upload_image($img){
  if(is_uploaded_file($img['tmp_name']) === false){
    set_error('ファイル形式が不正です。');
    return false;
  }
  $new_img = $img['name'];
   $extension = pathinfo($new_img, PATHINFO_EXTENSION);
  if($extension !== 'jpg' && $extension !== 'jpeg'){
    set_error('ファイル形式が異なります。画像ファイルはJPEGのみ利用可能です。');
    return false;
  }
  return true;
}


function delete_image($filename){
  if(file_exists('https://niko1105.github.io/bash-ec-portfolio/assets/images' . $filename) === true){
    unlink('https://niko1105.github.io/bash-ec-portfolio/assets/images' . $filename);
    return true;
  }
  return false;
}

