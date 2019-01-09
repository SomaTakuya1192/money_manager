<?php
require_once 'config.php';
function get_db(){
  $dsn = DB_DSN;
  $user = DB_USER;
  $password = DB_PASSWORD;

  //DB接続を確率
  $db = new PDO($dsn, $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
}
