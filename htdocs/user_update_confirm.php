<?php
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
    <p>以下の内容を確認して「変更する」ボタンを押下してください。</p>
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
    <form action="user_create_confirm.php" method="POST">
        <input type="text" name="new"/>
        <button type="submit">変更する</button>
    </form>
    <a href="index.php">もどる</a>
</body>
</html>