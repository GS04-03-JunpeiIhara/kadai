<?php
session_start();
include('func.php'); //外部ファイル読み込み（関数群の予定）

//1. 接続します
// try {
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('DbConnectError:'.$e->getMessage());
// }
$pdo = db();

//２．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg) VALUES (NULL, :name, :lid ,:lpw, 1, 0)");
$stmt->bindValue(':name', $_POST["name"]);
$stmt->bindValue(':lid', $_POST["lid"]);
$stmt->bindValue(':lpw', $_POST["lpw"]);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
// $val = $stmt->fetch(); //1レコードだけ取得する方法
// var_dump($val);

//４. 該当レコードがあればSESSIONに値を代入
  header("Location: admin.php");

// if( $val["id"] != "" ){
//   $_SESSION["chk_ssid"]  = session_id();
//   $_SESSION["kanri_flg"] = $val['kanri_flg'];
//   $_SESSION["name"]      = $val['name'];
//   // header(**********************);
//   header("Location: select.php");
// }else{
//   //logout処理を経由して全画面へ
//   // header(**********************);
//   header("Location: logout.php");
// }

exit();

?>

