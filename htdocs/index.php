<?php
require_once('model.php');
require_once('functions.php');

$results = getAll($pdo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報一覧</title>
</head>

<body>
    <a href="user_create_input.php">新規に会員登録</a>
    <table border="1">
    <colgroup>
            <col width="400">
            <col width="200">
            <col width="200">
            <col width="50">
          </colgroup>
        <tr>
            <th>お名前</th>
            <th>登録日</th>
            <th>更新日</th>
            <th></th>
        </tr>
<?php foreach ($results as $result) :?>
        <tr>
            <td>
                <span><?=h($result->name); ?></span>
            </td>
            <td>
                <span><?=date('m月d日 H:i', strtotime(h(date($result->created)))); ?></span>
            </td>
            <td>
                <span><?=date('m月d日 H:i', strtotime(h(date($result->updated)))); ?></span>
            </td>
            <td>
            <form action="user_details.php" method="POST">
                <input type="hidden" name="id" value="<?=$result->id?>"/>
                <button type="submit">詳細</button>
            </form>
            </td>
        </tr>
<?php endforeach; ?>
    </table>
</body>

</html>