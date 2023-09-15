<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

if(!isset($_POST['name'])&&!isset($_POST['id'])){
    echo '<P>このページへ直接アクセスすることは禁止されています。</P>
          <p>一覧画面より対象のご会員様をお選びください。</p>
          <p><a href="user_list.php">一覧画面に戻る</a></p>';
    exit;
}else{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        // $name = h($_POST['name']);
        $id = $_POST['id'];
        $result = getOne($pdo, $id);
    }
}

require_once('../app/templates/user_update_confirm.html');
?>
