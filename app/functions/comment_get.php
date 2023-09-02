<?php
// データを取得するための関数
$commnet_array = array();

// sqlクエリを取得する=コメントデータをテーブルから取得する
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();
$commnet_array = $statement;

//sqlクエリの中身を「var_dump」で確認する
//var_dump($commnet_array);
//var_dump($commnet_array->fetchObject());
//var_dumpするとプログラムが止まっていまうのはdd();と同じ
//var_dump($commnet_array->fetchAll());


#$title = "shincode";
#var_dump($title); #phpのデバッグ
#string(8)=型＞文字 "shincode"＝値
# スーパーグローバル変数はPHPの組み込み変数
# "username"(key)=>"shincode"(値)の連想配列
#$username = $_POST["username"];
#var_dump($username); #ここでPOSTメソッドが発動している
