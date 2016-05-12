<?php

$array = [];

for ($i = 0; $i < 10; $i++) {
  $array[$i] = ['ジーズ'.$i, 'test'.$i.'@test.com', 'テスト'.$i];
}

  $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', '');

for ($i = 0; $i < 10; $i++) {
  $name = $array[$i][0];
  $email = $array[$i][1];
  $naiyou = $array[$i][2];

  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO an_table (id, name, email, naiyou, indate )VALUES( NULL, :a1, :a2, :a3, sysdate() )");

  $stmt->bindValue(':a1', $name );
  $stmt->bindValue(':a2', $email );
  $stmt->bindValue(':a3', $naiyou );

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
    header('location: ./index.php');
    exit();
  }
?>
