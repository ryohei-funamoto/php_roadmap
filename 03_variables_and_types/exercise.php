<?php

/**
 * 1.
 * 【修正前】
 * - 予想: Warning と NULL が表示される
 * - 結果: Warning が表示される
 * - 反省: NULL が表示されるのは、 var_dump() や print_r() を使った場合
 */

$message = "外";

function show(string $message): void
{
    echo $message . PHP_EOL;
}

show($message);


/**
 * 2.
 */

function nextId(): int
{
    static $number = 0;
    $number++;
    return $number;
}

echo nextId() . PHP_EOL;
echo nextId() . PHP_EOL;
echo nextId() . PHP_EOL;


/**
 * 3.
 */

// 予想: 分からない
// 結果: int(3)
// 反省: 先頭の数値部分 3.9 を読み取り、小数点以下を切り捨てるので 3 になる
var_dump((int) "3.9kg");
// 予想: true
// 結果: bool(false)
// 反省: false になる文字列は "" と "0" のみ。"0.0" は true になる
var_dump((bool) "0");
// 予想: true
// 結果: bool(true)
var_dump((bool) "0.0");
// 予想: ""(空文字)
// 結果: string(0) ""
var_dump((string) false);
// 予想: 5
// 結果: int(5)
var_dump("2" + "3");
// 予想: "23"
// 結果: string(2) "23"
var_dump("2" . "3");


/**
 * 4.
 */

// 予想: bool(false)
// 結果: bool(false)
var_dump(0 == "");
// 予想: bool(true)
// 結果: bool(true)
var_dump("1" == "01");
// 予想: bool(true)
// 結果: bool(true)
var_dump(null == false);
// 予想: bool(false)
// 結果: bool(false)
var_dump(null === false);


/**
 * 5.
 */

const TAX_RATE = 0.1;

function taxOf(int $price): int
{
    return (int) floor($price * TAX_RATE);
}

// 予想: int(100)
// 結果: int(100)
var_dump(taxOf(1000));


/**
 * 6.
 */

$user = ["name" => "Taro", "nickname" => null, "age" => 0];

// 予想: 未設定
// 結果: 未設定
echo $user["nickname"] ?? "未設定";
echo "\n";
// 予想: 0
// 結果: 0
echo $user["age"] ?? 20;
echo "\n";
// 予想: 20
// 結果: 20
echo $user["age"] ?: 20;
echo "\n";
// 予想: 未登録
// 結果: 未登録
echo $user["email"] ?? "未登録";
echo "\n";
