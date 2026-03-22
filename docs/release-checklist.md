# リリースチェックリスト

## ローカル準備

- [ok] `apps/web/includes/data.php` — 本番用コンテンツに更新済み
- [ ] `composer install --no-dev --optimize-autoloader` 実行済み（vendor/ が存在する）
- [ ] `apps/web/.htaccess` に HTTPS リダイレクトが含まれている
- [ ] git push 済み

## エックスサーバー設定

- [ ] サーバーパネル → SSH設定 → ON
- [ ] SSH 公開鍵を登録済み
- [ ] ドメイン設定 → ドキュメントルートを `~/portfolio/apps/web/` に変更済み
- [ ] Xserver の無料 SSL を有効化済み

## サーバー上の作業

- [ ] SSH でログイン確認（`ssh [サーバーID]@[サーバーID].xsrv.jp -p 10022`）
- [ ] GitHub Deploy Key を登録済み（プライベートリポジトリの場合）
- [ ] `git clone git@github.com:yhotta345/portfolio.git ~/portfolio` 完了
- [ ] `cd ~/portfolio/apps/web && composer install --no-dev --optimize-autoloader` 実行済み
- [ ] `~/portfolio/apps/web/includes/config.php` を本番値で作成済み
  - [ ] `MAIL_TO` / `MAIL_FROM`
  - [ ] `SMTP_USER` / `SMTP_PASS`（Gmail アプリパスワード）
  - [ ] `TURNSTILE_SITE_KEY` / `TURNSTILE_SECRET_KEY`（本番ドメインで発行）

## DNS 設定

- [ ] ドメイン管理サービスのネームサーバーを Xserver に変更済み
  - ns1.xserver.jp 〜 ns5.xserver.jp
- [ ] DNS 反映確認（最大 24〜72 時間）

## 動作確認

### 基本表示

- [ ] `https://[ドメイン]/` — トップページ
- [ ] `https://[ドメイン]/about/`
- [ ] `https://[ドメイン]/skills/`
- [ ] `https://[ドメイン]/works/`
- [ ] `https://[ドメイン]/contact/`

### SSL / セキュリティ

- [ ] HTTP → HTTPS 自動リダイレクト
- [ ] SSL 証明書が有効
- [ ] `https://[ドメイン]/includes/config.php` へのアクセスが 403 になる

### お問い合わせフォーム

- [ ] Cloudflare Turnstile ウィジェットが表示される
- [ ] 送信後にメールが届く
- [ ] CSRF 不正トークンでの送信がエラーになる

## 更新デプロイ手順（以降）

```bash
ssh [サーバーID]@[サーバーID].xsrv.jp -p 10022
cd ~/portfolio
git pull origin main
```
