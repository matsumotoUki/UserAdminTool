<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');
// require_once('../app/src/Constants/Zodiac.php');//500エラー

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //戻るボタンから遷移してきた時用の$_POST['name']
    $name = $_POST['name'];
}

require_once('../app/templates/user_create_input.html');
?>
