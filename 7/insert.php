<?php
  //1. POSTデータ取得（）
  $name = $_POST['name'];
  $email = $_POST['email'];
  $naiyou = $_POST['naiyou'];

  //2. DB接続します
  $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', '');

  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO an_table (id, name, email, naiyou, indate )VALUES( NULL, :a1, :a2, :a3, sysdate() )");

  $stmt->bindValue(':a1', $name );
  $stmt->bindValue(':a2', $email );
  $stmt->bindValue(':a3', $naiyou );

    //4.SQL実行
  $status = $stmt->execute();

  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo "SQLエラー";
    exit;
    
  }else{
    //５．index.phpへリダイレクト
    header('location: ./index.php');
    exit();
  }
?>
