<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

$results = getAll($pdo);

try{//ここで例外処理が必要か微妙
    if(empty($results)){
        throw new Exception('登録されている会員がいません。<p><a href="user_create_input.php">新規登録画面へ</a></p>');
    }
}catch(Exception $e){
    echo $e->getMessage();
    exit;
}

require_once('../app/templates/user_list.html');
