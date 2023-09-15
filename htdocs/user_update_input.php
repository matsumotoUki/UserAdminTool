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
        $id = $_POST['id'];
        //戻るボタンから遷移してきた時用の$_POST['name']
        $name = $_POST['name'];
        $result = getOne($pdo, $id);
    }
}

require_once('../app/templates/user_update_input.html');
?>
