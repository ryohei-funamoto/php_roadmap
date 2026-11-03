<?php

// ?? : 左側が未定義または null のときだけ、右側の値を使う（Warning も出ない）
echo "--- ?? ---\n";
var_dump($notDefined ?? "デフォルト");
$config = ["db" => ["host" => "db.example.com"]];
var_dump($config["db"]["host"] ?? "localhost");
var_dump($config["db"]["port"] ?? 3306);
var_dump($config["cache"]["host"] ?? "なし");   // 途中のキーがなくてもよい

// ?? と ?: の違い。?: は falsy な値すべてで右側を使う
echo "--- ?? と ?: の違い ---\n";
var_dump(0 ?? "右側");
var_dump(0 ?: "右側");
var_dump("" ?? "右側");
var_dump("" ?: "右側");

// ??= : 未定義または null のときだけ代入する
echo "--- ??= ---\n";
$settings = ["lang" => "ja", "theme" => null];
$settings["lang"] ??= "en";
$settings["theme"] ??= "dark";
$settings["size"] ??= 12;
print_r($settings);

// ?-> : 左側が null なら、そこで打ち切って null を返す
// クラスはオブジェクト指向の分野で詳しく学ぶ
class Address
{
    public string $city = "Tokyo";
}

class User
{
    public ?Address $address = null;

    public function cityName(): ?string
    {
        return $this->address?->city;
    }
}

echo "--- ?-> ---\n";
$user = new User();
var_dump($user->cityName());
$user->address = new Address();
var_dump($user->cityName());

// null に対してメソッドを呼ぶと Error になる。?-> を使えば null が返る
$nobody = null;
try {
    $nobody->cityName();
} catch (Error $e) {
    echo "Error: ", $e->getMessage(), "\n";
}
var_dump($nobody?->cityName());

// null のプロパティを -> で読むと、Error ではなく Warning になる
var_dump($nobody->address);
var_dump($nobody?->address);

// ?-> で打ち切られると、引数も評価されない
function loud(): string
{
    echo "loud() が呼ばれた\n";
    return "x";
}
var_dump($nobody?->cityName(loud()));

// ?? は未定義も null も扱えるが、?-> は変数が未定義だと Warning が出る
var_dump($notDefinedUser?->address);
var_dump($notDefinedUser?->address ?? "デフォルト");
