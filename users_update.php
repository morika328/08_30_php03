<?php
// var_dump($_POST);
// exit();

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE users_table SET username=:username, password=:password, updated_at=sysdate() WHERE id=:id';


// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $stmt->bindValue(':is_admin', $is_admin, PDO::PARAM_STR);
// $stmt->bindValue(':is_deleted', $is_deleted, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
  header("Location:users_read.php");
  exit();
}
