<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>通販</title>
</head>
<body>

<form method="post" action="insertinto.php" ensctype="multipart/form-data">
  <div class="insert">
   <fieldset>
    <legend>商品登録</legend>
     <label>カテゴリ名：<input type="text" name="category"></label><br>
     <label>商品名：<input type="text" name="name"></label><br>
     <label>詳細：<textArea name="discript" rows="4" cols="40"></textArea></label><br>
     <input type="file" name="upfile" accept="image/*" capture="camera"><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
    
</body>
</html>