<?php

// if / elseif / else
function grade(int $score): string
{
    if ($score >= 80) {
        return "A";
    } elseif ($score >= 60) {
        return "B";
    } else {
        return "C";
    }
}

echo "--- if / elseif / else ---\n";
echo grade(80), grade(79), grade(60), grade(59), "\n";

// 条件式は bool に変換される（変換のルールは 03_variables_and_types を参照）
echo "--- 条件式の bool 変換 ---\n";
foreach ([0, 1, "", "0", "0.0", [], [0], null] as $value) {
    echo json_encode($value), " は ", ($value ? "true" : "false"), "\n";
}

// 論理演算子は、結果が決まった時点で右側を評価しない（短絡評価）
function loud(string $label, bool $result): bool
{
    echo "{$label} を評価した\n";
    return $result;
}

echo "--- 短絡評価 ---\n";
var_dump(loud("左", false) && loud("右", true));
var_dump(loud("左", true) || loud("右", true));

// and / or は && / || と同じ意味だが、優先順位が = より低い
echo "--- && と and の違い ---\n";
$withSymbol = true && false;
$withWord = true and false;     // ($withWord = true) and false と解釈される
var_dump($withSymbol, $withWord);

// 三項演算子: 値を返す if / else
echo "--- 三項演算子 ---\n";
$age = 20;
echo $age >= 18 ? "成人" : "未成年", "\n";

// 三項演算子を重ねるときは、かっこが必須
echo ($age < 13 ? "子ども" : ($age < 18 ? "10代" : "大人")), "\n";

// テンプレート向けの書き方: { } の代わりに : と endif を使う
echo "--- 別の構文 ---\n";
if ($age >= 18):
    echo "HTML に埋め込むときに読みやすい\n";
else:
    echo "未成年\n";
endif;
