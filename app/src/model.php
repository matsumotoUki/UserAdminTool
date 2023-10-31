<?php
require_once('UUID.php');
require_once('config.php');//まとめてrequireするために一旦配置
use htdocs\UUID;

//田村さんから課題：execute()SQL発行時に例外処理する　自分のエラーメッセージ　ログに出力する
//エラー確認方法：文字数超えさせたり  間違えたSQLを発行させる
// 田村さんから課題：9月20日(水)
// ・登録や更新した時にログ出力してほしい。
// ・DB例外発生時もログ出力してほしい。←catch内
// ・入力チェック（増やした項目）
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~DB接続~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
define('DSN', 'mysql:dbname=php; host=db; charset=utf8');
define('USER_NAME', 'php');
define('PASSWD', 'php');

try {
    $pdo = new PDO(
        DSN,
        USER_NAME,
        PASSWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );


} catch (PDOException $e) {
    print "PDOしっぱい:{$e->getMessage()}";
    exit;
}
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~SQLクエリ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
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

    try{
        //文字数を超える場合error.logファイルに文字数と、渡ってきた値を表示9月19日
        if(mb_strlen($name)>40){
            $log_time = date('Y-m-d H:i:s');
            //Permission denied in /home/httpd/app/src/model.php on line 55
            error_log('['.$log_time.'] functon addメソッド内※エラー：入力された名前の文字数（'.mb_strlen($name).'）'."\r\n", 3, "error.log");
            print_r('エラーログの間');
            //Permission denied in /home/httpd/app/src/model.php on line 57
            error_log('$name：40文字以上の名前　$email：'.$email.'$userType：'.$userType.'$zodiac:'.$zodiac.'$notice:'.$notice."\r\n", 3, "error.log");
            throw new Exception('自分のエラーメッセージ：40文字以上<p><a href="user_create_input.php">新規登録画面に移る</a></p>');
        }

        $uuid = UUID::generate();
        $stmt = $pdo->prepare("INSERT INTO users (id, name, email, userType, zodiac, notice, created, updated) values(:id, :name, :email, :userType, :zodiac, :notice, now(),now())");
        $stmt->bindValue('id', $uuid, PDO::PARAM_STR);
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);
        $stmt->bindValue('userType', $userType, PDO::PARAM_STR);
        $stmt->bindValue('zodiac', $zodiac, PDO::PARAM_STR);
        $stmt->bindValue('notice', $notice, PDO::PARAM_STR);
        $stmt->execute();

    }catch(Exception $e){
        //田村さん：ここでログを出力9時27分
        print_r('catch内');
        echo $e->getMessage();
        exit;
    }
}

function update($pdo, $id, $name, $email, $userType, $zodiac, $notice){
    try{
        //文字数を超える場合error.logファイルに文字数と、渡ってきた値を表示9月19日
        if(mb_strlen($name)>40){
            $log_time = date('Y-m-d H:i:s');
            error_log('['.$log_time.'] functon updateメソッド内※エラー：入力された名前の文字数（'.mb_strlen($name).'）'."\n", 3, "../htdocs/error.log");
            error_log('$name：'.$name.'$email：'.$email.'$userType：'.$userType.'$zodiac:'.$zodiac.'$notice:'.$notice, 3, "../htdocs/error.log");//htdocs外に配置するとPermission denied
            throw new Exception('自分のエラーメッセージ：40文字以上<p><a href="user_create_input.php">新規登録画面に移る</a></p>');
        }

        $stmt = $pdo->prepare("UPDATE users SET name= :name, email = :email, userType = :userType, zodiac = :zodiac, notice = :notice, updated = now() where id = :id");
        $stmt->bindValue('name', $name, PDO::PARAM_STR);
        $stmt->bindValue('email', $email, PDO::PARAM_STR);
        $stmt->bindValue('userType', $userType, PDO::PARAM_STR);
        $stmt->bindValue('zodiac', $zodiac, PDO::PARAM_STR);
        $stmt->bindValue('notice', $notice, PDO::PARAM_STR);
        $stmt->bindValue('id', $id, PDO::PARAM_STR);
        $stmt->execute();

    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }
}

function delete($pdo, $id){
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindValue('id', $id, PDO::PARAM_INT);
    $stmt->execute();
}

