<?php
//1.GETでidを取得
$id = $_GET["id"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:a1");
$stmt->bindValue(':a1', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

$result = $stmt->fetch();
// var_dump($result);

?>
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
<!-- <header> -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">戻る</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="jumbotron">
<form method="post" action="update.php">
    <legend>アンケート更新</legend>
     <label>名前：<input type="text" name="name" value="<?=$result["name"]?>"></label><br>
     <label>ID：<input type="text" name="id" value="<?=$result["email"]?>"></label><br>
     
     
     <label>ID：<input type="text" name="email" value="<?=$result["email"]?>"></label><br>
     <label>年齢：<input type="text" name="age" placeholder="例)43"></label><br>     
     <label><textArea name="naiyou" rows="4" cols="40"><?=$result["naiyou"]?></textArea></label><br>     
     <input type="hidden" name="id" value="<?=$result["id"]?>">
     <input type="submit" value="更新">
</form>
<!-- Main[End] -->
<form method="post" action="delete.php">
     <input type="hidden" name="id" value="<?=$result["id"]?>">
     <input type="submit" value="削除">
</form>
</div>

</body>
</html>






