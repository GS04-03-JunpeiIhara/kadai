<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
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
      <a class="navbar-brand" href="index.php">データ登録へ</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
      <div class="container">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>名前</th>
              <th>MAIL</th>
              <th>登録内容</th>
              <th>登録日時</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', '');
          $stmt2 = $pdo->prepare("SELECT * FROM an_table");
          $flag = $stmt2->execute();
          if($flag==false){
            $message = "SQLエラー";
          }else{
            while( $result = $stmt2->fetch(PDO::FETCH_ASSOC)){
              echo '<tr>';
              echo "<td>".$result['id']."</td>";
              echo "<td>".$result['name']."</td>";
              echo "<td>".$result['email']."</td>";
              echo "<td>".$result['naiyou']."</td>";
              echo "<td>".$result['indate']."</td>";
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
