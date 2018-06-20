<?php
session_start();

//0.外部ファイル読み込み
include("functions.php");

//POST
if(!isset($_POST["search"]) && $_POST["search"]==""){
    $s = "";
}else{
    $s = $_POST["search"];
}

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
if($s!=""){
    $stmt = $pdo->prepare("SELECT * FROM gs_product_table WHERE name LIKE :s");
    $stmt->bindValue(":s", "%".$s."%", PDO::PARAM_STR);
}else{
    $stmt = $pdo->prepare("SELECT * FROM gs_product_table"); 
}
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
    echo "false";
}else{
    //Selectデータの数だけ自動でループしてくれる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view .= '<p>';
        $view .= '<img src="upload/'.$result["image"].'" width="200">';
        $view .= '<a href="detail.php?id='.$result["id"].'">';
        $view .= h($result["name"]);
        $view .= '</a>';
        $view .= '<a href="delete.php?id='.$result["id"].'">';
        $view .= '[削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
    echo $view;
    // 必ずechoして渡す
}
?>
