<?php
// 1.
echo "PHP", " ", 1994, " ", true; // 実行結果: PHP 1994 1
echo "\n";

// 2.
$price = 1980;
echo "価格: {$price}円\n"; // 実行結果: 価格: 1980円
echo '価格: {$price}円\n'; // 実行結果: 価格: {$price}円\n
echo "\n";

// 3.
$array = ["php", 8.5, true, null];
// print_r と var_dump の違い
// - print_r
//      - false, null が表示されない
//      - データ型が表示されない
//      - 実行結果の体裁が整っている
// - var_dump
//      - false, null が表示される
//      - データ型が表示される
//      - print_r に比べて、実行結果の体裁が整っていない
print_r($array);
// 実行結果:
// Array
// (
//     [0] => php
//     [1] => 8.5
//     [2] => 1
//     [3] => 
// )
var_dump($array);
// 実行結果:
// array(4) {
//   [0]=>
//   string(3) "php"
//   [1]=>
//   float(8.5)
//   [2]=>
//   bool(true)
//   [3]=>
//   NULL
// }

// 4.
$x = print "test";
echo "\n";
// 予想: 1 が表示される
var_dump($x);
// 実行結果: int(1)
