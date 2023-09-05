<?php

require_once('model.php');
require_once('functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = filter_input(INPUT_POST, 'id');
    delete($pdo, $id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報削除</title>
</head>
<body>
    <h2>会員情報削除</h2>
    <p>会員情報の削除が完了しました。</p>
    <a href="index.php">一覧にもどる</a>
</body>
</html>