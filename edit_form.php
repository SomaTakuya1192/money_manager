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
        <!--チェックボックスを５つ-->
        <select name="year">
        <?php optionLoop('1950', date('Y'), '2018');?>
        </select>
        年
        <select name="manth">
        <?php optionLoop('1', '12', '12');?>
        </select>
        月
        <select name="day">
        <?php optionLoop('1', '31', '12');?>
        </select>
        日
        <select name="hour">
        <?php optionLoop('1', '24', '12');?>
        </select>
        時
        <select name="minute">
        <?php optionLoop('1', '60', '00');?>
        </select>
        分
        <?php
        //セレクトオプションのループ設定
        function optionLoop($start, $end, $value = null){

          for($i = $start; $i <= $end; $i++){
            if(isset($value) &&  $value == $i){
              echo "<option value=\"{$i}\" selected=\"selected\">{$i}</option>";
            }else{
              echo "<option value=\"{$i}\">{$i}</option>";
            }
          }
        }
        ?>
        <!--セレクトボックスここまで-->
    </div><div>
      <label for="price">金額:</lable><br />
        <input id="price" type="text" name="price" size="10" maxlength="10" value="<?=$price?>" />
    </div><div>
      <label for="category">カテゴリ:</lable><br />
        <select id="category" name="category" value="<?=$category?>" />
          <option value="1">食費</option>
          <option value="2">交通費</option>
          <option value="3">娯楽</option>
          <option value="4">習い事</option>
          <option value="5">etc...</option>
        </select>
    </div><div>
      <label for="method">収支:</lable><br />
        <input id="method" value="1" type="radio" name="method" checked value="<?=$method?>" />支出
        <input id="method" value="2" type="radio" name="method" value="<?=$method?>" />収入
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
