<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //戻るボタンから遷移してきた時用の$_POST['name']
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userType = $_POST['userType'];
        $zodiac = $_POST['zodiac'];
        $notice = $_POST['notice'];
}

require_once('../app/templates/user_create_input.html');
?>
