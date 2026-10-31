# Introduction to PHP

roadmap.sh/php の「Introduction to PHP」（What is PHP? / Evolution and History / PHP Versions and Features）と「Installing PHP」の学習メモ。

| ファイル | 内容 |
|---|---|
| `hello.php` | 最初の PHP スクリプト（インストールの動作確認） |

実行方法：

```bash
php hello.php
```

## 1. PHP とは（What is PHP?）

- **サーバー側で動くスクリプト言語**で、主に Web 開発に使われる。
- サーバーで実行された結果（主に HTML）だけがブラウザに送られる。ブラウザに PHP のコードは届かない。
- HTML の中に直接埋め込んで書ける（`02_basic_php_syntax/04_embed_in_html.php` を参照）。
- 名前は「**PHP: Hypertext Preprocessor**」の略。名前の中に自分自身（PHP）が含まれる再帰的な略語になっている。
- WordPress や、初期の Facebook など、多くの Web サービスで使われてきた。

```
ブラウザ ──リクエスト──▶ Web サーバー ──▶ PHP が実行される
ブラウザ ◀──HTML だけ── Web サーバー ◀── 実行結果（HTML）
```

## 2. 歴史（Evolution and History）

| 年 | 出来事 |
|---|---|
| 1994 | Rasmus Lerdorf が、自分の Web サイト用のツールとして作る。当時の名前は「Personal Home Page」 |
| 1995 | 「PHP/FI」として公開される |
| 1998 | PHP 3。パーサーが書き直され、名前が「PHP: Hypertext Preprocessor」に変わる |
| 2000 | PHP 4。Zend Engine が導入され、高速になる |
| 2004 | PHP 5。本格的なオブジェクト指向に対応（5.3 で名前空間と無名関数） |
| — | PHP 6 は Unicode 対応の計画が頓挫し、欠番になった |
| 2015 | PHP 7。速度が大幅に向上し、型宣言が強化される |
| 2020 | PHP 8。JIT コンパイラ、名前付き引数、`match` 式などが入る |

## 3. バージョンと機能（PHP Versions and Features）

> **注意：** roadmap.sh には「最新版は PHP 8.0」「PHP 7.4 や 8.0 のようなサポート中のバージョンを使う」とあるが、情報が古い。
> 7.4 と 8.0 はすでにサポートが終了している。

### サポート中のバージョン（2026年10月時点、php.net より）

| バージョン | リリース | セキュリティ修正の終了 | 状態 |
|---|---|---|---|
| 8.2 | 2022年12月 | 2026年12月 | セキュリティ修正のみ |
| 8.3 | 2023年11月 | 2027年12月 | セキュリティ修正のみ |
| 8.4 | 2024年11月 | 2028年12月 | 通常サポート中 |
| **8.5** | 2025年11月 | 2029年12月 | 通常サポート中（**この学習で使う版**） |

最新の状況は https://www.php.net/supported-versions.php で確認できる。

### 主なバージョンで追加された機能

ロードマップで学ぶトピックとの対応も書いておく。

| バージョン | 主な機能 | 学ぶ分野 |
|---|---|---|
| 7.0 | スカラー型宣言、戻り値の型、`??` 演算子 | Type Declarations、Null Coalescing Operator |
| 7.4 | アロー関数、型付きプロパティ | Arrow Functions |
| 8.0 | JIT、名前付き引数、`match` 式、`?->` 演算子、コンストラクタでのプロパティ宣言 | Named Arguments、match、Null Safe Operator |
| 8.1 | 列挙型（enum）、読み取り専用プロパティ（readonly） | OOP |
| 8.2 | 読み取り専用クラス | OOP |
| 8.3 | 型付きクラス定数、`json_validate()` | JSON Processing |
| 8.4 | プロパティフック、非対称な可視性 | OOP、Access Specifiers |
| 8.5 | パイプ演算子 `\|>`、`array_first()` / `array_last()` | Functions、Arrays |

実行中の PHP のバージョンは、`PHP_VERSION` 定数か `phpversion()` 関数で確認できる。

## 4. PHP のインストール（Installing PHP）

PHP の入れ方は主に3通りある。

| 方法 | 例 |
|---|---|
| OS のパッケージ管理ツール | Ubuntu の APT、macOS の Homebrew |
| 全部入りのパッケージ | XAMPP、WAMP、MAMP（Web サーバーやデータベースも一緒に入る） |
| 公式サイトから入手 | https://www.php.net/downloads.php |

### この学習環境で行ったこと

- 環境：Windows の WSL 上の Ubuntu
- Ubuntu 22.04 の標準パッケージは PHP 8.1（サポート終了済み）だったため、Ubuntu を 26.04 LTS に上げた。
  26.04 の標準パッケージは PHP 8.5。
- 学習で使う拡張も一緒に入れた。

```bash
sudo apt update && sudo apt install -y php-cli php-mbstring php-xml php-curl php-sqlite3 php-mysql php-zip php-intl
```

| 拡張 | 使う分野 |
|---|---|
| mbstring | 日本語などのマルチバイト文字列の処理 |
| xml | XML Processing、PHPUnit |
| curl | cURL、Guzzle |
| sqlite3 / mysql | PDO と MySQLi（データベースの分野） |
| zip | Composer でのパッケージ展開 |
| intl | 国際化（日付や数値の書式） |

Xdebug（デバッグ）と Composer は、それぞれの分野に入ったときに追加する。

### 動作確認

```bash
php -v          # バージョンの確認
php -m          # 有効な拡張の一覧
php --ini       # 設定ファイル（php.ini）の場所
```

```
PHP 8.5.4 (cli) (built: Oct 19 2026 14:35:18) (NTS)
```

## 5. 最初のスクリプト（`hello.php`）

```php
<?php

echo "Hello, PHP!\n";
echo "PHP version: " . PHP_VERSION . "\n";
```

実行結果：

```
Hello, PHP!
PHP version: 8.5.4
```

- **`<?php`**：ここから PHP のコードが始まるという目印。PHP だけのファイルでは、終わりの `?>` は書かないのが一般的（ファイル末尾に余計な空白が出力されるのを防ぐため）。
- **`echo`**：文字列を出力する。
- **`.`**：文字列をつなげる演算子。他の言語の `+` にあたる。
- **`PHP_VERSION`**：PHP にもともと用意されている定数で、実行中の PHP のバージョンが入っている。
- **`"\n"`**：改行。ダブルクォートで囲んだときだけ改行として扱われる。
