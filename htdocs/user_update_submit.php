<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

const REFERER = 'http://localhost:8098/user_update_confirm.php';

//入力画面からの遷移でなければエラー画面表示
if(REFERER!==$_SERVER['HTTP_REFERER']){
    echo '<P>このページへ直接アクセスすることは禁止されています。</P>
          <p>一覧画面より対象のご会員様をお選びください。</p>
          <p><a href="user_list.php">一覧画面に戻る</a></p>';
    exit;
}else{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $id = $_POST['id'];
        update($pdo, $name, $id);
        header('Location: http://'.$_SERVER["HTTP_HOST"].'/user_update_submit.php', true, 302);
    }
}

require_once('../app/templates/user_update_submit.html');
?>
