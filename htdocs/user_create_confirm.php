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
    if(empty($_POST['name'])||empty($_POST['userType'])){
        echo '<P>※未入力の項目があります。</P>
              <p>※お名前とユーザ種別は入力が必須の項目です。</p>
              <p><a href="user_create_input.php">新規登録画面に移る</a></p>
              <p><a href="user_list.php">一覧画面に戻る</a></p>';
        exit;
    }else{
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userType = $_POST['userType']??'0';//NULLなら一旦「0」を代入
        $zodiac = $_POST['zodiac']??'0';//NULLなら一旦「0」を代入（上手くいっていない）
        $notice = $_POST['notice']??'0';//NULLなら一旦「0」を代入

    }
}

require_once('../app/templates/user_create_confirm.html');
?>
