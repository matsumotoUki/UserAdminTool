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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userType = $_POST['userType']??'0';//NULLなら一旦「0」を代入
        $zodiac = $_POST['zodiac']??'0';//NULLなら一旦「0」を代入（上手くいっていない）
        $notice = $_POST['notice']??'0';//NULLなら一旦「0」を代入

        $result = getOne($pdo, $id);
    }
}

require_once('../app/templates/user_update_confirm.html');
?>
