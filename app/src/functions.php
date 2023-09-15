<?php
require_once('UUID.php');
use htdocs\UUID;

//TODO：9月13日(水)17時43分：SQL発行時execute()に例外処理する　自分のエラーメッセージ　ログに出力する
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
    
function add($pdo, $name){
    $uuid = UUID::generate();
    $stmt = $pdo->prepare("INSERT INTO users (id, name, email, userType, zodiac, notice,created, updated) values(:id, :name,'xxxxxx@test.com','1','1','0'now(),now())");
    $stmt->bindValue('id', $uuid, PDO::PARAM_STR);
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->execute();
}

function update($pdo, $name, $id){
    $stmt = $pdo->prepare("UPDATE users SET name= :name, updated = now() where id = :id");
    $stmt->bindValue('name', $name, PDO::PARAM_STR);
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

function delete($pdo, $id){
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
}