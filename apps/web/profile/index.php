<?php
require_once __DIR__ . '/../includes/data.php';
$pageTitle       = 'Profile | Yoshihiro Hotta';
$pageDescription = 'プロフィール、ビジョン、経歴をまとめたページ。';
$basePath        = '/..';
require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/header.php';
?>

<!-- Page Hero -->
<div class="page-hero">
  <div class="container max-w-container">
    <h1 class="page-hero-title">プロフィール</h1>
  </div>
</div>

<section class="section-py">
  <div class="container max-w-container profile-single-column">
    <div class="card-panel profile-section-card">
      <h2 class="profile-section-title">はじめまして</h2>
      <p class="profile-section-body mb-0"><?= safe_html($profileIntro) ?></p>
    </div>

    <div class="card-panel profile-section-card">
      <h2 class="profile-section-title">ビジョン</h2>
      <div class="profile-copy-stack">
        <?php foreach ($profileVision as $paragraph): ?>
          <p class="profile-section-body"><?= safe_html($paragraph) ?></p>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card-panel profile-section-card">
      <div class="profile-split-layout">
        <div>
          <h2 class="profile-section-title">プロフィール詳細</h2>
          <div class="profile-detail-grid profile-detail-grid--no-gap">
            <div class="profile-detail-entry profile-detail-value">
              <?= htmlspecialchars($profile['name']) ?> / <?= htmlspecialchars($profile['birthDate']) ?>
            </div>
            <div class="profile-detail-entry">
              <div class="profile-history-list">
                <?php foreach ($careerHistory as $item): ?>
                  <div class="profile-history-item">
                    <div class="profile-history-year"><?= htmlspecialchars($item['year']) ?></div>
                    <div class="profile-history-body"><?= safe_html($item['body']) ?></div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="profile-photo-column">
          <?php
            $photoPath = $profile['photo'] ?? '';
            $photoExists = !empty($photoPath) && file_exists(__DIR__ . '/..' . $photoPath);
          ?>
          <?php if ($photoExists): ?>
            <img src="<?= htmlspecialchars($photoPath) ?>" alt="<?= htmlspecialchars($profile['name']) ?>" class="profile-photo">
          <?php else: ?>
            <div class="profile-photo-placeholder">
              <span>Photo</span>
            </div>
          <?php endif; ?>
          <div class="profile-social-icons">
            <a href="<?= htmlspecialchars($profile['github']) ?>" class="profile-social-icon" target="_blank" rel="noopener" aria-label="GitHub" data-tooltip="GitHub">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
            </a>
            <a href="<?= htmlspecialchars($profile['blog']) ?>" class="profile-social-icon" target="_blank" rel="noopener" aria-label="Blog" data-tooltip="個人ブログ">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M21.469 6.825c.84 1.537 1.318 3.3 1.318 5.175 0 3.979-2.156 7.456-5.363 9.325l3.295-9.527c.615-1.54.82-2.771.82-3.864 0-.405-.026-.78-.07-1.11m-7.981.105c.647-.03 1.232-.105 1.232-.105.582-.075.514-.93-.067-.899 0 0-1.755.135-2.88.135-1.064 0-2.85-.15-2.85-.15-.585-.03-.661.855-.075.885 0 0 .54.061 1.125.09l1.68 4.605-2.37 7.08L5.354 6.9c.649-.03 1.234-.1 1.234-.1.585-.075.516-.93-.065-.896 0 0-1.746.138-2.874.138-.2 0-.438-.008-.69-.015C4.911 3.15 8.235 1.215 12 1.215c2.809 0 5.365 1.072 7.286 2.826-.046-.003-.091-.009-.141-.009-1.06 0-1.812.923-1.812 1.914 0 .89.513 1.643 1.06 2.531.411.72.89 1.643.89 2.977 0 .915-.354 1.994-.821 3.479l-1.075 3.585-3.9-11.61zM12 22.784c-1.059 0-2.08-.153-3.043-.455l3.233-9.383 3.31 9.069c.217.563.477 1.079.757 1.544A10.826 10.826 0 0 1 12 22.784M1.215 12c0-1.695.38-3.301 1.057-4.74l5.832 15.984A10.819 10.819 0 0 1 1.215 12M12 0C5.385 0 0 5.385 0 12s5.385 12 12 12 12-5.385 12-12S18.615 0 12 0"/></svg>
            </a>
            <a href="<?= htmlspecialchars($profile['wantedly']) ?>" class="profile-social-icon" target="_blank" rel="noopener" aria-label="Wantedly" data-tooltip="Wantedly">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 500 394" aria-hidden="true"><circle fill="#21bddb" cx="375" cy="122.95" r="38.98"/><path fill="currentColor" fill-rule="evenodd" d="M217.17,234.77c-2.34-1.52-9-10.45-27.42-54.44-1.15-2.76-2.22-5.14-3.23-7.18l-3.77-9.08L150.47,86.12H85.89l32.29,77.95,32.29,78,29.82,72a2.68,2.68,0,0,0,4.94,0l32.45-77.68A1.34,1.34,0,0,0,217.17,234.77Z"/><path fill="currentColor" fill-rule="evenodd" d="M338.15,234.77c-2.34-1.52-9-10.45-27.42-54.44-1.15-2.76-2.23-5.14-3.24-7.19l-3.75-9.07L271.45,86.12H206.87l32.29,77.95,32.29,78,29.82,72a2.68,2.68,0,0,0,4.94,0l32.45-77.67A1.36,1.36,0,0,0,338.15,234.77Z"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>