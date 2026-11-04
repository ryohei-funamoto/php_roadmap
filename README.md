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
├── 02_basic_php_syntax/    Basic PHP Syntax
├── 03_variables_and_types/ 変数、データ型、キャスト、定数、null の演算子
└── 04_control_structures/  if、switch、match、ループ
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
- [x] **変数と型**：Variables and Scope、Data Types、Casting Data Types、Constants、Null Coalescing Operator、Null Safe Operator
- [x] **制御構文**：if/else、switch、match、Loops
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

## バックエンドプロジェクト

[roadmap.sh/backend/projects](https://roadmap.sh/backend/projects) のプロジェクトを、ロードマップの途中で取り組む。

着手の目安は、各プロジェクトの要件をもとに判断したもの。「その分野を終えていれば、要件の大半を自力で書ける」時点を基準にしている。

| この分野を終えたら | プロジェクト | 難易度 | この分野が必要な理由 | ロードマップの外で補うこと | 状態 |
|---|---|---|---|---|---|
| **関数** | [Number Guessing Game](https://roadmap.sh/projects/number-guessing-game) | 初級 | 乱数、ループ、関数への分割 | 標準入力 | 未着手 |
| **ファイル** | [Task Tracker](https://roadmap.sh/projects/task-tracker) | 初級 | JSON ファイルの読み書き | コマンドライン引数（`$argv`） | 未着手 |
| | [Expense Tracker](https://roadmap.sh/projects/expense-tracker) | 初級 | JSON / CSV、集計 | 同上、日付の処理 | 未着手 |
| **Web と HTTP** | [Unit Converter](https://roadmap.sh/projects/unit-converter) | 初級 | フォームの処理 | なし | 未着手 |
| | [GitHub User Activity](https://roadmap.sh/projects/github-user-activity) | 初級 | cURL で API を呼ぶ | なし | 未着手 |
| | [GitHub Trending CLI](https://roadmap.sh/projects/github-trending-cli) | 初級 | cURL、引数の処理 | なし | 未着手 |
| **設定** | [TMDB CLI Tool](https://roadmap.sh/projects/tmdb-cli) | 初級 | API キーを環境変数で管理 | なし | 未着手 |
| **セキュリティ** | [Personal Blog](https://roadmap.sh/projects/personal-blog) | 初級 | セッションでのログイン、XSS / CSRF 対策 | なし | 未着手 |
| **データベース** | [Blogging Platform API](https://roadmap.sh/projects/blogging-platform-api) | 初級 | CRUD、入力の検証、SQL | REST API の設計、ルーティング | 未着手 |
| | [Todo List API](https://roadmap.sh/projects/todo-list-api) | 初級 | ログイン、パスワードのハッシュ化 | ページネーション | 未着手 |
| | [URL Shortening Service](https://roadmap.sh/projects/url-shortening-service) | 中級 | CRUD、一意なコードの生成 | インデックス、リダイレクト | 未着手 |
| **エコシステム** | [Expense Tracker API](https://roadmap.sh/projects/expense-tracker-api) | 初級 | Composer で JWT ライブラリを導入 | JWT | 未着手 |
| | [Weather API](https://roadmap.sh/projects/weather-api-wrapper-service) | 初級 | Composer で Redis クライアントを導入 | Redis、レート制限 | 未着手 |
| | [Markdown Note-taking App](https://roadmap.sh/projects/markdown-note-taking-app) | 中級 | Markdown ライブラリ、ファイルアップロード | なし | 未着手 |
| **フレームワーク** | [E-Commerce API](https://roadmap.sh/projects/ecommerce-api) | 中級 | 規模が大きく、フレームワークがほぼ必須 | Stripe | 未着手 |
| | [Real-time Leaderboard](https://roadmap.sh/projects/realtime-leaderboard-system) | 上級 | ログインとランキングの API | Redis の Sorted Set | 未着手 |
| **テスト** | [Workout Tracker](https://roadmap.sh/projects/fitness-workout-tracker) | 中級 | 単体テストが必須 | OpenAPI、シーダー | 未着手 |
| | [Movie Reservation System](https://roadmap.sh/projects/movie-reservation-system) | 上級 | 予約の二重登録を防ぐ処理をテストで確かめる | 同時実行の制御 | 未着手 |
| **パフォーマンス** | [Image Processing Service](https://roadmap.sh/projects/image-processing-service) | 中級 | 変換済み画像のキャッシュ | GD / Imagick、S3、キュー | 未着手 |
| **応用** | [Caching Proxy](https://roadmap.sh/projects/caching-server) | 中級 | プロセスの起動、キャッシュ | リバースプロキシの仕組み | 未着手 |
| | [Broadcast Server](https://roadmap.sh/projects/broadcast-server) | 中級 | 動き続けるプロセスの管理 | WebSocket | 未着手 |
| | [Database Backup Utility](https://roadmap.sh/projects/database-backup-utility) | 上級 | `mysqldump` などの外部コマンド実行 | 増分バックアップ、クラウド保存 | 未着手 |
| **全分野** | [Scalable E-Commerce Platform](https://roadmap.sh/projects/scalable-ecommerce-platform) | 上級 | これまでの内容をすべて使う | マイクロサービス、Kubernetes など | 未着手 |

進めるときのポイント：

- 同じ分野に複数あるときは、上から順に進める。特にデータベースの後は、認証のない Blogging Platform API から始めると、API の作り方に集中できる。
- 全部やらなくてもよい。似た内容のものは1つに絞れる（例：GitHub Trending CLI と TMDB CLI Tool）。
- 難易度の表示と実際の難しさは一致しない（例：Weather API は初級だが、Redis やレート制限が必要）。
- 要件は変わることがあるので、着手するときに各プロジェクトのページを確認する。

> **注意：** 2026年11月の確認では、backend のページから確認できたのは初級の12件だけだった。
> 中級7件と上級4件は [全プロジェクトの一覧](https://roadmap.sh/projects) から選んだものなので、backend のページの表示と異なる可能性がある。

## 参考

- [roadmap.sh/php](https://roadmap.sh/php)
- [PHP マニュアル（日本語）](https://www.php.net/manual/ja/)
- [サポート中の PHP バージョン](https://www.php.net/supported-versions.php)
