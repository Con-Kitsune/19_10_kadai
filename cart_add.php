<?php
session_start();
include("functions.php");
if(
 
  !isset($_POST["id"]) || $_POST["id"]==""
){

  exit("ParamError");
}
//1. POSTデータ取得
$id = $_POST["id"];
//2. DB接続します
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_product_table WHERE id= :id");
$stmt->bindValue(':lid',$id);
$res = $stmt->execute();

//３．データ表示
if($res==false){
  queryError($stmt);
}
$val = $stmt->fetch();

if( $val["id"] != ""){
  if($_SESSION["cart"] == []){
  $_SESSION["cart"] = [];
  array_push($_SESSION,'$val["id"]');
  header("Location: cart_list.php");
  }else{
  array_push($_SESSION,'$val["id"]');
  header("Location: cart_list.php");
  }
}else{
  header("Location: login.php");
}

?>

