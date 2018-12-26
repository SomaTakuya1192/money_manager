<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8" />
      <title>収支登録</title>
  </head>

  <body>
    <h1>新規追加画面</h1>
    <form method="POST" action="insert_process.php">
      <div>
        <label for="date">登録日時:</lable><br />
          <input id="date" type="date" name="date" max="2030-12-31"/>
          <!--チェックボックスを５つ-->



      </div><div>
        <label for="price">金額:</lable><br />
          <input id="price" type="text" name="price" size="10" maxlength="7" />
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
          <input id="comment" type="text" name="comment" />
      </div><div>
        <input type="submit" value="登録" />
      </div>
    </form>
  </body>
</html>
