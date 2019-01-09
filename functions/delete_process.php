<?php
require_once 'delete.php';
try {
  //POSTで渡ったprice_idレコードを削除する
  delete();
  //処理後は一覧画面に遷移
  header('Location:../index.php');
} catch(PDOException $e) {
  print "エラーメッセージ:{$e->getMessage()}";
  header('Location:../index.php');
}
