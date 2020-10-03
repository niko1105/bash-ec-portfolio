<?php 
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';

function get_item($db, $item_id){
  $sql = "
    SELECT
      item_id, 
      name,
      stock,
      price,
      img,
      status
    FROM
      items
    WHERE
      item_id = :item_id
  ";
  $params = array(':item_id' => $item_id);
  return fetch_query($db, $sql, $params);
}

function get_items($db, $is_open = false, $sort = 'new' ){
    $sql = 'SELECT
                item_id,
                name,
                price,
                stock,
                img,
                status,
                created
            FROM
                items
            ';
    if($is_open === true){
        $sql .= 'WHERE status = 1';
    }
    if($sort === 'low_price'){
        $sql .= 'ORDER BY price ASC';
    }elseif($sort === 'high_price'){
        $sql .= 'ORDER BY price DESC';
    }else{
        $sql .= 'ORDER BY created DESC';
    }
    return fetch_all_query($db, $sql);
}

function is_open($item){
  return $item['status'] === 1;
}

function get_all_items($db){
    return get_items($db);
}




function insert_item($db, $name, $price, $stock, $filename, $status){
  $sql = "
    INSERT INTO
      items(
        name,
        price,
        stock,
        img,
        status,
        created
      )
    VALUES(:name, :price, :stock, :img, :status,NOW());
  ";
  $params = array(
    ':name' => $name, 
    ':price' => $price,
    ':stock' => $stock,  
    ':img' => $filename,
    ':status' => $status
  );
  return execute_query($db, $sql, $params);
}



function update_item_stock($db, $item_id, $stock){
    $sql = 'UPDATE
                items
            SET
                stock = :stock
            WHERE
                item_id = :item_id
            LIMIT 1
            ';
    $params = array(':stock' => $stock, ':item_id' => $item_id);
    return execute_query($db, $sql, $params);
}

function update_item_status($db, $item_id, $status){
    $sql = 'UPDATE
                items
            SET
                status = :status
            WHERE
                item_id = :item_id
            LIMIT 1
            ';
    $params = array(':status' => $status, ':item_id' => $item_id);
    return execute_query($db, $sql, $params);
}


function delete_item($db, $item_id){
    $sql = '
            DELETE FROM
                items
            WHERE
                item_id = :item_id
            LIMIT 1
            ';
    $params = array(':item_id' => $item_id);
    return execute_query($db, $sql, $params);
}

function regist_item($db, $name, $price, $stock, $status, $img){
  $filename = get_upload_filename($img);
  if(validate_item($name, $price, $stock, $filename, $status) === false){
    return false;
  }
  return regist_item_transaction($db, $name, $price, $stock, $status, $img, $filename);
}

function regist_item_transaction($db, $name, $price, $stock, $status, $img, $filename){
  $db->beginTransaction();
  if(insert_item($db, $name, $price, $stock, $filename, $status) 
    && save_image($img, $filename)){
    $db->commit();
    return true;
  }
  $db->rollback();
  return false;
  
}


function validate_item($name, $price, $stock, $filename, $status){
  $is_valid_item_name = is_valid_item_name($name);
  $is_valid_item_price = is_valid_item_price($price);
  $is_valid_item_stock = is_valid_item_stock($stock);
  $is_valid_item_filename = is_valid_item_filename($filename);
  $is_valid_item_status = is_valid_item_status($status);

  return $is_valid_item_name
    && $is_valid_item_price
    && $is_valid_item_stock
    && $is_valid_item_filename
    && $is_valid_item_status;
}


function is_valid_item_name($name){
    $is_valid = true;
    if (isset($name) === TRUE) {
        $new_name = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $name);
    }
    if ($new_name === '') {
        set_error('商品名を入力してください。');
    $is_valid = false;
    }
    return $is_valid;
}

function is_valid_item_price($price){
    $is_valid = true;
    if (isset($price) === TRUE) {
        $new_price = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $price);
    }
    if ($new_price === '') {
        set_error('価格を入力してください。');
    $is_valid = false;
    }
    return $is_valid;
}

function is_valid_item_stock($stock){
    $is_valid = true;
    if (isset($stock) === TRUE) {
        $new_stock = preg_replace('/\A[　\s]*|[　\s]*\z/u', '', $stock);
    }
    if ($new_stock === '') {
        set_error('個数を入力してください。');
    $is_valid = false;
    }
    return $is_valid;
}

function is_valid_item_status($status){
    $is_valid = true;
    if (isset($status) === TRUE) {
        $new_status = $status;
    }
    if (preg_match('/\A[01]\z/', $new_status) !== 1 ) {
        set_error('不正な処理です');
        $is_valid = false;
    }
    return $is_valid;
}

function is_valid_item_filename($filename){
  $is_valid = true;
  if($filename === ''){
    $is_valid = false;
  }
  return $is_valid;
}
