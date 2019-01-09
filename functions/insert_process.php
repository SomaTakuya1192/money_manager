<?php
require_once 'insert.php';

try {
  //DB接続後INSERTの処理を実施
  insert();

  //処理後は一覧画面に繊維
  header('Location:../index.php');
} catch(PDOException $e) {
  print "エラーメッセージ:{$e->getMessage()}";
  header('Location:../index.php');
}
