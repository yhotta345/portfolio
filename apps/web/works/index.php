<?php
require_once __DIR__ . '/../includes/data.php';
$pageTitle       = 'Works | Yoshihiro Hotta';
$pageDescription = '制作物一覧。準備中のプロジェクト情報と掲載予定項目を整理しています。';
$basePath        = '/..';
require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/header.php';

$categories = ['Webサイト', 'Webアプリ', 'CMS構築'];
?>

<!-- Page Hero -->
<div class="page-hero">
  <div class="container max-w-container">
    <h1 class="page-hero-title">制作物一覧</h1>
  </div>
</div>

<!-- Works Filter -->
<div class="container max-w-container works-single-column">
  <div class="works-filter">
    <div class="works-filter-categories">
      <button class="works-filter-btn is-active" data-filter="all">すべて</button>
      <?php foreach ($categories as $cat): ?>
        <button class="works-filter-btn" data-filter="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></button>
      <?php endforeach; ?>
    </div>
    <div class="works-filter-search">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="works-search-icon" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
      <input type="search" id="worksSearch" class="works-search-input" placeholder="キーワードで検索...">
    </div>
  </div>
</div>

<!-- Works Grid -->
<section class="section-py">
  <div class="container max-w-container works-single-column">
    <div class="row gy-4" id="worksGrid">
      <?php foreach ($works as $i => $work):
        $overview = '';
        foreach ($work['details'] as $d) {
          if ($d['label'] === '概要') { $overview = $d['value']; break; }
        }
        $searchText = $work['title'] . ' ' . ($overview ?: $work['summary']);
      ?>
        <div class="col-12 works-grid-item"
             data-category="<?= htmlspecialchars($work['category'] ?? '') ?>"
             data-search="<?= htmlspecialchars(mb_strtolower($searchText)) ?>">
          <div class="works-card h-100" id="work-<?= $i ?>">

            <!-- Dark gradient header -->
            <?php
              $imgClass = !empty($work['image']) ? ' works-card-header--image' : '';
              $imgStyle = !empty($work['image']) ? ' style="background-image: url(\'' . htmlspecialchars($work['image']) . '\');"' : '';
            ?>
            <div class="works-card-header<?= $imgClass ?>"<?= $imgStyle ?>>
              <div class="works-card-header-inner">
                <p class="works-card-stack-label">
                  <?= htmlspecialchars(implode(' / ', array_slice($work['stack'], 0, 2))) ?>
                </p>
                <h2 class="display-text works-card-title">
                  <?= htmlspecialchars($work['title']) ?>
                </h2>
              </div>
            </div>

            <!-- Card body -->
            <div class="works-card-body">
              <?php if (!empty($work['details'])): ?>
                <div class="works-prep-fields mt-auto">
                  <div class="works-detail-list">
                    <?php foreach ($work['details'] as $detail): ?>
                      <div class="works-detail-item">
                        <p class="works-detail-label"><?= htmlspecialchars($detail['label']) ?></p>
                        <?php if (in_array($detail['label'], ['URL', 'GitHub'], true)): ?>
                          <p class="works-detail-value">
                            <a href="<?= htmlspecialchars($detail['value']) ?>" class="works-detail-link" target="_blank" rel="noopener">
                              <?= htmlspecialchars($detail['value']) ?>
                            </a>
                          </p>
                        <?php elseif ($detail['label'] === '技術スタック詳細'): ?>
                          <div class="d-flex flex-wrap gap-2 mt-1">
                            <?php foreach (array_map('trim', explode('/', $detail['value'])) as $tech): ?>
                              <span class="tech-badge"><?= htmlspecialchars($tech) ?></span>
                            <?php endforeach; ?>
                          </div>
                        <?php else: ?>
                          <p class="works-detail-value"><?= safe_html($detail['value']) ?></p>
                        <?php endif; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php else: ?>
                <div class="d-flex gap-4 mt-auto">
                  <?php if ($work['github']): ?>
                    <a href="<?= htmlspecialchars($work['github']) ?>" class="text-blue works-card-link d-inline-flex align-items-center gap-1" target="_blank" rel="noopener">
                      GitHub
                      <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                    </a>
                  <?php endif; ?>
                  <?php if ($work['demo']): ?>
                    <a href="<?= htmlspecialchars($work['demo']) ?>" class="text-blue works-card-link d-inline-flex align-items-center gap-1" target="_blank" rel="noopener">
                      Demo
                      <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                    </a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- 検索結果なし -->
    <p class="works-no-results" id="worksNoResults" style="display:none;">
      該当する制作物が見つかりませんでした。
    </p>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
