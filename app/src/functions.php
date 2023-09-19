<?php
require_once('model.php');//まとめてrequireするために一旦配置
require_once('zodiacList.php');//まとめてrequireするために一旦配置

//エスケープ処理でXSS対策
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//干支のテキストを返す
function zodiacValue($key){
    global $data;
    return $data[$key];
}