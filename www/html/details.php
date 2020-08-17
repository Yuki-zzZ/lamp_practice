<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'details.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();

$user = get_login_user($db);
$purchase_id = $_POST['purchase_id'];

$details = get_details($db, $purchase_id);
$history = get_history($db, $purchase_id);
// dd($histories);
include_once VIEW_PATH . '/details_view.php';
