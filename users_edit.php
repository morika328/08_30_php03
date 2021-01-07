<?php
// var_dump($_GET);
// exit();
$id = $_GET['id'];

include('functions.php');
$pdo = connect_to_db();


$sql = 'SELECT * FROM users_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
$error = $stmt->errorInfo();
echo json_encode(["error_msg" => "{$error[2]}"]); exit();
} else {

$record = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($record);
// exit();
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dユーザー管理機能（編集画面）</title>
</head>

<body>
  <form action="users_update.php" method="POST">
    <fieldset>
      <legend>ユーザー管理機能（編集画面）</legend>
      <a href="users_read.php">一覧画面</a>
      <div>
        username: <input type="text" name="username" value="<?= $record["username"] ?>">
      </div>
      <div>
        password: <input type="text" name="password" value="<?= $record["password"] ?>">
      </div>
      <input type="hidden" name="id" value="<?=$record['id']?>">
      <div>
        <button>submit</button>
      </div>

    </fieldset>
  </form>

</body>

</html>