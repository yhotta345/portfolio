<?php
$navItems = [
  ['href' => '/',        'label' => 'ホーム'],
  ['href' => '/profile/',  'label' => 'プロフィール'],
  ['href' => '/skills/', 'label' => 'スキル'],
  ['href' => '/works/',    'label' => '制作物'],
  ['href' => '/projects/', 'label' => 'プロジェクト経験'],
];
$currentPath = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') . '/';
if ($currentPath === '//') $currentPath = '/';
?>
<header class="sticky-top px-2 px-sm-3">
  <nav class="navbar navbar-expand-md" aria-label="メインナビゲーション">
    <div class="container header-inner">

      <!-- ロゴ -->
      <a class="navbar-brand header-logo" href="/">
        <?= htmlspecialchars($profile['nameEn']) ?>
      </a>

      <!-- ハンバーガーボタン -->
      <button
        class="navbar-toggler header-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#mainNav"
        aria-controls="mainNav"
        aria-expanded="false"
        aria-label="ナビゲーションを開く">
        <span class="header-toggler-lines" aria-hidden="true">
          <span class="header-toggler-line"></span>
          <span class="header-toggler-line"></span>
          <span class="header-toggler-line"></span>
        </span>
      </button>

      <!-- ナビリンク + CTA -->
      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto align-items-md-center gap-md-1 mb-2 mb-md-0">
          <?php foreach ($navItems as $item): ?>
            <?php $isActive = ($currentPath === $item['href']); ?>
            <li class="nav-item">
              <a
                class="nav-link header-nav-link<?= $isActive ? ' active' : '' ?>"
                href="<?= $item['href'] ?>"
                <?= $isActive ? 'aria-current="page"' : '' ?>>
                <?= $item['label'] ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <div class="ms-md-4 mt-2 mt-md-0">
          <a href="/contact/" class="btn btn-primary-custom btn-sm px-4">お問い合わせ</a>
        </div>
      </div>

    </div>
  </nav>
</header>
