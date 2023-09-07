<?php

require_once('../src/model.php');
require_once('../src/functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = filter_input(INPUT_POST, 'name');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録</title>
</head>
<body>
    <h2>会員登録</h2>
    <p>以下の項目を入力して「確認する」ボタンを押下してください。</p>
    <form action="user_create_confirm.php" method="POST">
        <input type="text" name="name" value="<?= empty($name)? '': $name ?>"/>
        <button type="submit">確認する</button>
    </form>
    <a href="user_list.php">もどる</a>
</body>
</html>