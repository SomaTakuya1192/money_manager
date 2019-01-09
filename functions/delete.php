<?php

function delete(){
  require_once '../db_connect.php';
  $get_price_id = $_GET['id'];
  //DB接続を確率
  $db = get_db();
  //INSERT命令の準備
  $stt = $db->prepare('DELETE FROM price WHERE ID = :ID');
  $stt -> bindValue(':ID', $get_price_id);
  $stt -> execute();

  $sttt = $db->prepare('DELETE FROM price_meta WHERE price_id = :price_id');
  $sttt -> bindValue(':price_id', $get_price_id);
  $sttt -> execute();
}
