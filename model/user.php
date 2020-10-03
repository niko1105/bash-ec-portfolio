<?php 
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';

function get_user($db, $user_id){
  $sql = "
    SELECT
      user_id, 
      name,
      password,
      type
    FROM
      users
    WHERE
      user_id = :user_id
    LIMIT 1
  ";
  $params = array(':user_id' => $user_id);
  return fetch_query($db,$sql,$params); 
}

function get_user_by_name($db, $name){
  $sql = '
    SELECT
      user_id, 
      name,
      password,
      type
    FROM
      users
    WHERE
      name = :name
    LIMIT 1
  ';
  $params = array(':name' => $name);
  return fetch_query($db, $sql, $params);
}

function admin_user($db){
    $sql = '
            SELECT
                name,
                created
            FROM
                users
            GROUP BY 
                name
            ORDER BY 
                created
            DESC
    ' ;
    return fetch_all_query($db, $sql);
}

function login_as($db, $name, $password){
  $user = get_user_by_name($db, $name);
  if($user === false || $user['password'] !== $password){
    return false;
  }
  set_session('user_id', $user['user_id']);
  return $user;
}

function valid_name($name){
    $pattern =  '/\A[a-z0-9]{6,100}+\z/';
    $is_valid = true;
    if(empty($name) === true){
        set_error('ユーザー名を入力してください。');
        $is_valid = false;
    }elseif(preg_match($pattern, $name) !== 1){
        set_error('ユーザー名は6文字以上の半角英数字で入力してください。');
        $is_valid = false;
    }
    return $is_valid;
}

function valid_password($password){
    $pattern =  '/\A[a-z0-9]{6,100}+\z/';
    $is_valid = true;
    if(empty($password) === true){
        set_error('パスワードを入力してください。');
        $is_valid = false;
    }elseif(preg_match($pattern, $password) !== 1){
        set_error('パスワードは6文字以上の半角英数字で入力してください。');
        $is_valid = false;
    }
    return $is_valid;
}

function valid_user($name, $password){
    $valid_name = valid_name($name);
    $valid_password = valid_password($password);
    return $valid_name && $valid_password;
}

function insert_user($db, $name, $password){
  $sql = "
    INSERT INTO
      users(name, password)
    VALUES (:name,:password);
  ";
  $params = array(
    ':name' => $name,
    ':password' => $password
  );
  return execute_query($db, $sql, $params);
}

function get_login_user($db){
    $login_user_id = get_session('user_id');
    return get_user($db, $login_user_id);
}

function is_admin($user){
    return $user['type'] === 1;        
}