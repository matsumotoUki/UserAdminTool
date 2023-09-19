<?php
require_once('UUID.php');
require_once('zodiacList.php');//まとめてrequireするために一旦配置
use htdocs\UUID;

//TODO：execute()SQL発行時に例外処理する　自分のエラーメッセージ　ログに出力する
//エラー確認方法：文字数超えさせたり  間違えたSQLを発行させる

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function getAll($pdo){
    $stmt = $pdo->query('SELECT * FROM users order by updated desc');
    $results = $stmt->fetchAll();
    return $results;
}

function getOne($pdo, $id){
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}
    
function add($pdo, $name, $email, $userType, $zodiac, $notice){
    $uuid = UUID::generate();
    $stmt = $pdo->prepare("INSERT INTO users (id, name, email, userType, zodiac, notice, created, updated) values(:id, :name, :email, :userType, :zodiac, :notice, now(),now())");
    $stmt->bindValue('id', $uuid, PDO::PARAM_STR);
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('email', $email, PDO::PARAM_STR);
    $stmt->bindValue('userType', $userType, PDO::PARAM_STR);
    $stmt->bindValue('zodiac', $zodiac, PDO::PARAM_STR);
    $stmt->bindValue('notice', $notice, PDO::PARAM_STR);
    $stmt->execute();
}

function update($pdo, $id, $name, $email, $userType, $zodiac, $notice){
    // $stmt = $pdo->prepare("UPDATE users SET name= :name, updated = now() where id = :id");
    $stmt = $pdo->prepare("UPDATE users SET name= :name, email = :email, userType = :userType, zodiac = :zodiac, notice = :notice, updated = now() where id = :id");
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('email', $email, PDO::PARAM_STR);
    $stmt->bindValue('userType', $userType, PDO::PARAM_STR);
    $stmt->bindValue('zodiac', $zodiac, PDO::PARAM_STR);
    $stmt->bindValue('notice', $notice, PDO::PARAM_STR);
    $stmt->bindValue('id', $id, PDO::PARAM_STR);
    $stmt->execute();
}

function delete($pdo, $id){
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function zodiacValue($key){
    global $data;
    return $data[$key];
}