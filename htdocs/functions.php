<?php

function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//TODO テーブル名定数にする
function getAll($pdo){
    $stmt = $pdo->query('SELECT * FROM users');
    $results = $stmt->fetchAll();
    return $results;
}

function getOne($pdo, $id){
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
    // foreach ($stmt as $row) {
    //     var_dump($row);
    // }
}

function addNew($pdo){
    $new = filter_input(INPUT_POST, 'new');
    $stmt = $pdo->prepare("INSERT INTO users (nam, created, updated) values(:new,now(),now())");
    $stmt->bindValue('new', $new, PDO::PARAM_STR);
    $stmt->execute();
}