<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
  <?php 
  include VIEW_PATH . 'templates/header_logined.php'; 
  ?>

  <div class="container">
    <h1>購入履歴</h1>

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <?php if(count($histories) > 0){ ?>
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>合計金額</th>
            <th>購入明細表示</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($histories as $history){ ?>
            <td><?php print($history['purchase_id']); ?></td>
            <td><?php print($history['created']); ?></td>
            <td><?php print(number_format($history['total_fee'])); ?>円</td>
            <td>
              <form method="post" action="details.php">
                <input type="submit" value="購入明細表示" class="btn btn-secondary">
                <input type="hidden" name="purchase_id" value="<?php print($history['purchase_id']); ?>">
              </form>
            </td>
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