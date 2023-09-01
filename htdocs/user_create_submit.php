<?php
require_once('model.php');
require_once('functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // addNew($pdo);
    $new = filter_input(INPUT_POST, 'new');
    $stmt = $pdo->prepare("INSERT INTO user (nam, created, updated) values(:new,now(),now())");
    $stmt->bindValue('new', $new, PDO::PARAM_STR);
    $stmt->execute();
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
    <a href="index.php">一覧にもどる</a>
</body>
</html>