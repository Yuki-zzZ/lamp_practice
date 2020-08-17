<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>

  <div class="container">
    <h1>購入明細</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($details) > 0){ ?>
        <!-- 「注文番号」「購入日時」「合計金額」 -->
        <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php print($history['purchase_id']); ?></td>
            <td><?php print($history['created']); ?></td>
            <td><?php print(number_format($history['total_fee'])); ?>円</td>
          </tr>
        </tbody>
      </table>
      <!-- 「商品名」「購入時の商品価格」 「購入数」「小計」 -->
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>商品価格</th>
            <th>注文個数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($details as $detail){ ?>
          <tr>
            <td><?php print($detail['name']); ?></td>
            <td><?php print($detail['price']); ?></td>
            <td><?php print($detail['amount']); ?></td>
            <td><?php print(number_format($detail['total_fee'])); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>商品はありません。</p>
    <?php } ?> 
  </div>
  <script>
    $('.delete').on('click', () => confirm('本当に削除しますか？'))
  </script>
</body>
</html>