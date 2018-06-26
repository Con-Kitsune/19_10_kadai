<?php
session_start();
include("functions.php");
if(
 
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]==""
){

  exit("ParamError");
}
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
//2. DB接続します
$pdo = db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid= :lid AND lpw= :lpw AND life_flg=0");
$stmt->bindValue(':lid',$lid);
$stmt->bindValue(':lpw',$lpw);
$res = $stmt->execute();

//３．データ表示
if($res==false){
  queryError($stmt);
}
$val = $stmt->fetch();

if( $val["id"] != ""){
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["kanri_flg"] = $val["kanri_flg"];
  $_SESSION["name"] = $val["lid"];
  header("Location: index.php");
}else{
  header("Location: login.php");
}

?>

