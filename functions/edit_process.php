<?php
require_once '../db_connect.php';
require_once 'edit.php';

try {
  //DB接続後にUPDATE処理を実施
  update();

  //処理後は一覧画面に遷移
  header('Location:../index.php');
} catch(PDOException $e) {
  print "エラーメッセージ:{$e->getMessage()}";
  header('Location:../index.php');
}
