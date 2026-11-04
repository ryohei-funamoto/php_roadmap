<?php

// while: 条件が true の間くり返す。最初に条件を確認する
echo "--- while ---\n";
$count = 1;
while ($count <= 3) {
    echo $count, " ";
    $count++;
}
echo "\n";

// do...while: 処理の後に条件を確認するので、最低1回は実行される
echo "--- while と do...while の違い ---\n";
$count = 100;
while ($count <= 3) {
    echo "while の中\n";
}
do {
    echo "do...while の中\n";
} while ($count <= 3);

// for: 回数が決まっているときに使う（初期化; 条件; 更新）
echo "--- for ---\n";
for ($i = 1; $i <= 3; $i++) {
    echo $i, " ";
}
echo "\n";

// ループの変数は、ループの後も残る（ブロックスコープがない）
echo "ループの後の \$i: ", $i, "\n";

// foreach: 配列の要素を順番に取り出す
echo "--- foreach ---\n";
$fruits = ["apple", "banana"];
foreach ($fruits as $fruit) {
    echo $fruit, "\n";
}
foreach ($fruits as $index => $fruit) {
    echo $index, ": ", $fruit, "\n";
}
$prices = ["apple" => 120, "banana" => 80];
foreach ($prices as $name => $price) {
    echo $name, " = ", $price, "\n";
}

// break: ループを抜ける / continue: 次の周回へ進む
echo "--- break と continue ---\n";
for ($i = 1; $i <= 5; $i++) {
    if ($i === 2) {
        continue;
    }
    if ($i === 4) {
        break;
    }
    echo $i, " ";
}
echo "\n";

// break 2: 2重のループをまとめて抜ける
echo "--- break 2 ---\n";
for ($row = 1; $row <= 3; $row++) {
    for ($col = 1; $col <= 3; $col++) {
        if ($row * $col === 4) {
            echo "見つかった: {$row} x {$col}\n";
            break 2;
        }
    }
}

// foreach の変数は要素のコピーなので、書き換えても配列は変わらない
echo "--- 値渡しと参照渡し ---\n";
$numbers = [1, 2, 3];
foreach ($numbers as $number) {
    $number *= 10;
}
echo json_encode($numbers), "\n";

// & を付けると、要素そのものを書き換えられる
foreach ($numbers as &$number) {
    $number *= 10;
}
unset($number);     // 参照を解除する（理由は README を参照）
echo json_encode($numbers), "\n";

// unset を忘れると、後のループで最後の要素が書き換わる
$letters = ["a", "b", "c"];
foreach ($letters as &$letter) {
}
foreach ($letters as $letter) {
}
echo json_encode($letters), "\n";
