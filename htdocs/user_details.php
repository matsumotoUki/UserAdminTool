<?php

require_once('model.php');
require_once('functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // addNew($pdo);
    $id = filter_input(INPUT_POST, 'id');
    $result = getOne($pdo, $id);
    print_r($result);
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
                <?=$result->id; ?>
            </td>
        </tr>
            <th>お名前</th>
            <td>
                <span><?=h($result->nam); ?></span>
                <input type="hidden" value="<?=$result->nam ?>" size="20" />
            </td>
            <tr>
                <th>登録日</th>
                <td>
                    <span><?=date('m月d日 H:i', strtotime(h(date($result->created)))); ?></span>
                    <input type="hidden" value="<?=$result->created ?>" size="20" />
                </td>
            </tr>
            <tr>
                <th>更新日</th>
                <td>
                    <span><?=date('m月d日 H:i', strtotime(h(date($result->updated)))); ?></span>
                    <input type="hidden" value="<?=$result->updated ?>" size="20" />
                </td>
            </tr>
        </table>
        <a href="index.php">もどる</a>
        <form action="user_update_input.php" method="POST">
        <input type="hidden" value="<?=$result->nam ?>" size="20" />
        <input type="hidden" name="id" value="<?=$result->id?>" size="20"/>
        <button type="submit">変更する</button>
    </form>
    <form action="user_delete_confirm.php" method="POST">
        <input type="hidden" name="id" value="<?=$result->id?>" size="20"/>
        <button type="submit">削除する</button>
    </form>
</body>
</html>