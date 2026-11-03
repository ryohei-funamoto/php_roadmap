<?php

// 変数は宣言せず、代入すると作られる。同じ変数に別の型の値を入れてもよい
$value = 100;
var_dump($value);
$value = "百";
var_dump($value);

// 未定義の変数を読むと Warning が出て、値は null として扱われる
var_dump($undefined);

// if や for の { } は新しいスコープを作らない
if (true) {
    $insideIf = "if の中で作った変数";
}
echo $insideIf, "\n";

// 関数の中からは、外の変数は見えない（JavaScript や Python と異なる）
$count = 10;

function readOutsideVariable(): void
{
    var_dump(isset($count));
}
readOutsideVariable();

// global キーワードで、外の変数を関数の中で使える
function incrementWithGlobal(): void
{
    global $count;
    $count++;
}
incrementWithGlobal();
echo "global の後: ", $count, "\n";

// 引数で受け取って戻り値で返すほうが、処理の流れが分かりやすい
function incremented(int $number): int
{
    return $number + 1;
}
$count = incremented($count);
echo "引数と戻り値の後: ", $count, "\n";

// static 変数は、関数を抜けても値が残る
function countCalls(): int
{
    static $calls = 0;
    $calls++;
    return $calls;
}
countCalls();
countCalls();
echo "呼び出し回数: ", countCalls(), "\n";
