<?php
require_once 'db_connect.php';//getDb関数の有効か
require_once 'header.php';//ヘッダーの呼び出し
?>

<!--検索フォーム-->
  <h1>収支検索</h1>
  <form method = "GET" action = "index.php">
      <label for = "category">カテゴリ:</lable>
        <select id= "category" name = "category">
          <option value = "">絞り込みをしない</option>
          <option value = "1">食費</option>
          <option value = "2">交通費</option>
          <option value = "3">娯楽</option>
          <option value = "4">習い事</option>
          <option value = "5">その他</option>
        </select>
      <input type = "submit" value = "検索">
  </form>
  <!--検索フォーム終了-->

  <h1>一覧画面</h1>
    <table border = "1">
      <tr>
        <th>ID</th><th>登録日時</th><th>金額</th><th>カテゴリー</th><th>収支</th><th>備考</th><th>編集／削除</th>
      </tr>
  <?php
    try {
      //データーベースへの接続を確率
      $db = get_db();
      $sql = 'SELECT * FROM price
        INNER JOIN price_meta
        ON price.ID = price_meta.price_id';

      //佐々木さんの省略法
      if (isset($_GET['category'] ) && $_GET['category'] != ''){
        $sql .= ' WHERE price_meta.category = '.$_GET['category'];
      }
      $sql .= ' ORDER BY price_id DESC';
      $stt = $db->prepare($sql);
      $stt->execute();
      //結果セットの内容を順に出力
      while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <tr>
          <td><?= $row['price_id'] ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= $row['price'] ?>円</td>
          <td>
            <?php
              if ($row['category'] == 1){
                echo '食費';
              }else if ($row['category'] == 2){
                echo '交通費';
              }else if ($row['category'] == 3 ){
                echo '娯楽';
              }else if ($row['category'] == 4 ){
                echo '習い事';
              }else if ($row['category'] == 5 ){
                echo 'その他';
              }else{
                echo 'なし';
              }
            ?>
          </td>
          <td>
            <?php
              if ($row['method'] == 1){
                echo '支出';
              } else {
                echo '収入';
              }
            ?>
          </td>
          <td><?= $row['comment'] ?></td>
          <!--編集削除ボタンリンク先を追加-->
          <td>
            <a href="edit_page.php?id=<?= $row['price_id'] ?>">編集</a>
            <a href="http://localhost/money_manager/practice/functions/delete_process.php?id=<?= $row['price_id'] ?>" onclick = "return confirm('本当に削除してもよろしいですか？')">削除</a>
          </td>
        </tr>
          <?php
          }
        } catch(PDOException $e) {
            print "エラーメッセージ:{$e->getMessage()}";
          }
          ?>
          </table>

<!--新規追加画面-->
  <a href = "insert_page.php">新規登録</a>
<?php require_once 'footer.php'; ?>
