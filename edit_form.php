<?php
//セレクトオプションのループ設定
function display_date_option_loop($start, $end, $value = null){

  for($i = $start; $i <= $end; $i++){
    if(isset($value) &&  $value == $i){
      echo "<option value=\"{$i}\" selected=\"selected\">{$i}</option>";
    }else{
      echo "<option value=\"{$i}\">{$i}</option>";
    }
  }
}

//DB接続
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

//以下日付を変数に分解
list($year, $month, $day, $hour, $minute, $second) = preg_split('/[-: ]/', $date);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
  <h1>編集画面</h1>
  <form method="POST" action="edit_process.php">
    <div>
      <div><label for="date">登録日時:</lable></div>
        <!--チェックボックスを５つ-->
        <label><select name="year" required>
        <?php display_date_option_loop('1950', date('Y'), $year);?>
        </select>
        年</label>
        <label><select name="month">
        <?php display_date_option_loop('1', '12', $month);?>
        </select>
        月</label>
        <label><select name="day">
        <?php display_date_option_loop('1', '31', $day);?>
        </select>
        日</label>
        <label><select name="hour">
        <?php display_date_option_loop('0', '23', $hour);?>
        </select>
        時</label>
        <label><select name="minute">
        <?php display_date_option_loop('0', '59', $minute);?>
        </select>
        分</label>
        <!--セレクトボックスここまで-->
    </div>
    <div>
      <div><label for="price">金額:</lable></div>
        <input id="price" type="text" name="price" size="10" maxlength="10" value="<?=$price?>">
    </div>
    <div>
      <div><label for="category">カテゴリ:</lable></div>
        <select id="category" name="category" value="<?=$category?>">
          <option value="1">食費</option>
          <option value="2">交通費</option>
          <option value="3">娯楽</option>
          <option value="4">習い事</option>
          <option value="5">その他</option>
        </select>
    </div>
    <div>
      <div><label for="method">収支:</lable></div>
        <label><input id="method" value="1" type="radio" name="method" checked value="<?=$method?>">支出</label>
        <label><input id="method" value="2" type="radio" name="method" value="<?=$method?>">収入</label>
    </div>
    <div>
      <div><label for="comment">備考:</lable></div>
        <input id="comment" type="text" name="comment" value="<?=$comment?>">
    </div>
    <div>
      <input id="ID" type="hidden" name="id" value="<?=$get_price_id?>">
      <input type="submit" value="更新">
    </div>
  </form>
</body>
</html>
