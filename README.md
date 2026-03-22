# Portfolio

PHP 製のポートフォリオサイトです。

## 技術スタック

- PHP（組み込みサーバーまたは Apache）
- Composer（メール送信: PHPMailer）
- Cloudflare Turnstile（スパム対策）

## ディレクトリ構成

```
portfolio/
├── apps/
│   └── web/              # Web アプリ本体
│       ├── includes/
│       │   ├── config.php    # 認証情報（gitignore 対象）
│       │   ├── data.php      # サイトコンテンツ
│       │   ├── head.php      # HTML ヘッダー共通
│       │   ├── header.php    # ナビゲーション共通
│       │   └── footer.php    # フッター共通
│       ├── contact/      # お問い合わせページ
│       ├── profile/      # プロフィールページ
│       ├── skills/       # スキルページ
│       ├── works/        # 実績ページ
│       └── index.php     # トップページ
└── docs/
    └── release-checklist.md  # デプロイ時チェックリスト
```

## ローカル開発環境のセットアップ

### 前提条件

- PHP 8.x 以上
- Composer

### 手順

#### 1. リポジトリをクローン

```bash
git clone git@github.com:<username>/portfolio.git
cd portfolio
```

#### 2. Composer 依存パッケージをインストール

```bash
cd apps/web
composer install
```

#### 3. 設定ファイルを作成

`apps/web/includes/config.php` をコメントを参考に作成してください。
このファイルは `.gitignore` に含まれており、リポジトリには含まれません。

```bash
cp apps/web/includes/config.php.example apps/web/includes/config.php
# .example ファイルがない場合は直接作成してください
```

設定項目：

| 定数名 | 説明 |
|---|---|
| `MAIL_TO` | お問い合わせの受信先メールアドレス |
| `MAIL_FROM` | 送信元メールアドレス |
| `SMTP_USER` | Gmail アドレス |
| `SMTP_PASS` | Gmail アプリパスワード |
| `TURNSTILE_SITE_KEY` | Cloudflare Turnstile サイトキー |
| `TURNSTILE_SECRET_KEY` | Cloudflare Turnstile シークレットキー |

> **メモ:** お問い合わせフォームの送信テストが不要であれば、`MAIL_*` と `SMTP_*` はダミー値でも起動できます。
> Cloudflare Turnstile はローカル用のテストキーが使用できます（[公式ドキュメント参照](https://developers.cloudflare.com/turnstile/troubleshooting/testing/)）。

#### 4. PHP 組み込みサーバーで起動

```bash
cd apps/web
php -S localhost:8080
```

ブラウザで [http://localhost:8080](http://localhost:8080) を開いてください。

### ページ一覧

| URL | 説明 |
|---|---|
| `http://localhost:8080/` | トップページ |
| `http://localhost:8080/profile/` | プロフィール |
| `http://localhost:8080/skills/` | スキル |
| `http://localhost:8080/works/` | 実績 |
| `http://localhost:8080/contact/` | お問い合わせ |

### コンテンツの編集

`apps/web/includes/data.php` を編集することで、サイトに表示されるすべてのコンテンツを変更できます。テキスト中に `<br>` などの HTML タグを使用することもできます。

## デプロイ

本番環境（Xserver）へのデプロイ手順は [docs/release-checklist.md](docs/release-checklist.md) を参照してください。
