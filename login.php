
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー認証</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <style>
    html{height:100%;}
    body{height:100%;background-color:gray;}
    header{height:30%;}
    div{padding: 10px;font-size:16px;}
    /* .gray{color:gray;} */
    section{width:33%;height:55%;margin:auto;text-align:center;border:solid 1px;background-color:white;}
    form{height:53%;}
    .section-wrapper{height:70%;}  
    .btn{position: relative;
    display: inline-block;
    font-weight: bold;
    padding: 0.25em 0.5em;
    text-decoration: none;
    color: #FFF;
    background: #00bcd4;
    transition: .4s;
    border:none;
    height:20%;
    width:30%;}
  </style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <!-- <div class="container-fluid">
    <div class="navbar-header"> -->
    <a class="navbar-brand" href="login.php">login</a>
    <a class="navbar-brand" href="index.php">data閲覧</a>
    <!-- </div>
    </div> -->
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

  <!-- <div class="jumbotron"> -->
    <div class="section-wrapper">
      <section>
        <legend> LOGIN</legend>
        <img src="img/login.png" width=30%>
        <form method="post" action="login_act.php">
        <label>Login ID：<input type="text" name="lid" ></label><br>
        <label>Login PW：<input type="password" name="lpw" ></label><br>
        <input class="btn" type="submit" value="Submit">
        </form>
        <P>ID:test PW:test =一般ユーザー</P>
        <P>ID:test2 PW:test2 =スーパー管理者</P>
        </section>
     </div>
  <!-- </div> -->

<!-- Main[End] -->


</body>
</html>
