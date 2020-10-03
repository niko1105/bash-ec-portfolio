<?php 
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/functions.php';
require_once 'https://niko1105.github.io/bash-ec-portfolio/model/db.php';

function insert_order_datail($db, $order_id, $item_id, $price, $amount){
      $sql = "
            INSERT INTO
            order_details(
            order_id,
            item_id,
            price,
            amount,
            created
            )
            VALUES(:order_id, :item_id, :price, :amount, NOW())
      ";
      $params = array(':order_id' => $order_id, ':item_id' => $item_id, ':price' => $price, 'amount' => $amount);
      return execute_query($db, $sql, $params);
}

function get_order_details($db, $order_id){
      $sql = "
            SELECT 
                  items.name,
                  order_details.price,
                  order_details.amount,
                  order_details.price * order_details.amount as subtotal
            FROM
                  order_details
            JOIN
                  items
            ON
                  order_details.item_id = items.item_id
            WHERE
                  order_details.order_id = :order_id
            
            ";
      $params = array(':order_id' => $order_id);
      return fetch_all_query($db, $sql, $params);
}

function get_order($db, $order_id){
      $sql = "
            SELECT
                  orders.user_id,
                  orders.order_id,
                  orders.created,
                  SUM(order_details.price * order_details.amount) as total_price
            FROM
                  orders
            JOIN
                  order_details
            ON
                  orders.order_id = order_details.order_id
            WHERE
                  orders.order_id = :order_id
            GROUP BY 
                  orders.order_id
            ";
      $params = array(':order_id' => $order_id);
      return fetch_query($db, $sql, $params);

}
