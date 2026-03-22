<?php
require_once __DIR__ . '/../includes/data.php';
$pageTitle       = 'Skills | Yoshihiro Hotta';
$pageDescription = 'フロントエンド、バックエンド、インフラを中心とした技術スタック一覧。';
$basePath        = '/..';
require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero -->
<div class="page-hero">
  <div class="container max-w-container">
    <h1 class="page-hero-title">スキルと得意領域</h1>
  </div>
</div>

<!-- All Skills -->
<section class="section-py">
  <div class="container max-w-container skills-layout">
    <div class="row gy-4 gx-0 gx-lg-4">
      <div class="col-lg-6">
        <div class="card-panel skill-card h-100">
          <h2 class="profile-section-title">スキル</h2>
          <p class="profile-section-body">スキル名とおおよその実務経験年数です。フロントエンドからインフラまで幅広く対応できます。</p>
          <div class="skill-years-list">
            <?php foreach ($skillYears as $skill): ?>
              <div class="skill-years-item">
                <span class="skill-years-name">
                  <img
                    src="<?= htmlspecialchars($skill['icon']) ?>"
                    alt=""
                    class="skill-years-icon"
                    width="22"
                    height="22"
                    loading="lazy"
                    decoding="async">
                  <span><?= htmlspecialchars($skill['name']) ?></span>
                </span>
                <span class="skill-years-value"><?= htmlspecialchars($skill['years']) ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="skills-stack">
          <?php foreach ($skillHighlights as $i => $section): ?>
            <?php $bgStyle = ($i === 0) ? 'background:linear-gradient(180deg,rgba(255,255,255,.98),rgba(239,246,255,.93))' : ''; ?>
            <div class="card-panel skill-card" <?= $bgStyle ? "style=\"{$bgStyle}\"" : '' ?>>
              <h2 class="profile-section-title"><?= htmlspecialchars($section['titleJa']) ?></h2>
              <p class="profile-section-body"><?= safe_html($section['body']) ?></p>
              <div class="skill-highlight-list">
                <?php foreach ($section['items'] as $item): ?>
                  <div class="skill-highlight-item">
                    <span class="skill-highlight-label"><?= htmlspecialchars($item['label']) ?></span>
                    <span class="skill-highlight-detail"><?= htmlspecialchars($item['details']) ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>