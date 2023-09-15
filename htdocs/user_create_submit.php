<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

const REFERER = 'http://localhost:8098/user_create_confirm.php';//TODO:modify path

//入力画面からの遷移でなければエラー画面表示
if(REFERER!==$_SERVER['HTTP_REFERER']){
    // print_r($_SERVER['HTTP_REFERER']);
    echo '<P>このページへ直接アクセスすることは禁止されています。</P>
          <p>新規登録画面よりご登録ください。</p>
          <p><a href="user_create_input.php">新規登録画面に移る</a></p>
          <p><a href="user_list.php">一覧画面に戻る</a></p>';
    exit;
}else{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        add($pdo, $name);
        header('Location: http://'.$_SERVER["HTTP_HOST"].'/user_create_submit.php', true, 302);
        exit;
    }
}

require_once('../app/templates/user_create_submit.html');
?>
