# 変数と型

roadmap.sh/php の Variables and Scope、Data Types、Casting Data Types、Constants、Null Coalescing Operator、Null Safe Operator の学習メモ。

| ファイル | 内容 |
|---|---|
| `01_variables_and_scope.php` | 変数とスコープ |
| `02_data_types.php` | データ型 |
| `03_casting.php` | キャストと型の自動変換 |
| `04_constants.php` | 定数 |
| `05_null_operators.php` | `??`、`??=`、`?->` |

実行方法：

```bash
php 01_variables_and_scope.php
```

サンプルには、説明のためにわざと Warning を出している箇所がある。例えば次のように表示される。

```
PHP Warning:  Undefined variable $undefined in .../01_variables_and_scope.php on line 10
```

Warning が出ても、処理は止まらずに次の行へ進む。

## 1. 変数とスコープ（`01_variables_and_scope.php`）

- 変数は宣言せず、値を代入すると作られる。同じ変数に別の型の値を入れてもよい。
- 未定義の変数を読むと Warning が出て、値は `null` として扱われる。

### スコープのルール

| 場所 | 外の変数が見えるか |
|---|---|
| `if` や `for` の `{ }` の中 | 見える。中で作った変数も外から使える（ブロックスコープがない） |
| 関数の中 | **見えない**（JavaScript や Python と異なる） |

関数の中で外の値を使う方法は次のとおり。

| 方法 | 特徴 |
|---|---|
| 引数と戻り値 | 処理の流れが分かりやすく、基本はこれを使う |
| `global $count;` | 外の変数を直接変更できるが、どこで変わったか追いにくくなる |

### static 変数

`static` を付けた変数は、関数を抜けても値が残る。初期化は最初の1回だけ行われる。

```php
function countCalls(): int
{
    static $calls = 0;
    $calls++;
    return $calls;
}
```

3回呼ぶと、3回目の戻り値は `3` になる。

## 2. データ型（`02_data_types.php`）

| 型 | 例 | `var_dump` の表示 |
|---|---|---|
| int | `42` | `int(42)` |
| float | `3.14` | `float(3.14)` |
| string | `"PHP"` | `string(3) "PHP"` |
| bool | `true` | `bool(true)` |
| array | `[1, 2]` | `array(2) { ... }` |
| object | `new stdClass` | `object(stdClass)#1 (0) { ... }` |
| null | `null` | `NULL` |

他に resource 型がある。ファイルを開いたときなどに使われる特殊な型で、PHP 8 からは順次オブジェクトに置き換えられている。

### 型を調べる

| 関数 | `42` の結果 | 備考 |
|---|---|---|
| `gettype()` | `integer` | 古い名前を返す |
| `get_debug_type()` | `int` | 型宣言と同じ名前を返す。**こちらがおすすめ** |
| `is_int()` | `true` | 型ごとに `is_string()`、`is_array()` などがある |

`is_int("42")` は `false`、`is_numeric("42")` は `true`。`is_numeric` は数値として読める文字列にも `true` を返す。

### つまずきやすい点

**int の範囲を超えると float になる。** エラーにはならない。

```
PHP_INT_MAX      → int(9223372036854775807)
PHP_INT_MAX + 1  → float(9.223372036854776E+18)
```

**float は誤差を含むので、`===` で比較しない。**

```
0.1 + 0.2                                      → float(0.30000000000000004)
0.1 + 0.2 === 0.3                              → bool(false)
abs((0.1 + 0.2) - 0.3) < PHP_FLOAT_EPSILON     → bool(true)
```

金額のように誤差が許されない値は、float で計算しない（円なら int で持つ）。

**`strlen` はバイト数を返す。** 文字数は `mb_strlen` で数える。`var_dump` の `string(9)` の数字もバイト数。

```
var_dump("日本語")   → string(9) "日本語"
strlen("日本語")     → int(9)
mb_strlen("日本語")  → int(3)
```

## 3. キャストと型の自動変換（`03_casting.php`）

### キャスト

値の前に `(型)` を書くと、明示的に変換できる。

| 式 | 結果 | ポイント |
|---|---|---|
| `(int) "42"` | `42` | |
| `(int) "12abc"` | `12` | 先頭の数字だけ使う |
| `(int) "abc"` | `0` | 数字がなければ 0 |
| `(int) 3.99` | `3` | 四捨五入ではなく切り捨て |
| `(int) -3.99` | `-3` | 0 に近い方へ切り捨て |
| `(string) 1.0` | `"1"` | `"1.0"` にはならない |
| `(string) true` | `"1"` | |
| `(string) false` | `""` | 理由は `02_basic_php_syntax/README.md` を参照 |

> **注意：** `(integer)` や `(boolean)` のような長い名前のキャストは、PHP 8.5 で非推奨になった。`(int)`、`(bool)`、`(float)`、`(string)` を使う。

### bool への変換

**false になる値は決まっていて、それ以外はすべて true になる。**

| false になる値 | 間違えやすい true の値 |
|---|---|
| `false` | `"false"` |
| `0`、`0.0` | `"0.0"` |
| `""`、`"0"` | `" "`（空白1文字） |
| `[]`（空の配列） | `[0]`（要素がある配列） |
| `null` | `-1` |

### 型の自動変換（type juggling）

演算子に合わせて、PHP が自動で型を変換する。

| 式 | 結果 | 説明 |
|---|---|---|
| `"10" + 5` | `int(15)` | `+` は数値に変換する |
| `"10" . 5` | `string(3) "105"` | `.` は文字列に変換する |
| `"1.5" + 1` | `float(2.5)` | |
| `"5 apples" + 1` | `int(6)` | Warning が出るが、5 として計算される |
| `"abc" * 2` | TypeError | 数字で始まらない文字列は計算できない |

### `==` と `===`

- `==` は型を変換してから比較する。
- `===` は型も含めて比較する。**基本は `===` を使う。**

| 式 | 結果 | 説明 |
|---|---|---|
| `1 == "1"` | `true` | |
| `1 === "1"` | `false` | 型が違う |
| `0 == ""` | `false` | PHP 8 から。PHP 7 までは `true` |
| `0 == "abc"` | `false` | PHP 8 から。PHP 7 までは `true` |
| `null == false` | `true` | |
| `[] == false` | `true` | |
| `"1e1" == "10"` | `true` | どちらも数値に見えるので、数値として比較される |

### 数値と文字列を `==` で比較するときのルール

文字列が数値として読めるかどうかで、変換の向きが変わる。

| 文字列の種類 | 比較の方法 |
|---|---|
| 数値として読める（`"0"`、`"0.0"`、`" 42"` など） | 文字列を**数値に**変換して比較する |
| 数値として読めない（`""`、`"abc"`、`"42abc"` など） | 数値を**文字列に**変換して比較する |

`""` は数値として読めないので、`0` のほうが文字列の `"0"` に変換される。

```
0 == ""
→ "0" == ""    （0 を文字列に変換）
→ false        （"0" と "" は別の文字列）
```

| 式 | 結果 | 比較の方法 |
|---|---|---|
| `0 == ""` | `false` | 文字列として比較（`"0"` と `""`） |
| `0 == "abc"` | `false` | 文字列として比較（`"0"` と `"abc"`） |
| `42 == "42abc"` | `false` | 文字列として比較（`"42"` と `"42abc"`） |
| `0 == "0"` | `true` | 数値として比較（`0` と `0`） |
| `0 == "0.0"` | `true` | 数値として比較（`0` と `0.0`） |
| `42 == " 42"` | `true` | 数値として比較（前後の空白は無視される） |

PHP 7 までは文字列を常に数値に変換していたため、`"abc"` も `0` になり、`0 == "abc"` が `true` になっていた。
「数字で始まらない文字列は、どれも 0 と等しくなる」という動きはバグの原因になりやすかったので、PHP 8 で修正された。

`(int) ""` が `0` になるのは今でも同じ。`==` の比較では、この変換が行われないだけ。

```
(int) ""         → 0
0 == (int) ""    → true    （自分でキャストすれば、数値どうしの比較になる）
0 == ""          → false
```

## 4. 定数（`04_constants.php`）

名前に `$` を付けず、一度定義すると変更できない。関数の中からも `global` なしで使える。

| | `const` | `define()` |
|---|---|---|
| 値を決めるタイミング | コンパイル時 | 実行時 |
| 関数の結果を使えるか | 使えない | 使える |
| `if` の中で定義できるか | できない | できる |
| クラスの中で定義できるか | できる | できない |

普段は `const` を使い、実行時に値が決まるものだけ `define()` を使う。

```php
const TAX_RATE = 0.1;
const TAX_INCLUDED_RATE = 1 + TAX_RATE;           // 定数式は使える
// const NAME_LENGTH = strlen(APP_NAME);          // コンパイルエラー

define("NAME_LENGTH", strlen(APP_NAME));          // define なら使える
```

| 操作 | 結果 |
|---|---|
| 同じ名前で再定義する | Warning が出て、値は変わらない（PHP 9 でエラーになる予定） |
| 未定義の定数を使う | Error で停止する（`try` / `catch` で受けられる） |
| 定義済みか調べる | `defined("APP_NAME")` |

### 用意されている定数

| 種類 | 例 | 値 |
|---|---|---|
| 定義済み定数 | `PHP_VERSION`、`PHP_OS_FAMILY`、`PHP_INT_MAX` | 環境によって決まる |
| マジック定数 | `__FILE__`、`__DIR__`、`__LINE__` | 書かれた場所によって変わる |

## 5. `??`、`??=`、`?->`（`05_null_operators.php`）

### `??`（Null Coalescing Operator）

左側が**未定義または `null`** のときだけ、右側の値を使う。Warning は出ない。

```php
$config["db"]["port"] ?? 3306;          // キーがなければ 3306
$config["cache"]["host"] ?? "なし";     // 途中のキーがなくてもよい
```

### `??` と `?:` の違い

`?:` は falsy な値すべてで右側を使う。**`0` や `""` を正しい値として扱いたいときは `??` を使う。**

| 式 | `??` の結果 | `?:` の結果 |
|---|---|---|
| `0` を左側に置く | `0` | `"右側"` |
| `""` を左側に置く | `""` | `"右側"` |

### `??=`

未定義または `null` のときだけ代入する。

```
$settings = ["lang" => "ja", "theme" => null];
$settings["lang"]  ??= "en";     → "ja" のまま
$settings["theme"] ??= "dark";   → "dark"
$settings["size"]  ??= 12;       → 12（キーが追加される）
```

### `?->`（Null Safe Operator）

左側が `null` なら、そこで打ち切って `null` を返す。

> **注意：** roadmap.sh には「致命的なエラーの代わりに」「PHP はそれ以降の実行を止める」とあるが、正確ではない。
> - `null` のプロパティを `->` で読むと、Error ではなく Warning になる（値は `null`）。Error になるのはメソッド呼び出しのとき。
> - 打ち切られるのは**その式の残りの部分だけ**で、スクリプトは次の行へ進む。

| 式（`$nobody` は `null`） | 結果 |
|---|---|
| `$nobody->cityName()` | Error |
| `$nobody?->cityName()` | `NULL` |
| `$nobody->address` | Warning が出て `NULL` |
| `$nobody?->address` | `NULL` |
| `$nobody?->cityName(loud())` | `NULL`（引数の `loud()` も呼ばれない） |

**`?->` は未定義の変数を許してくれない。** 未定義の変数も扱いたいときは `??` と組み合わせる。

| 式（`$notDefinedUser` は未定義） | 結果 |
|---|---|
| `$notDefinedUser?->address` | Warning が出て `NULL` |
| `$notDefinedUser?->address ?? "デフォルト"` | `"デフォルト"` |

## 練習問題

`exercise.php` を自分で作って、次のことを試す。予想を問う問題は、実行する前に予想をコメントに書く。

1. 次のコードを実行すると何が起きるか予想して確かめる。そのあと、`show()` が `外` と表示するように、**`global` を使わずに**直す
   ```php
   $message = "外";

   function show(): void
   {
       echo $message;
   }

   show();
   ```
2. 呼ぶたびに `1`、`2`、`3` と増える値を返す関数 `nextId()` を、`static` を使って作る
3. 次の結果を予想してから `var_dump` で確かめる
   - `(int) "3.9kg"`
   - `(bool) "0"`
   - `(bool) "0.0"`
   - `(string) false`
   - `"2" + "3"`
   - `"2" . "3"`
4. 次の結果を予想してから `var_dump` で確かめる
   - `0 == ""`
   - `"1" == "01"`
   - `null == false`
   - `null === false`
5. 定数 `TAX_RATE`（値は `0.1`）を `const` で定義し、税額を返す関数 `taxOf(int $price)` を作る（`global` は使わない）。`taxOf(1000)` の結果の**型**も予想して確かめる
6. `$user = ["name" => "Taro", "nickname" => null, "age" => 0];` について、次の結果を予想してから確かめる
   - `$user["nickname"] ?? "未設定"`
   - `$user["age"] ?? 20`
   - `$user["age"] ?: 20`
   - `$user["email"] ?? "未登録"`
