<?php

$array = [];

for ($i = 0; $i < 10; $i++) {
  $array[$i] = ['ジーズ'.$i, 'test'.$i.'@test.com', $i,'テスト'.$i];
}

  // $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', '');
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');


for ($i = 0; $i < 10; $i++) {
  $name = $array[$i][0];
  $email = $array[$i][1];
  $age = $array[$i][2];
  $naiyou = $array[$i][3];

  //３．データ登録SQL作成
  // $stmt2 = $pdo->prepare("SELECT * FROM gs_an_table");  
  // $stmt = $pdo->prepare("INSERT INTO an_table (id, name, email, naiyou, indate )VALUES( NULL, :a1, :a2, :a3, sysdate() )");
  $stmt = $pdo->prepare("INSERT INTO gs_an_table (id, name, email, age, naiyou, indate )VALUES( NULL, :a1, :a2, :a3, :a4, sysdate() )");

  $stmt->bindValue(':a1', $name );
  $stmt->bindValue(':a2', $email );
  $stmt->bindValue(':a3', $age );
  $stmt->bindValue(':a4', $naiyou );

  //4.SQL実行
  $status = $stmt->execute();

}

  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo "SQLエラー";
    exit;
    
  }else{
	//  var_dump($array);
    // header('location: ./index.php');
    header("Location: select.php");
    exit();
  }
?>
