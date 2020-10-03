<?php 

function get_db_connect(){
    $host = 'localhost';
    $username = 'codecamp31631';
    $password = 'VQYRBJDV';
    $dbname = 'codecamp31631';
    $charset = 'utf8';
    
    $dsn = 'mysql:dbname=' . $dbname . ';host=' . $host . ';charset=' . $charset; 
    
    try{
        $dbh = new PDO($dsn,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'));
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(PDOException $e){
        exit('接続できませんでした。理由：'. $e->getMessage());
    }
    return $dbh;
}

function fetch_query($db, $sql, $params = array()){
  try{
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetch();
  }catch(PDOException $e){
    set_error('データ取得に失敗しました。');
  }
  return false;
}

function fetch_all_query($db, $sql, $params = array()){
    try{
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }catch(PDOException $e){
    set_error('データ取得に失敗しました。');
  }
  return false;
}

function execute_query($db, $sql, $params = array()){
    try{
        $stmt = $db->prepare($sql);
        return $stmt->execute($params);
    }catch(PDOException $e){
    set_error('更新に失敗しました。');
  }
  return false;
}

