<?php
require_once 'DbManager.php';
$get_price_id = $_GET['id'];

try {

  //DB接続を確率
  $db = getDb();

  //INSERT命令の準備
  $stt = $db->prepare('DELETE FROM price WHERE ID = :ID');
  $stt -> bindValue(':ID', $get_price_id);
  $stt -> execute();


  $sttt = $db->prepare('DELETE FROM price_meta WHERE price_id = :price_id');
  $sttt -> bindValue(':price_id', $get_price_id);
  $sttt -> execute();


  //処理後は一覧画面に繊維
  header('Location: http://' .$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/result.php');
} catch(PDOException $e) {
  print "エラーメッセージ:{$e->getMessage()}";
}
