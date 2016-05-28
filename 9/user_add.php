<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー追加</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧へ</a></div> -->
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_add_act.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー追加</legend>
     <label>名前：<input type="text" name="name" placeholder="例)ヤマザキナビスコ" required></label><br>
     <label>ID<input type="text" name="lid" placeholder="例)test" required></label><br>
     <label>PASSWORD<input type="password" name="lpw" placeholder="例)test"></label><br>
     <!-- <label>管理者フラグ<input type="text" name="id" placeholder="例)test" required></label><br> -->
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

</body>
</html>
