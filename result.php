<?php
require_once 'DbManager.php';  //getDb関数の有効か
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>結果セット</title>


</head>
<body>
  <h1>一覧画面</h1>
  <table border="1">
  <tr>
    <th>ID</th><th>登録日時</th><th>金額</th><th>カテゴリー</th><th>収支</th><th>備考</th><th>編集／削除</th>
  </tr>

<?php
try {
  //データーベースへの接続を確率
  $db = getDb();
  //SELLECT命令の実行
  $stt = $db->prepare('SELECT * FROM price
    INNER JOIN price_meta
      ON price.ID = price_meta.price_id
');
  $stt->execute();
  //結果セットの内容を順に出力
  while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
?>
  <form method="GET" action="edit_forme.php">
  <tr>
    <td><?= $row['price_id'] ?></td>
    <td><?= $row['date'] ?></td>
    <td><?= $row['price'] ?></td>
    <td><?= $row['category'] ?></td>
    <td><?= $row['method'] ?></td>
    <td><?= $row['comment'] ?></td>
    <!--編集削除ボタンリンク先を追加-->
    <td>
      <a href = "http://localhost/money_manager/edit_form.php?id=<?= $row['price_id'] ?>">編集</a>
      <a href="http://localhost/money_manager/delete_process.php?id=<?= $row['price_id'] ?>" onclick="return confirm('本当に削除してもよろしいですか？')">削除</a>
    </td>
  </tr>
<?php
  }
} catch(PDOException $e) {
  print "エラーメッセージ:{$e->getMessage()}";
}
?>
</table>
</body>
<!--新規追加画面-->
<a href= "insert_form.php">新規登録</a>


</html>
