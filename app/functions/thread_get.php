<?php
// 親のスレッドを取得するSQL

// 親の配列を準備
$thread_array = array();

// コメントデータをテーブルから取得する
$sql = "SELECT * FROM thread";
$statement = $pdo->prepare($sql);
$statement->execute();

$thread_array = $statement;


/*  app\parts\thread.phpの下記の記述でDBに取得が終わるため
    include_onceでpathを読み込んであげる。
    include_once("./app/database/connect.php");

    コメント投稿するための関数
    include("app/functions/comment_add.php");

    データを取得するための関数
    include("app/functions/comment_get.php");


    親スレッドを取得する
    include("app/functions/thread_get.php");
*/
// DBをこのタイミングで接続を切る→切るとうまくいかない
//$pdo = null;
//$statement = null;