<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧へ</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>アンケート登録</legend>
     <label>名前：<input type="text" name="name" placeholder="例)ヤマザキナビスコ" required></label><br>
     <label>Email：<input type="email" name="email" placeholder="例)aaaaaa@bbb.com" required></label><br>
     <label>年齢：<input type="text" name="age" placeholder="例)43"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<form method="post" action="insert_test_data.php">
  <div class="jumbotron">
   <fieldset>
    <legend>テストデータ入力</legend>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

</body>
</html>
