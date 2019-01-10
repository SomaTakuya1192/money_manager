<?php
require_once 'functions/edit.php';
//セレクトオプションのループ設定
require_once 'header.php';//ヘッダー呼び出し
?>

    <h1>新規追加画面</h1>
    <form method="POST" action="http://localhost/money_manager/practice/functions/insert_process.php">
      <div>
        <div><label for="date">登録日時:</lable></div>
          <!--チェックボックスを５つ-->
          <label><select name="year" required>
          <?php display_date_option_loop('1950', date('Y'), date('Y'));?>
          </select>
          年</label>
          <label><select name="month">
          <?php display_date_option_loop('1', '12', date('m'));?>
          </select>
          月</label>
          <label><select name="day">
          <?php display_date_option_loop('1', '31', date('d'));?>
          </select>
          日</label>
          <label><select name="hour">
          <?php display_date_option_loop('0', '23', date('H'));?>
          </select>
          時</label>
          <label><select name="minute">
          <?php display_date_option_loop('0', '59', date('i'));?>
          </select>
          分</label>
          <!--セレクトボックスここまで-->
      </div>
      <div>
        <div><label for="price">金額:</lable></div>
          <input id="price" type="text" name="price" size="10" maxlength="7" required>
          <!--半角英数字入力のみを許可-->
      </div>
      <div>
        <div><label for="category">カテゴリ:</lable></div>
          <select id="category" name="category">
            <option value="1">食費</option>
            <option value="2">交通費</option>
            <option value="3">娯楽</option>
            <option value="4">習い事</option>
            <option value="5">その他</option>
          </select>
      </div>
      <div>
        <div><label for="method">収支:</lable></div>
          <label><input id="method" value="1" type="radio" name="method" checked>支出</label>
          <label><input id="method" value="2" type="radio" name="method">収入</label>
      </div>
      <div>
        <div><label for="comment">内容:</lable></div>
          <textarea name="comment" rows="5" cols="40"></textarea>
      </div>
      <div>
        <input type="submit" value="登録">
      </div>
    </form>
<?php require_once 'footer.php'; ?>
