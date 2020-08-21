<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';
  
  function get_details($db, $purchase_id){
    $sql = '
      SELECT
        items.name,
        purchase_details.price,
        purchase_details.amount,
        (purchase_details.price * purchase_details.amount) as total_fee
      FROM
        purchase_details
      JOIN
        items
      ON
        purchase_details.item_id = items.item_id
        where purchase_details.purchase_id = ?
    ';
    $params = array($purchase_id);
    return fetch_all_query($db, $sql, $params);
  }
  
  function get_history($db, $purchase_id){
    $sql = '
      SELECT
        purchase_histories.purchase_id,
        purchase_histories.created,
        sum(purchase_details.price * purchase_details.amount) as total_fee
      FROM
        purchase_histories
      JOIN
        purchase_details
      ON
        purchase_histories.purchase_id = purchase_details.purchase_id
        where purchase_histories.purchase_id = ?
        group by purchase_histories.purchase_id
    ';
    $params = array($purchase_id);
    return fetch_query($db, $sql, $params);
  }
?>