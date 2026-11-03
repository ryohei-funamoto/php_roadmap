<?php

// 定数の定義は const と define() の2通り。名前に $ は付けない
const APP_NAME = "PHP Roadmap";
define("APP_VERSION", "1.0");
echo APP_NAME, " ", APP_VERSION, "\n";

// const は計算した定数式を使えるが、関数は呼べない
const TAX_RATE = 0.1;
const TAX_INCLUDED_RATE = 1 + TAX_RATE;
// const NAME_LENGTH = strlen(APP_NAME);  // ← コンパイルエラーになる
var_dump(TAX_INCLUDED_RATE);

// define() は実行時に評価されるので、関数の結果を使える。if の中でも定義できる
define("NAME_LENGTH", strlen(APP_NAME));
if (PHP_OS_FAMILY === "Linux") {
    define("LINE_ENDING", "LF");
}
echo NAME_LENGTH, " ", LINE_ENDING, "\n";

// 定数は関数の中からも見える（global は不要）
function showAppName(): void
{
    echo "関数の中: ", APP_NAME, "\n";
}
showAppName();

// 再定義はできない。Warning が出て、値は変わらない
define("APP_VERSION", "2.0");
echo "再定義の後: ", APP_VERSION, "\n";

// 定義済みか調べる
var_dump(defined("APP_NAME"), defined("UNKNOWN_NAME"));

// 未定義の定数を使うと Error になる
try {
    echo UNKNOWN_NAME;
} catch (Error $e) {
    echo "Error: ", $e->getMessage(), "\n";
}

// PHP が最初から用意している定数
echo "--- 定義済み定数 ---\n";
echo PHP_VERSION, " ", PHP_OS_FAMILY, " ", PHP_INT_SIZE, "\n";

// マジック定数: 書かれた場所によって値が変わる
echo "--- マジック定数 ---\n";
echo basename(__FILE__), " ", __LINE__, "\n";
echo basename(__DIR__), "\n";
