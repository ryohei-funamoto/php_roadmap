<?php

// switch: 1つの値を複数の case と比較する
function dayType(string $day): string
{
    switch ($day) {
        case "sat":
        case "sun":             // break がないので、sat も次の case へ進む
            $type = "休日";
            break;
        case "fri":
            $type = "もうすぐ休日";
            break;
        default:
            $type = "平日";
    }
    return $type;
}

echo "--- 基本 ---\n";
echo dayType("sat"), " ", dayType("sun"), " ", dayType("fri"), " ", dayType("mon"), "\n";

// break を忘れると、次の case の処理も実行される
echo "--- break を忘れた場合 ---\n";
$level = 1;
switch ($level) {
    case 1:
        echo "レベル1の処理\n";
    case 2:
        echo "レベル2の処理\n";
        break;
    case 3:
        echo "レベル3の処理\n";
}

// case の比較は == なので、型が違っても一致する
echo "--- 比較は == ---\n";
$input = "1";
switch ($input) {
    case 1:
        echo "\"1\" は case 1 に一致した\n";
        break;
    default:
        echo "一致しなかった\n";
}

$empty = null;
switch ($empty) {
    case false:
        echo "null は case false に一致した\n";
        break;
    default:
        echo "一致しなかった\n";
}

// switch は値を返さないので、結果は変数に入れるか return する
