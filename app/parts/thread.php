<?php

// DBを接続の「状態」を見に下記URLまで見にいないといけないのは面倒
// http://localhost:8080/php_thread_function/app/database/connect.php
// include_onceでpathを読み込んであげる。
include_once("./app/database/connect.php");

// コメント投稿するための関数
include("app/functions/comment_add.php");

// データを取得するための関数
include("app/functions/comment_get.php");


// 親スレッドを取得する
include("app/functions/thread_get.php");


//var_dump($thread_array); 親スレッドが取得できているか確認

// DBの接続を閉じる(これがないからXAMPPのphpmyadminがバグる？)
//$pdo = null;
?>

<!-- スレッドエリア -->
<?php foreach ($thread_array as $thread) :?>
<div class="threadWrapper">
    <div class="childWrapper">
        <div class="threadTitle">
            <span>【スレッド掲示板作成】</span>
            <!-- <h1>PHP掲示板スレッド機能-掲示板を作ってみた</h1>ハードコーディング -->
            <h1><?php echo $thread["title"] ?></h1>
        </div>
        
        <!-- コメントを表示するためのエリア -->
        <?php include("app/parts/commnetSection.php"); ?>
        <!-- メソッドをpostで送信する -->
        <?php include("commentFrom.php"); ?>
    </div>
</div>
<?php endforeach ?>