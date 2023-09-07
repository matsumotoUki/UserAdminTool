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
    <p>以下の内容を確認して「登録する」ボタンを押下してください。</p>

    <p>お名前：<?= h($name); ?>様</p>
    <form action="user_create_submit.php" method="POST">
        <input type="hidden" name="name" value="<?=h($name)?>">
        <button>登録する</button>
    </form>
    <form action="user_create_input.php" method="POST">
        <input type="hidden" name="name" value="<?=h($name)?>">
        <button>入力画面に戻る</button>
    </form>
    <a href="user_list.php">一覧にもどる</a>
</body>
</html>