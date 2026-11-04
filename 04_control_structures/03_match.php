<?php

// match: 値を返す式。break は不要で、次の条件へ進むこともない
function dayType(string $day): string
{
    return match ($day) {
        "sat", "sun" => "休日",     // カンマで複数の値を並べられる
        "fri" => "もうすぐ休日",
        default => "平日",
    };
}

echo "--- 基本 ---\n";
echo dayType("sat"), " ", dayType("sun"), " ", dayType("fri"), " ", dayType("mon"), "\n";

// 比較は === なので、型が違うと一致しない
echo "--- 比較は === ---\n";
$input = "1";
echo match ($input) {
    1 => "int の 1 に一致した",
    "1" => "string の \"1\" に一致した",
}, "\n";

// どれにも一致せず default もないと、UnhandledMatchError になる
echo "--- 一致しない場合 ---\n";
try {
    echo match (5) {
        1 => "one",
        2 => "two",
    };
} catch (UnhandledMatchError $e) {
    echo "UnhandledMatchError: ", $e->getMessage(), "\n";
}

// match (true) で、範囲の判定もできる。上から順に評価される
function grade(int $score): string
{
    return match (true) {
        $score >= 80 => "A",
        $score >= 60 => "B",
        default => "C",
    };
}

echo "--- match (true) ---\n";
echo grade(80), grade(79), grade(60), grade(59), "\n";

// 右側に書けるのは式1つだけ。一致した条件の右側だけが評価される
function loud(string $label): string
{
    echo "{$label} を評価した\n";
    return $label;
}

echo "--- 評価されるのは一致した部分だけ ---\n";
echo match (2) {
    1 => loud("one"),
    2 => loud("two"),
    3 => loud("three"),
}, "\n";
