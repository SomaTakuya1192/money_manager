<?php
require_once 'DbManager.php';

//POSTデータの整形
$shape_date = date('Y-m-d H:i:s', mktime($_POST['hour'], $_POST['minute'], 0, $_POST['manth'], $_POST['day'], $_POST['year']));


try {

  //DB接続を確率
  $db = getDb();

  //INSERT命令の準備
  $stt = $db->prepare('UPDATE price SET date = :date, price = :price WHERE ID = :ID');
  //INSERT命令にポストデータの内容をセット


  $stt -> bindValue(':ID', $_POST['id']);
  $stt -> bindValue(':date', $shape_date);
  $stt -> bindValue(':price', $_POST['price']);
  //INSERT命令にポストデータの内容をセット
  $stt -> execute();

  //ここにpriceからIDを取得してprice_idに受けわたすスクリプトを入れる
  //priceのID最大値を取得し、$max_idに代入

  //INSERT命令の準備
  $sttt = $db->prepare('UPDATE price_meta SET category = :category, method = :method, comment = :comment WHERE price_id = :price_id');
  //INSERT命令にポストデータの内容をセット
  $sttt -> bindValue(':price_id', $_POST['id']);
  $sttt -> bindValue(':category', $_POST['category']);
  $sttt -> bindValue(':method', $_POST['method']);
  $sttt -> bindValue(':comment', $_POST['comment']);
  //INSERT命令を実行
  $sttt -> execute();

  //処理後は一覧画面に繊維
  header('Location: http://' .$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/result.php');
} catch(PDOException $e) {
  print "エラーメッセージ:{$e->getMessage()}";
}
