<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8" />
      <title>収支登録</title>
  </head>

  <body>
    <?php date_default_timezone_set('Asia/Tokyo');?>
    <h1>新規追加画面</h1>
    <form method="POST" action="insert_process.php">
      <div>
        <label for="date">登録日時:</lable><br />
          <!--チェックボックスを５つ-->
          <select name="year" required>
          <?php optionLoop('1950', date('Y'), '2018');?>
          </select>
          年
          <select name="manth">
          <?php optionLoop('1', '12', date('m'));?>
          </select>
          月
          <select name="day">
          <?php optionLoop('1', '31', date('d'));?>
          </select>
          日
          <select name="hour">
          <?php optionLoop('1', '24', date('H'));?>
          </select>
          時
          <select name="minute">
          <?php optionLoop('1', '60', date('i'));?>
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
          <input id="price" type="text" name="price" size="10" maxlength="7" required>
      </div><div>
        <label for="category">カテゴリ:</lable><br />
          <select id="category" name="category">
            <option value="1">食費</option>
            <option value="2">交通費</option>
            <option value="3">娯楽</option>
            <option value="4">習い事</option>
            <option value="5">etc...</option>
          </select>
      </div><div>
        <label for="method">収支:</lable><br />
          <input id="method" value="1" type="radio" name="method" checked />支出
          <input id="method" value="2" type="radio" name="method" />収入
      </div><div>
        <label for="comment">内容:</lable><br />
          <input id="comment" type="text" name="comment">
      </div><div>
        <input type="submit" value="登録" />
      </div>
    </form>
  </body>
</html>
