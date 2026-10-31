<?php

// 1行コメント（// または #）
# こちらも1行コメント
/*
 * 複数行コメント
 */

// 文の終わりにはセミコロン ; が必要
$name = "PHP";          // 変数は $ で始まる
$version = 8.5;

// ブロックは波かっこ { } で囲む（C言語風）
if ($version >= 8) {
    echo "Modern {$name}\n";
}

// 変数名は大文字・小文字を区別する
$Name = "別の変数";
echo $name . " / " . $Name . "\n";

// キーワードと関数名は大文字・小文字を区別しない（ただし小文字で書くのが慣習）
ECHO "echo は大文字でも動く\n";
echo STRTOUPPER("strtoupper も大文字で呼べる") . "\n";

// ダブルクォートは変数を展開し、シングルクォートは展開しない
echo "double: $name\n";
echo 'single: $name\n';
echo "\n";
