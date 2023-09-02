<?php
// 親のスレッドを取得するSQL

// 親の配列を準備
$thread_array = array();

// コメントデータをテーブルから取得する
$sql = "SELECT * FROM thread";
$statement = $pdo->prepare($sql);
$statement->execute();

$thread_array = $statement;