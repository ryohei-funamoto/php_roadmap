<?php

/**
 * 1.
 */

function gradeWithIf(int $score): string
{
    // if ($score < 0 || $score > 100) {
    //     return "無効";
    // } elseif ($score >= 90) {
    //     return "A";
    // } elseif ($score >= 70) {
    //     return "B";
    // } elseif ($score >= 50) {
    //     return "C";
    // } else {
    //     return "D";
    // }

    // より良い書き方(可読性の観点から)
    // return するとそこで関数を抜けるので、 elseif と else は省ける
    if ($score < 0 || $score > 100) {
        return "無効";
    }
    if ($score >= 90) {
        return "A";
    }
    if ($score >= 70) {
        return "B";
    }
    if ($score >= 50) {
        return "C";
    }
    return "D";
}

echo gradeWithIf(-1) . PHP_EOL;
echo gradeWithIf(0) . PHP_EOL;
echo gradeWithIf(49) . PHP_EOL;
echo gradeWithIf(50) . PHP_EOL;
echo gradeWithIf(69) . PHP_EOL;
echo gradeWithIf(70) . PHP_EOL;
echo gradeWithIf(89) . PHP_EOL;
echo gradeWithIf(90) . PHP_EOL;
echo gradeWithIf(100) . PHP_EOL;
echo gradeWithIf(101) . PHP_EOL;


/**
 * 2.
 */

function gradeWithMatch(int $score): string
{
    return match (true) {
        $score < 0, $score > 100 => "無効",
        $score >= 90 => "A",
        $score >= 70 => "B",
        $score >= 50 => "C",
        default => "D",
    };
}

echo gradeWithMatch(-1) . PHP_EOL;
echo gradeWithMatch(0) . PHP_EOL;
echo gradeWithMatch(49) . PHP_EOL;
echo gradeWithMatch(50) . PHP_EOL;
echo gradeWithMatch(69) . PHP_EOL;
echo gradeWithMatch(70) . PHP_EOL;
echo gradeWithMatch(89) . PHP_EOL;
echo gradeWithMatch(90) . PHP_EOL;
echo gradeWithMatch(100) . PHP_EOL;
echo gradeWithMatch(101) . PHP_EOL;


/**
 * 3.
 * 予想:
 * - int の 1
 * - string の 1
 * 結果:
 * - int の 1
 * - string の 1
 */

$value = "1";

switch ($value) {
    case 1:
        echo "int の 1\n";
        break;
    case "1":
        echo "string の 1\n";
        break;
}

echo match ($value) {
    1 => "int の 1\n",
    "1" => "string の 1\n",
};


/**
 * 4.
 */

for ($i = 1; $i <= 15; $i++) {
    if ($i % 3 === 0 && $i % 5 === 0) {
        echo "FizzBuzz\n";
    } elseif ($i % 3 === 0) {
        echo "Fizz\n";
    } elseif ($i % 5 === 0) {
        echo "Buzz\n";
    } else {
        echo "{$i}\n";
    }
}


/**
 * 5.
 * 予想: $a -> 2, $b -> 6
 * 結果: $a -> 2, $b -> 6
 */

for ($a = 1; $a <= 9; $a++) {
    for ($b = 1; $b <= 9; $b++) {
        if ($a * $b === 12) {
            echo "\$a: {$a}\n";
            echo "\$b: {$b}\n";
            break 2;
        }
    }
}


/**
 * 6.
 * 予想: [2, 4, 4]
 * 結果: 
 * array(3) {
 *   [0]=>
 *   int(2)
 *   [1]=>
 *   int(4)
 *   [2]=>
 *   &int(4)
 * }
 */

$numbers = [1, 2, 3];
foreach ($numbers as &$number) {
    $number *= 2;
}
foreach ($numbers as $number) {
}
var_dump($numbers);
