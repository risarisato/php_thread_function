<?php

$user ="root";
$pass ="root";

// DB接続 php_Date_Objects＝PDO
// もちろんデータベースを作成しないとダメ
try {
    $pdo = new PDO('mysql:host=localhost;dbname=2chan-bbs', $user, $pass);
    echo "DBに接続に成功しました。";
} catch (PDOExpection $error) {
    echo $error->getMessage();
}
// 今回HTMLを書く必要ないので閉じTAGはいらない

// DBを接続を見に行くの下記URLまで見にいないといけないのは面倒
// http://localhost:8080/php_thread_function/app/database/connect.php

?>
