# PHP Roadmap 学習リポジトリ

[roadmap.sh/php](https://roadmap.sh/php) の内容に沿って PHP を学ぶためのリポジトリ。

## 学習環境

| 項目 | バージョン |
|---|---|
| OS | Ubuntu 26.04 LTS（Windows の WSL 上） |
| PHP | 8.5（CLI） |

インストール手順は [01_introduction/README.md](01_introduction/README.md) を参照。

サンプルの実行方法：

```bash
php 01_introduction/hello.php
```

## フォルダ構成

分野ごとにフォルダを分けている。

```
php_roadmap/
├── README.md               このファイル
├── 01_introduction/        Introduction to PHP、Installing PHP
└── 02_basic_php_syntax/    Basic PHP Syntax
```

各フォルダの中身：

| ファイル | 内容 |
|---|---|
| `01_*.php`、`02_*.php` … | 番号付きのサンプル（そのまま実行できる） |
| `README.md` | 解説、実際の出力例、roadmap.sh の誤りの訂正、練習問題 |
| `exercise.php` | 練習問題の解答 |
| `review.md` | 練習問題を踏まえた理解度の振り返り |

## 進め方

1. `main` から `feature/<分野名>` ブランチを作る
2. 分野のフォルダに、サンプルと `README.md` を作る
3. 練習問題を解いて、レビューを受ける
4. 理解度を `review.md` にまとめる
5. コミットして `main` に取り込む

コミットメッセージは日本語で書く。

## 進み具合

roadmap.sh/php の分野の一覧。トピックの分け方と順番は、roadmap.sh のページをもとに整理したもの。

- [x] **導入**：What is PHP?、Evolution and History、PHP Versions and Features
- [x] **環境構築**：Installing PHP
- [x] **基本文法**：Basic PHP Syntax（`echo` / `print` / `print_r` / `var_dump`）
- [ ] **変数と型**：Variables and Scope、Data Types、Casting Data Types、Constants、Null Coalescing Operator、Null Safe Operator
- [ ] **制御構文**：if/else、switch、match、Loops
- [ ] **配列**：Indexed / Associative / Multi-dimensional Arrays
- [ ] **関数**：Function Declaration、Parameters / Return Values、Default / Optional Params、Named Arguments、Anonymous Functions、Arrow Functions、Callback Functions、Variadic Functions、Recursion
- [ ] **ファイル**：include / include_once / require / require_once、Reading / Writing Files、File Permissions、CSV / JSON / XML Processing
- [ ] **Web と HTTP**：HTTP Methods、`$_GET` / `$_POST` / `$_REQUEST` / `$_SERVER`、Form Processing、File Uploads、cURL、Guzzle
- [ ] **状態管理**：Sessions、Cookies
- [ ] **設定**：Configuration Files、Environment Variables
- [ ] **セキュリティ**：Input Validation、Sanitization Techniques、SQL Injection、CSRF Protection、XSS Prevention、Password Hashing、Auth Mechanisms
- [ ] **データベース**：PDO、MySQLi、Database Transactions、Connection Pooling、ORM、Database Migrations
- [ ] **オブジェクト指向**：Classes and Objects、Constructor / Destructor、Properties and Methods、Access Specifiers、Static Methods and Properties、Inheritance、Polymorphism、Abstract Classes、Interfaces、Traits、Namespaces、Magic Methods、Type Declarations、Dependency Injection、Autoloading
- [ ] **エコシステム**：Composer、Packagist、PHP-FIG、PSR Standards
- [ ] **フレームワーク**：Laravel、Symfony、Yii
- [ ] **Web サーバー**：Apache、Nginx、PHP-FPM
- [ ] **テスト**：PHPUnit、Pest
- [ ] **品質ツール**：PHPStan、Psalm、Phan、PHP CodeSniffer、PHP CS Fixer
- [ ] **パフォーマンス**：Opcode Caching、Caching Strategies、Memory Management、Profiling Techniques、Configuration Tuning
- [ ] **デバッグ**：Xdebug、Zend Debugger
- [ ] **応用**：Process Control、Executing System Commands

## 参考

- [roadmap.sh/php](https://roadmap.sh/php)
- [PHP マニュアル（日本語）](https://www.php.net/manual/ja/)
- [サポート中の PHP バージョン](https://www.php.net/supported-versions.php)
