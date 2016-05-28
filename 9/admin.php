<?php
/************************************************************
 *  ログイン認証OKの場合表示
 ************************************************************/
//1. SESSION開始
session_start();
include("func.php");

//2. セッションチェック(前ページのSESSION＿IDと現在のsession_idを比較)
sessionCheck();

//2. 認証後にSetされたSESSION変数を受け取り表示
$name = "<p>名前： " . $_SESSION["name"] . "</p>";

//3. 管理者FLGを表示
if( $_SESSION["kanri_flg"]==1 ) {
  $admin  =  "<p>権限：管理者</p>";
  $admin .=  '<p><a href="user_add.php">ユーザー追加</a></p>';
}else if( $_SESSION["kanri_flg"]==0 ){
  $admin = "<p>権限：一般</p>";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理者画面</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <!-- <a class="navbar-brand" href="index.php">データ登録へ</a> -->
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
        <p>
            <?=$name?>
        </p>
        <p>
            <?=$admin?>
        </p>
        
      <div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>名前</th>
              <th>LID</th>
              <th>LPW</th>
              <th>管理者フラグ</th>
              <!-- <th>年齢</th> -->
              <!-- <th>登録内容</th> -->
              <!-- <th>登録日時</th> -->
            </tr>
          </thead>
          <tbody>
          <?php
          $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');

          $stmt2 = $pdo->prepare("SELECT * FROM gs_user_table");
        //   $stmt2 = $pdo->prepare("SELECT * FROM gs_an_table ORDER BY indate DESC LIMIT 5");



          $flag = $stmt2->execute();
          if($flag==false){
            $message = "SQLエラー";
          }else{
            while( $result = $stmt2->fetch(PDO::FETCH_ASSOC)){
              echo '<tr>';
              echo "<td>".$result['id']."</td>";
              echo "<td>".
              '<a href="user_detail.php?id='.$result["id"].'">'.$result["name"].'</a>'
              ."</td>";
              echo "<td>".$result['lid']."</td>";
              echo "<td>".$result['lpw']."</td>";
              echo "<td>".$result['kanri_flg']."</td>";
            //   echo "<td>".$result['naiyou']."</td>";
            //   echo "<td>".$result['indate']."</td>";
              echo '</tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>


<!-- Main[End] -->

</body>
</html>
