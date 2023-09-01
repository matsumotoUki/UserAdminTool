<?php
require_once('model.php');
require_once('functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    print_r("POST来た。IF文内");

    $new = filter_input(INPUT_POST, 'new');
    print_r($new);
    // addNew($pdo);
    // $new = filter_input(INPUT_POST, 'new');
    // $stmt = $pdo->prepare("INSERT INTO user (nam, created, updated) values(:new,now(),now())");
    // $stmt->bindValue('new', $new, PDO::PARAM_STR);
    // $stmt->execute();
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
    <p>以下の内容を確認して「登録する」ボタンを押下してください。※ここで値を表示する方法</p>

    <p>おお名前：<?= h($new); ?>様</p>
    <form action="user_create_submit.php" method="POST">
        <input type="hidden" name="new" value="<?=h($new)?>">
        <button>登録する</button>
    </form>
    <a href="index.php">一覧にもどる</a>
</body>
</html>