<?php
require_once 'config.php';
function get_db(){
  //DB接続を確率
  $db = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
}
