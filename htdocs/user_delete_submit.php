<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

if(!isset($_POST['id'])){
    echo '<P>このページへ直接アクセスすることは禁止されています。</P>
          <p>一覧画面より削除されるご会員様をお選びください。</p>
          <p><a href="user_list.php">一覧画面に戻る</a></p>';
    exit;
}else{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        delete($pdo, $id);
    }
}

require_once('../app/templates/user_delete_submit.html');
?>
