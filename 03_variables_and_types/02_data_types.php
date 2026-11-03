<?php

// 基本の型
var_dump(42);           // int
var_dump(3.14);         // float
var_dump("PHP");        // string
var_dump(true);         // bool
var_dump([1, 2]);       // array
var_dump(null);         // null
var_dump(new stdClass); // object

// 型を調べる
echo "--- 型を調べる ---\n";
echo gettype(42), "\n";         // 古い名前（integer）を返す
echo get_debug_type(42), "\n";  // 型宣言と同じ名前（int）を返す
var_dump(is_int(42), is_int("42"), is_numeric("42"));

// int の範囲を超えると float になる
echo "--- int の範囲 ---\n";
var_dump(PHP_INT_MAX);
var_dump(PHP_INT_MAX + 1);

// float は誤差を含む。=== で比較しない
echo "--- float の誤差 ---\n";
var_dump(0.1 + 0.2);
var_dump(0.1 + 0.2 === 0.3);
var_dump(abs((0.1 + 0.2) - 0.3) < PHP_FLOAT_EPSILON);

// strlen はバイト数を返す。文字数は mb_strlen で数える
echo "--- 文字列の長さ ---\n";
var_dump("日本語");
var_dump(strlen("日本語"));
var_dump(mb_strlen("日本語"));
