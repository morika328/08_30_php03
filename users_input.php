<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理機能（入力画面）</title>
</head>

<body>
  <form action="users_create.php" method="POST">
    <fieldset>
      <legend>ユーザー管理機能（入力画面）</legend>
      <a href="users_read.php">一覧画面</a>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <!-- <div>
           <input type="hidden" name="is_admin" >
      </div>
        <div>
           <input type="hidden" name="is_deleted" >
      </div> -->
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>