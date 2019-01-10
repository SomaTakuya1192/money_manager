<?php
function insert(){
  //POSTデータの整形
  $shape_date = date('Y-m-d H:i:s', mktime($_POST['hour'], $_POST['minute'], 0, $_POST['month'], $_POST['day'], $_POST['year']));

    //DB接続を確率
    $db = get_db();

    //INSERT命令の準備
    $stt = $db->prepare('INSERT INTO price(date, price) VALUES(:date, :price)');
    //INSERT命令にポストデータの内容をセット
    $stt -> bindValue(':date', $shape_date);
    $stt -> bindValue(':price', $_POST['price']);
    //INSERT命令にポストデータの内容をセット
    $stt->execute();

    //ここにpriceからIDを取得してprice_idに受けわたすスクリプトを入れる
    //priceのID最大値を取得し、$max_idに代入
    $price_maxid = $db->query('SELECT id from price order by id desc limit 1');
    $max_id = $price_maxid->fetchAll(PDO::FETCH_ASSOC);

    //INSERT命令の準備
    $sttt = $db->prepare('INSERT INTO price_meta(price_id, category, method, comment) VALUES(:price_id, :category, :method, :comment)');
    //INSERT命令にポストデータの内容をセット
    $sttt -> bindValue(':price_id', $max_id[0]['id']);
    $sttt -> bindValue(':category', $_POST['category']);
    $sttt -> bindValue(':method', $_POST['method']);
    $sttt -> bindValue(':comment', $_POST['comment']);
    //INSERT命令を実行
    $sttt->execute();
}
