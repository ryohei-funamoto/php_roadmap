<?php

$fruits = ["apple", "banana", "cherry"];
$user = ["name" => "Taro", "age" => 20, "admin" => false, "email" => null];

// echo で配列は表示できない（"Array" と警告が出る）
// echo $fruits;

// print_r: 人が読みやすい形で中身を表示する
echo "--- print_r ---\n";
print_r($fruits);
print_r($user);

// var_dump: 型と値を表示する（デバッグ向き）
echo "--- var_dump ---\n";
var_dump($fruits);
var_dump($user);

// print_r は false と null が空文字に見えるが、var_dump は区別できる
echo "--- false / null の違い ---\n";
print_r(false);
print_r(null);
echo "(print_r では何も表示されない)\n";
var_dump(false, null, 0, "0", "");

// print_r の第2引数に true を渡すと、出力せずに文字列として返す
$text = print_r($fruits, true);
echo "文字列の長さ: ", strlen($text), "\n";
