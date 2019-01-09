<?php
require_once '../db_connect.php';

function db_conet(){
  try {
    //データーベースへの接続を確率
    $db = getDb();
    $sql = 'SELECT * FROM price
      INNER JOIN price_meta
      ON price.ID = price_meta.price_id';
  } catch(PDOException $e) {
        print "エラーメッセージ:{$e->getMessage()}";
  }

}

function get_method(){
  if ($row['method'] == 1){
    echo '支出';
  } else {
    echo '収入';
  }
}
