<?php
session_start();
include("functions.php");

//1.  DB接続します
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_product_table WHERE category ='メガネ'");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  queryError($stmt);
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
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <title>通販</title>
</head>
<body>
    <header>
        <div class="login_wrapper">
            <a href="" class="header">Log in</a>
            <a href="" class="header">Cart</a>
            <a href="insert.php" class="header">登録</a>
        </div>
        <div class="header_bunner">
                <a href="index.php"><img src="image/header.jpg" alt=""></a>

        </div>
    </header>
    <main class="main_wrapper">
        <nav class="navi">
            <h2>Category</h2>
            <ul>
                <Li><a href="detail_1.php">メガネ</a></Li>
                <Li><a href="detail_2.php">カテゴリ２</a></Li>
                <Li><a href="detail_3.php">カテゴリ３</a></Li>
            </ul>
        </nav>
        <article class="article">
            <input type="text" id="search">
            <button id="sbtn">検索</button>
            <div id="list"><?=$view?></div>
        
        </article>
        <aside class="aside">
            <a href=""><img src="image/ad300250.jpg" alt=""></a>
            <a href=""><img src="image/ad300250.jpg" alt=""></a>
        </aside>
    </main>
    <script>
  $("#sbtn").on("click",function(){
    $.ajax({
      type: "POST",
      url: "ajax_search_1.php",
      datatype: "html",
      data:{
        search:$("#search").val()
      },
      success: function(data) {
          $("#list").html(data);
      }
    });    
  });
</script>
</body>
</html>