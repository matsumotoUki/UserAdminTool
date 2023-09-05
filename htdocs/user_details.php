<?php

require_once('model.php');
require_once('functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = filter_input(INPUT_POST, 'id');
    $result = getOne($pdo, $id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細画面</title>
</head>
<body>
    <h2>詳細画面</h2>
    <table>
        <tr>
            <th>会員ID</th>
            <td>
                <?=h($result->id); ?>
            </td>
        </tr>
        <tr>
            <th>お名前</th>
            <td>
                <span><?=h($result->name); ?></span>
            </td>
        </tr>
        <tr>
            <th>登録日</th>
            <td>
                <span><?=date('m月d日 H:i', strtotime(h(date($result->created)))); ?></span>
            </td>
        </tr>
        <tr>
            <th>更新日</th>
            <td>
                <span><?=date('m月d日 H:i', strtotime(h(date($result->updated)))); ?></span>
            </td>
        </tr>
        </table>
        <form action="user_update_input.php" method="POST">
            <input type="hidden" name="id" value="<?=$result->id?>" size="20"/>
            <button type="submit">変更する</button>
        </form>
        <form action="user_delete_confirm.php" method="POST">
            <input type="hidden" name="id" value="<?=$result->id?>" size="20"/>
            <button type="submit">削除する</button>
        </form>
        <a href="index.php">もどる</a>
</body>
</html>