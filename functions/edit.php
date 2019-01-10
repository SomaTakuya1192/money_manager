<?php
function update(){
  //POSTデータの整形
  $shape_date = date('Y-m-d H:i:s', mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year']));
  //DB接続を確率
  $db = get_db();
  //INSERT命令の準備
  $stt = $db->prepare('UPDATE price SET date = :date, price = :price WHERE ID = :ID');
  //INSERT命令にポストデータの内容をセット
  $stt -> bindValue(':ID', $_POST['id']);
  $stt -> bindValue(':date', $shape_date);
  $stt -> bindValue(':price', $_POST['price']);
  //INSERT命令にポストデータの内容をセット
  $stt -> execute();
  //INSERT命令の準備
  $sttt = $db->prepare('UPDATE price_meta SET category = :category, method = :method, comment = :comment WHERE price_id = :price_id');
  //INSERT命令にポストデータの内容をセット
  $sttt -> bindValue(':price_id', $_POST['id']);
  $sttt -> bindValue(':category', $_POST['category']);
  $sttt -> bindValue(':method', $_POST['method']);
  $sttt -> bindValue(':comment', $_POST['comment']);
  //INSERT命令を実行
  $sttt -> execute();
}

//セレクトオプションのループ設定
function display_date_option_loop($start, $end, $value = null){

  for($i = $start; $i <= $end; $i++){
    if(isset($value) &&  $value == $i){
      echo "<option value=\"{$i}\" selected=\"selected\">{$i}</option>";
    }else{
      echo "<option value=\"{$i}\">{$i}</option>";
    }
  }
}
