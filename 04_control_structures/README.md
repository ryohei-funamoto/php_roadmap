# 制御構文

roadmap.sh/php の Conditionals（if/else、switch、match）と Loops の学習メモ。

| ファイル | 内容 |
|---|---|
| `01_if_else.php` | if / elseif / else、論理演算子、三項演算子 |
| `02_switch.php` | switch |
| `03_match.php` | match |
| `04_loops.php` | while、do...while、for、foreach、break、continue |

実行方法：

```bash
php 01_if_else.php
```

## 1. if / elseif / else（`01_if_else.php`）

```php
if ($score >= 80) {
    return "A";
} elseif ($score >= 60) {
    return "B";
} else {
    return "C";
}
```

- 上から順に評価し、最初に `true` になったブロックだけを実行する。
- 条件式は `bool` に変換される。変換のルールは `03_variables_and_types/README.md` の「bool への変換」と同じ。

```
"0"    は false
"0.0"  は true
[]     は false
[0]    は true
```

### 論理演算子と短絡評価

`&&`（かつ）と `||`（または）は、左側だけで結果が決まると、**右側を評価しない**。これを短絡評価という。

| 式 | 右側 | 理由 |
|---|---|---|
| `false && 右側` | 評価しない | 左が `false` なら、結果は必ず `false` |
| `true \|\| 右側` | 評価しない | 左が `true` なら、結果は必ず `true` |

### `&&` と `and` の違い

`and` と `or` は、**`=` より優先順位が低い**。意図しない結果になりやすいので、`&&` と `||` を使う。

```php
$withSymbol = true && false;    // false
$withWord = true and false;     // true。($withWord = true) and false と解釈される
```

### 三項演算子

`条件 ? trueのときの値 : falseのときの値` の形で、値を返す。

```php
echo $age >= 18 ? "成人" : "未成年";
```

重ねるときは、**かっこが必須**。かっこがないと、PHP 8 からは実行前にエラーになる。

```php
echo $age < 13 ? "子ども" : ($age < 18 ? "10代" : "大人");    // OK
echo $age < 13 ? "子ども" : $age < 18 ? "10代" : "大人";      // Fatal error
```

ただし、重ねると読みにくいので、3通り以上の分岐は `match` を検討する。

### 別の構文

`{ }` の代わりに `:` と `endif` を使う書き方がある。HTML に埋め込むときに、どのブロックの終わりか分かりやすい。
`foreach` にも同じ書き方があり、`02_basic_php_syntax/04_embed_in_html.php` で使っている。

```php
if ($age >= 18):
    echo "成人";
else:
    echo "未成年";
endif;
```

## 2. switch（`02_switch.php`）

1つの値を、複数の `case` と比較する。

```php
switch ($day) {
    case "sat":
    case "sun":
        $type = "休日";
        break;
    case "fri":
        $type = "もうすぐ休日";
        break;
    default:
        $type = "平日";
}
```

### 注意点

**`break` を忘れると、次の `case` の処理も実行される。** わざと `break` を省くと、上の `sat` と `sun` のように複数の値で同じ処理を共有できる。

```php
$level = 1;
switch ($level) {
    case 1:
        echo "レベル1の処理\n";    // 実行される
    case 2:
        echo "レベル2の処理\n";    // これも実行される
        break;
    case 3:
        echo "レベル3の処理\n";    // 実行されない
}
```

**比較は `==` なので、型が違っても一致する。**

| 値 | `case` | 結果 |
|---|---|---|
| `"1"` | `case 1` | 一致する |
| `null` | `case false` | 一致する |

## 3. match（`03_match.php`）

PHP 8 で追加された、値を返す式。

```php
return match ($day) {
    "sat", "sun" => "休日",
    "fri" => "もうすぐ休日",
    default => "平日",
};
```

### switch との違い

| | `switch` | `match` |
|---|---|---|
| 比較 | `==` | `===` |
| 値を返すか | 返さない（文） | 返す（式） |
| `break` | 必要 | 不要（次の条件へ進まない） |
| どれにも一致しないとき | 何もしない | `UnhandledMatchError` |
| 条件の右側 | 複数の文を書ける | 式1つだけ |

**値を決めるだけなら `match` を使う。** 一致しないときにエラーで気づけるので、値の書き漏れを見つけやすい。
複数の文を実行したいときは `switch` か `if` を使う。

### 一致しないとき

`default` がなく、どれにも一致しないと `UnhandledMatchError` になる。

```
UnhandledMatchError: Unhandled match case of type int
```

### `match (true)` で範囲を判定する

各条件を `true` と比較するので、`if` / `elseif` のように範囲を判定できる。上から順に評価される。

```php
return match (true) {
    $score >= 80 => "A",
    $score >= 60 => "B",
    default => "C",
};
```

比較は `===` なので、**条件の結果は `bool` でなければならない**。`"文字列"` のような truthy な値は `true` と一致しない。

### 評価されるのは一致した部分だけ

一致した条件の右側だけが評価される。実行結果では `loud("two")` だけが呼ばれ、`one` と `three` は呼ばれない。

```
two を評価した
two
```

## 4. ループ（`04_loops.php`）

| 構文 | 使う場面 |
|---|---|
| `while` | 回数が決まっていない。条件を先に確認する |
| `do...while` | 最低1回は実行したい。条件を後で確認する |
| `for` | 回数が決まっている |
| `foreach` | 配列の要素を順番に処理する。**配列にはこれを使う** |

### while と do...while

条件が最初から `false` のとき、`while` は1回も実行されないが、`do...while` は1回実行される。

```php
$count = 100;
while ($count <= 3) {
    echo "while の中\n";        // 実行されない
}
do {
    echo "do...while の中\n";   // 1回実行される
} while ($count <= 3);
```

### for

```php
for ($i = 1; $i <= 3; $i++) {
    echo $i, " ";
}
echo $i;    // 4。ループの変数はループの後も残る
```

### foreach

```php
foreach ($fruits as $fruit) { ... }                 // 値だけ
foreach ($fruits as $index => $fruit) { ... }       // 添字と値
foreach ($prices as $name => $price) { ... }        // キーと値
```

### break と continue

| 構文 | 動き |
|---|---|
| `continue` | 残りの処理を飛ばして、次の周回へ進む |
| `break` | ループを抜ける |
| `break 2` | 2重のループをまとめて抜ける |

`1` から `5` のループで、`2` で `continue`、`4` で `break` すると、次のようになる。

```
1 3
```

### foreach の参照渡しと、その落とし穴

ループの変数は要素のコピーなので、書き換えても配列は変わらない。`&` を付けると要素そのものを書き換えられる。

```php
$numbers = [1, 2, 3];
foreach ($numbers as $number) {
    $number *= 10;
}
// [1, 2, 3] のまま

foreach ($numbers as &$number) {
    $number *= 10;
}
unset($number);
// [10, 20, 30]
```

**`unset` を忘れると、ループの後も変数が最後の要素を指したままになる。** 同じ変数名を別のループで使うと、最後の要素が書き換わってしまう。

```php
$letters = ["a", "b", "c"];
foreach ($letters as &$letter) {
}
foreach ($letters as $letter) {
}
// ["a", "b", "b"]
```

2つ目のループの動きは次のとおり。`$letter` は `$letters[2]` を指しているので、代入するたびに `$letters[2]` が変わる。

| 周回 | `$letter` に代入する値 | `$letters` |
|---|---|---|
| 1回目 | `"a"` | `["a", "b", "a"]` |
| 2回目 | `"b"` | `["a", "b", "b"]` |
| 3回目 | `$letters[2]`（今は `"b"`） | `["a", "b", "b"]` |

## 練習問題

`exercise.php` を自分で作って、次のことを試す。予想を問う問題は、実行する前に予想をコメントに書く。

1. 点数を受け取って評価を返す関数 `gradeWithIf(int $score): string` を、`if` / `elseif` / `else` で作る
   - 90 以上は `"A"`、70 以上は `"B"`、50 以上は `"C"`、それ以外は `"D"`
   - 0 未満または 100 より大きいときは `"無効"`
   - `-1`、`0`、`49`、`50`、`69`、`70`、`89`、`90`、`100`、`101` で結果を確かめる
2. 1問目と同じ関数を、`match (true)` で `gradeWithMatch(int $score): string` として作る
3. 次の結果を予想してから確かめる
   ```php
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
   ```
4. 1 から 15 までの数について、3 の倍数は `Fizz`、5 の倍数は `Buzz`、両方の倍数は `FizzBuzz`、それ以外は数を1行ずつ出力する
5. 2重の `for` で、`$a` と `$b`（どちらも 1 から 9）について `$a * $b === 12` になる最初の組み合わせを見つけて出力し、`break 2` でループを抜ける。実行する前に、どの組み合わせが出力されるか予想する
6. 次の `$numbers` の結果を予想してから確かめる
   ```php
   $numbers = [1, 2, 3];
   foreach ($numbers as &$number) {
       $number *= 2;
   }
   foreach ($numbers as $number) {
   }
   var_dump($numbers);
   ```
