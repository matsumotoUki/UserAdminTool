<?php
require_once('../app/src/model.php');
require_once('../app/src/functions.php');

$result = getOne($pdo, $_GET['id']);

//POSTの場合、idの値がない場合、ＤＢに存在しないidの場合はリダイレクト
if ($_SERVER['REQUEST_METHOD'] === 'POST'||empty($_GET['id'])||empty($result)){
   header('Location: http://'.$_SERVER["HTTP_HOST"].'/user_list.php', true, 302);
}

require_once('../app/templates/user_details.html');
?>
