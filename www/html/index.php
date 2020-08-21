<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$token = get_csrf_token();

$db = get_db_connect();
$user = get_login_user($db);

$get_page = get_get('page');
if($get_page === ''){
  $get_page = 1;
}
$page_num = $get_page - 1;
$limit_page = $page_num * 8;

$items = get_open_items($db, $limit_page);

$count = get_open_items_for_count($db);
$page = ceil($count['count'] / 8);

include_once VIEW_PATH . 'index_view.php';