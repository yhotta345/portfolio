<?php
require_once __DIR__ . '/../includes/data.php';
$pageTitle       = 'プライバシーポリシー | Yoshihiro Hotta';
$pageDescription = '個人情報の取扱いに関するプライバシーポリシーです。';
$basePath        = '/..';
require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero -->
<div class="page-hero">
  <div class="container max-w-container">
    <h1 class="page-hero-title">プライバシーポリシー</h1>
  </div>
</div>

<!-- Privacy Policy Section -->
<section class="section-py">
  <div class="container max-w-container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <div class="card-panel p-4 p-sm-5 privacy-body">

          <p class="privacy-updated">最終更新日：<?= date('Y年n月j日') ?></p>

          <p>堀田善寛（以下「当方」）は、本ウェブサイト（以下「本サイト」）において取得する個人情報の取扱いについて、以下のとおりプライバシーポリシーを定めます。</p>

          <h2>1. 収集する個人情報</h2>
          <p>本サイトのお問い合わせフォームを通じて、以下の情報をご提供いただく場合があります。</p>
          <ul>
            <li>お名前</li>
            <li>メールアドレス</li>
            <li>お問い合わせ内容</li>
          </ul>

          <h2>2. 個人情報の利用目的</h2>
          <p>収集した個人情報は、以下の目的にのみ使用します。</p>
          <ul>
            <li>お問い合わせへの回答・対応</li>
            <li>当方からのご連絡</li>
          </ul>
          <p>上記の目的以外に個人情報を使用することはありません。</p>

          <h2>3. 個人情報の第三者提供</h2>
          <p>当方は、以下の場合を除き、取得した個人情報を第三者に提供することはありません。</p>
          <ul>
            <li>ご本人の同意がある場合</li>
            <li>法令に基づく場合</li>
          </ul>

          <h2>4. 個人情報の管理</h2>
          <p>取得した個人情報は、不正アクセス・紛失・破壊・改ざん・漏洩などが起きないよう、適切な安全管理措置を講じます。お問い合わせへの対応が完了した後は、不要となった情報を速やかに削除します。</p>

          <h2>5. Cookie およびアクセス解析</h2>
          <p>本サイトでは、利便性向上およびアクセス状況の把握を目的として Cookie を使用する場合があります。Cookie はブラウザの設定により無効にすることが可能ですが、一部の機能が正常に動作しなくなる場合があります。</p>
          <p>また、本サイトではアクセス解析ツールを使用する場合があります。収集されるデータは統計的な情報であり、個人を特定するものではありません。</p>

          <h2>6. Cloudflare Turnstile</h2>
          <p>お問い合わせフォームでは、スパム防止のため Cloudflare Turnstile を使用しています。Turnstile の利用にあたっては、<a href="https://www.cloudflare.com/privacypolicy/" target="_blank" rel="noopener noreferrer">Cloudflare のプライバシーポリシー</a>が適用されます。</p>

          <h2>7. 免責事項</h2>
          <p>本サイトに掲載している情報は、可能な限り正確な情報を提供するよう努めておりますが、その内容の正確性・完全性を保証するものではありません。本サイトの情報を利用されたことにより生じたいかなる損害についても、当方は責任を負いかねます。</p>

          <h2>8. プライバシーポリシーの変更</h2>
          <p>本ポリシーは、必要に応じて予告なく変更することがあります。変更後のポリシーは、本ページへの掲載をもって効力を生じるものとします。</p>

          <h2>9. お問い合わせ</h2>
          <p>本ポリシーに関するお問い合わせは、<a href="/contact/" class="contact-intro-link">お問い合わせフォーム</a>よりご連絡ください。</p>

        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
