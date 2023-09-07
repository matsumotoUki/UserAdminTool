<?php

require_once('../src/model.php');
require_once('../src/functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = filter_input(INPUT_POST, 'id');
    //戻るボタンから遷移してきた時用の$name
    $name = filter_input(INPUT_POST, 'name');
    $result = getOne($pdo, $id);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報変更</title>
</head>
<body>
    <h2>会員情報変更</h2>
    <p>以下の項目を入力して「確認する」ボタンを押下してください。</p>
    <form action="user_update_confirm.php" method="POST">
        <input type="hidden" name="id" value="<?= $result->id ?>"/>
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
                    <?php $result->nam?>
                    <input type="text" name="name" value="<?= empty($name)? $result->name: $name ?>"/>
                </td>
            </tr>
            <tr>
                <th>登録日</th>
                <td>
                    <span><?=date('m月d日 H:i', strtotime(h(date($result->created)))); ?></span>
                    <input type="hidden" value="<?= $result->created ?>"/>
                </td>
            </tr>
            <tr>
                <th>更新日</th>
                <td>
                    <span><?=date('m月d日 H:i', strtotime(h(date($result->updated)))); ?></span>
                    <input type="hidden" value="<?= $result->updated ?>"/>
                </td>
            </tr>
        </table>
        <button type="submit">確認する</button>
    </form>
    <form action="user_details.php" method="POST">
        <input type="hidden" name="id" value="<?= $result->id ?>"/>
        <button type="submit">詳細画面にもどる</button>
    </form>
</body>
</html>