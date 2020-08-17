<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';
  
  function get_histories($db, $user_id){
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
        where purchase_histories.user_id = ?
        group by purchase_histories.purchase_id
        order by purchase_histories.created desc
    ';
    $params = array($user_id);
    return fetch_all_query($db, $sql, $params);
  }

  function get_histories_for_admin($db){
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
        group by purchase_histories.purchase_id
        order by purchase_histories.created desc
    ';
    
    return fetch_all_query($db, $sql);
  }
  
?>