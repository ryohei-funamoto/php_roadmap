<?php

// キャスト: (型) を値の前に書いて、明示的に変換する
echo "--- int へのキャスト ---\n";
var_dump((int) "42");
var_dump((int) "12abc");    // 先頭の数字だけ使う
var_dump((int) "abc");      // 数字がなければ 0
var_dump((int) 3.99);       // 四捨五入ではなく切り捨て
var_dump((int) -3.99);      // 0 に近い方へ切り捨て

echo "--- string へのキャスト ---\n";
var_dump((string) 1.0);     // "1.0" ではなく "1"
var_dump((string) true);
var_dump((string) false);

// false になる値は決まっている。それ以外はすべて true
echo "--- bool へのキャスト（false になる値）---\n";
var_dump((bool) 0, (bool) 0.0, (bool) "", (bool) "0", (bool) [], (bool) null);
echo "--- bool へのキャスト（true になる値）---\n";
var_dump((bool) "0.0", (bool) "false", (bool) " ", (bool) [0], (bool) -1);

// 型の自動変換（type juggling）: 演算子に合わせて変換される
echo "--- 自動変換 ---\n";
var_dump("10" + 5);     // + は数値に変換する
var_dump("10" . 5);     // . は文字列に変換する
var_dump("1.5" + 1);
var_dump("5 apples" + 1);   // Warning が出るが、5 として計算される

// 数字で始まらない文字列は計算できず、TypeError になる
try {
    var_dump("abc" * 2);
} catch (TypeError $e) {
    echo "TypeError: ", $e->getMessage(), "\n";
}

// == は型を変換して比較し、=== は型も比較する
echo "--- == と === ---\n";
var_dump(1 == "1", 1 === "1");
var_dump(0 == "", null == false, [] == false);
var_dump("1e1" == "10");    // 数値に見える文字列は数値として比較される
var_dump(0 == "abc");       // PHP 8 からは false（PHP 7 までは true）
