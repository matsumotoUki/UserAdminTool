<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

if(!isset($_POST['name'])){
    echo '<P>このページへ直接アクセスすることは禁止されています。</P>
          <p>新規登録画面での入力をお願いいたします。</p>
          <p><a href="user_create_input.php">新規登録画面に移る</a></p>
          <p><a href="user_list.php">一覧画面に戻る</a></p>';
    exit;
}else{
    if(empty($_POST['name'])){
        echo '<P>※お名前が未入力です。</P>
              <p>※新規登録画面の入力欄にお名前を入力してください。</p>
              <p><a href="user_create_input.php">新規登録画面に移る</a></p>
              <p><a href="user_list.php">一覧画面に戻る</a></p>';
        exit;
    }else{
        $name = $_POST['name'];
    }
}

require_once('../app/templates/user_create_confirm.html');
?>
