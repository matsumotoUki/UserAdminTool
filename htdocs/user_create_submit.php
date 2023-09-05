<?php
require_once('model.php');
require_once('functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = filter_input(INPUT_POST, 'name');
    add($pdo, $name);
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
    <p class="card-text">会員登録が完了しました。</p>
    <a href="index.php">一覧にもどって確認する</a>
</body>
</html>