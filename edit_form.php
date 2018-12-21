<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>編集</title>
</head>
<body>
  <h1>編集画面</h1>
  <?php
  require_once 'DbManager.php';
  $get_price_id = $_GET['id'];

  try {
      $db = getDb();

          //price_idの値をSQL文にあてはめる
          $stt = $db->prepare("SELECT date,price,category,method,comment from price INNER JOIN price_meta ON price.ID = price_meta.price_id WHERE price_id = $get_price_id ORDER BY date DESC");

          //SELECT命令を実行
          $stt->execute();

          //結果セットの内容を順に出力
          while($row = $stt->fetch(PDO::FETCH_ASSOC)){
              $date = $row['date'];
              $price = $row['price'];
              $category = $row['category'];
              $method = $row['method'];
              $comment = $row['comment'];
          }
  }catch(PDOException $e) {
      $e->getMessage();
  }
  ?>

  <form method="POST" action="edit_process.php">
    <div>
      <label for="date">登録日時:</lable><br />
        <input id="date" type="text" name="date" value="<?=$date?>" />
    </div><div>
      <label for="price">金額:</lable><br />
        <input id="price" type="text" name="price" size="10" maxlength="10" value="<?=$price?>" />
    </div><div>
      <label for="category">カテゴリ:</lable><br />
        <input id="category" type="text" name="category" value="<?=$category?>" />
    </div><div>
      <label for="method">収支:</lable><br />
        <input id="method" type="text" name="method" value="<?=$method?>" />
    </div><div>
      <label for="comment">備考:</lable><br />
        <input id="comment" type="text" name="comment" value="<?=$comment?>" />
    </div><div>
      <input id="ID" type="hidden" name="id" value="<?=$get_price_id?>" />
      <input type="submit" value="更新" />
    </div>
  </form>
</body>
</html>
