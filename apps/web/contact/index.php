<?php
session_start();

require_once __DIR__ . '/../includes/data.php';
require_once __DIR__ . '/../includes/csrf.php';
require_once __DIR__ . '/../includes/turnstile.php';
require_once __DIR__ . '/../includes/mail.php';

$success      = false;
$mailError    = false;
$botError     = false;
$allowedInquiryTypes = ['採用・転職のご連絡', '業務委託・フリーランスのご依頼', '制作・開発のご相談', '技術的なご質問', 'その他'];
$formValues   = ['name' => '', 'email' => '', 'message' => '', 'inquiry_type' => [], 'privacy_agree' => false];
$serverErrors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 1. CSRF 検証
  if (!csrf_verify()) {
    http_response_code(400);
    exit('Invalid request.');
  }

  // 2. Turnstile 検証
  $turnstileToken = $_POST['cf-turnstile-response'] ?? '';
  if (!turnstile_verify($turnstileToken, $_SERVER['REMOTE_ADDR'])) {
    $botError = true;
  }

  $name         = trim($_POST['name']    ?? '');
  $email        = trim($_POST['email']   ?? '');
  $message      = trim($_POST['message'] ?? '');
  $inquiryTypes = array_values(array_filter(
    (array)($_POST['inquiry_type'] ?? []),
    fn($v) => in_array($v, $allowedInquiryTypes, true)
  ));
  $privacyAgree = !empty($_POST['privacy_agree']);

  $formValues = ['name' => $name, 'email' => $email, 'message' => $message, 'inquiry_type' => $inquiryTypes, 'privacy_agree' => $privacyAgree];

  // 3. サーバーサイドバリデーション
  if (!$botError) {
    if (empty($inquiryTypes)) {
      $serverErrors['inquiry_type'] = 'お問い合わせ種別を1つ以上選択してください。';
    }
    if ($name === '') {
      $serverErrors['name'] = 'お名前を入力してください。';
    }
    if ($email === '') {
      $serverErrors['email'] = 'メールアドレスを入力してください。';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $serverErrors['email'] = '有効なメールアドレスを入力してください。';
    }
    if ($message === '') {
      $serverErrors['message'] = 'メッセージを入力してください。';
    } elseif (mb_strlen($message) < 10) {
      $serverErrors['message'] = '10文字以上のメッセージを入力してください。';
    }
    if (!$privacyAgree) {
      $serverErrors['privacy_agree'] = 'プライバシーポリシーへの同意が必要です。';
    }
  }

  // 4. メール送信
  if (!$botError && empty($serverErrors)) {
    if (send_contact_mail($name, $email, $message, $inquiryTypes)) {
      $success    = true;
      $formValues = ['name' => '', 'email' => '', 'message' => '', 'inquiry_type' => []];
    } else {
      $mailError = true;
    }
  }
}

$pageTitle       = 'Contact | Yoshihiro Hotta';
$pageDescription = 'お問い合わせ・ご相談はこちらから。';
$basePath        = '/..';
require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/header.php';

?>

<!-- Cloudflare Turnstile JS（このページのみ読み込み） -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<!-- Page Hero -->
<div class="page-hero">
  <div class="container max-w-container">
    <h1 class="page-hero-title">お問い合わせ</h1>
  </div>
</div>

<!-- Contact intro -->
<div class="container max-w-container">
  <div class="row">
    <div class="col-lg-8 mx-auto contact-intro">
      <p class="contact-intro-lead">Webサイトを通してご興味を持っていただけましたら、お気軽にご連絡ください。<br>制作のご依頼、技術的なご相談、お見積もりなど、どんな内容でもお気軽にどうぞ。</p>
    </div>
  </div>
</div>

<!-- Contact Section -->
<section class="section-py-sm contact-section">
  <div class="container max-w-container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <?php if ($success): ?>
          <div class="card-panel p-5 text-center">
            <div class="contact-success-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M20 6 9 17l-5-5" />
              </svg>
            </div>
            <h3 class="display-text contact-success-title">送信しました</h3>
            <p class="contact-success-body">
              お問い合わせを受け付けました。<br>内容を確認後、ご連絡いたします。
            </p>
            <a href="/contact/" class="btn-secondary-custom btn-sm">もう一度送る</a>
          </div>
        <?php else: ?>
          <div class="card-panel card-panel-lg p-4 p-sm-5">

            <?php if ($botError): ?>
              <div class="alert-error-custom mb-4">
                ボット判定により送信できませんでした。ページを再読み込みしてもう一度お試しください。
              </div>
            <?php endif; ?>

            <?php if ($mailError): ?>
              <div class="alert-error-custom mb-4">
                送信中にエラーが発生しました。しばらく時間をおいてから再度お試しください。
              </div>
            <?php endif; ?>

            <?php if (!empty($serverErrors)): ?>
              <div class="alert-error-custom mb-4">入力内容に誤りがあります。確認してください。</div>
            <?php endif; ?>

            <form id="contactForm" action="/contact/" method="POST" novalidate>

              <!-- CSRF トークン -->
              <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrf_token()) ?>">

              <!-- Inquiry type -->
              <div class="mb-5">
                <label class="form-label-custom mb-3"><span class="required-badge">必須</span> お問い合わせ種別</label>
                <div class="inquiry-type-group">
                  <?php foreach ($allowedInquiryTypes as $type): ?>
                    <?php $checked = in_array($type, $formValues['inquiry_type'], true); ?>
                    <span class="inquiry-type-option">
                      <input
                        type="checkbox"
                        id="inquiry_<?= htmlspecialchars($type) ?>"
                        name="inquiry_type[]"
                        value="<?= htmlspecialchars($type) ?>"
                        <?= $checked ? 'checked' : '' ?>>
                      <label for="inquiry_<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></label>
                    </span>
                  <?php endforeach; ?>
                </div>
                <?php if (isset($serverErrors['inquiry_type'])): ?>
                  <div class="form-error-msg mt-2"><?= htmlspecialchars($serverErrors['inquiry_type']) ?></div>
                <?php endif; ?>
              </div>

              <!-- Name -->
              <div class="mb-5">
                <label for="name" class="form-label-custom"><span class="required-badge">必須</span> お名前</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  value="<?= htmlspecialchars($formValues['name']) ?>"
                  class="form-control contact-form-control<?= isset($serverErrors['name']) ? ' is-invalid' : '' ?>"
                  placeholder="山田 太郎"
                  autocomplete="name"
                  required>
                <?php if (isset($serverErrors['name'])): ?>
                  <div class="form-error-msg"><?= htmlspecialchars($serverErrors['name']) ?></div>
                <?php endif; ?>
              </div>

              <!-- Email -->
              <div class="mb-5">
                <label for="email" class="form-label-custom"><span class="required-badge">必須</span> メールアドレス</label>
                <input
                  type="email"
                  id="email"
                  name="email"
                  value="<?= htmlspecialchars($formValues['email']) ?>"
                  class="form-control contact-form-control<?= isset($serverErrors['email']) ? ' is-invalid' : '' ?>"
                  placeholder="example@email.com"
                  autocomplete="email"
                  required>
                <?php if (isset($serverErrors['email'])): ?>
                  <div class="form-error-msg"><?= htmlspecialchars($serverErrors['email']) ?></div>
                <?php endif; ?>
              </div>

              <!-- Message -->
              <div class="mb-4">
                <label for="message" class="form-label-custom"><span class="required-badge">必須</span> メッセージ</label>
                <textarea
                  id="message"
                  name="message"
                  rows="7"
                  class="form-control contact-form-control<?= isset($serverErrors['message']) ? ' is-invalid' : '' ?>"
                  placeholder="作りたいもの、相談したい内容、想定時期など"
                  required><?= htmlspecialchars($formValues['message']) ?></textarea>
                <?php if (isset($serverErrors['message'])): ?>
                  <div class="form-error-msg"><?= htmlspecialchars($serverErrors['message']) ?></div>
                <?php endif; ?>
              </div>

              <!-- Cloudflare Turnstile ウィジェット -->
              <div class="d-flex justify-content-center mb-4">
                <div class="cf-turnstile" data-sitekey="<?= htmlspecialchars(TURNSTILE_SITE_KEY) ?>"></div>
              </div>

              <!-- Privacy policy agreement -->
              <div class="mb-4">
                <div class="privacy-agree-group">
                  <input
                    type="checkbox"
                    id="privacy_agree"
                    name="privacy_agree"
                    value="1"
                    <?= $formValues['privacy_agree'] ? 'checked' : '' ?>>
                  <label for="privacy_agree" class="privacy-agree-label">
                    <a href="/privacy/" class="contact-intro-link" target="_blank" rel="noopener">プライバシーポリシー</a>に同意する
                  </label>
                </div>
                <?php if (isset($serverErrors['privacy_agree'])): ?>
                  <div class="form-error-msg mt-2"><?= htmlspecialchars($serverErrors['privacy_agree']) ?></div>
                <?php endif; ?>
              </div>

              <button type="submit" class="btn-primary-custom w-100">
                送信する
              </button>

            </form>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>