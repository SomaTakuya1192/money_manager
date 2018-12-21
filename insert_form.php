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
          <input id="date" type="text" name="date" />
      </div><div>
        <label for="price">金額:</lable><br />
          <input id="price" type="text" name="price" size="10" maxlength="10" />
      </div><div>
        <label for="category">カテゴリ:</lable><br />
          <input id="category" type="text" name="category" />
      </div><div>
        <label for="method">収支:</lable><br />
          <input id="method" type="text" name="method" />
      </div><div>
        <label for="comment">備考:</lable><br />
          <input id="comment" type="text" name="comment" />
      </div><div>
        <input type="submit" value="登録" />
      </div>
    </form>
  </body>
</html>
