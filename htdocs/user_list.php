<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');
$results = getAll($pdo);
require_once('../app/templates/user_list.html');

//TODO：①入力チェックアプデ（項目が増えたらスパゲになる箇所）
?>
