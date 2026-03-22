<?php
require_once __DIR__ . '/../includes/data.php';
$pageTitle       = 'Projects | Yoshihiro Hotta';
$pageDescription = '実務プロジェクト経験一覧。担当した開発・改修・運用の概要をまとめています。';
$basePath        = '/..';
require_once __DIR__ . '/../includes/head.php';
require_once __DIR__ . '/../includes/header.php';

$projectCategories = ['Webサイト', 'Webアプリ', 'CMS構築', 'システム開発'];
?>

<!-- Page Hero -->
<div class="page-hero">
  <div class="container max-w-container">
    <h1 class="page-hero-title">プロジェクト経験</h1>
  </div>
</div>

<!-- Filter -->
<div class="container max-w-container works-single-column">
  <div class="works-filter">
    <div class="works-filter-categories">
      <button class="works-filter-btn is-active" data-filter="all">すべて</button>
      <?php foreach ($projectCategories as $cat): ?>
        <button class="works-filter-btn" data-filter="<?= htmlspecialchars($cat) ?>"><?= htmlspecialchars($cat) ?></button>
      <?php endforeach; ?>
    </div>
    <div class="works-filter-search">
      <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="works-search-icon" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
      <input type="search" id="worksSearch" class="works-search-input" placeholder="キーワードで検索...">
    </div>
  </div>
</div>

<!-- Projects Grid -->
<section class="section-py">
  <div class="container max-w-container works-single-column">
    <div class="row gy-4" id="worksGrid">
      <?php if (empty($projects)): ?>
        <div class="col-12 text-center py-5">
          <p class="text-muted-custom">現在準備中です。しばらくお待ちください。</p>
        </div>
      <?php endif; ?>
      <?php foreach ($projects as $i => $project):
        $overview = '';
        foreach ($project['details'] as $d) {
          if ($d['label'] === '概要') { $overview = $d['value']; break; }
        }
        $searchText = $project['title'] . ' ' . $overview;
      ?>
        <div class="col-12 works-grid-item"
             data-category="<?= htmlspecialchars($project['category'] ?? '') ?>"
             data-search="<?= htmlspecialchars(mb_strtolower($searchText)) ?>">
          <div class="works-card h-100" id="project-<?= $i ?>">

            <!-- Header -->
            <?php
              $imgClass = !empty($project['image']) ? ' works-card-header--image' : '';
              $imgStyle = !empty($project['image']) ? ' style="background-image: url(\'' . htmlspecialchars($project['image']) . '\');"' : '';
            ?>
            <div class="works-card-header<?= $imgClass ?>"<?= $imgStyle ?>>
              <div class="works-card-header-inner">
                <p class="works-card-stack-label">
                  <?= htmlspecialchars(implode(' / ', array_slice($project['stack'], 0, 2))) ?>
                </p>
                <h2 class="display-text works-card-title">
                  <?= htmlspecialchars($project['title']) ?>
                </h2>
              </div>
            </div>

            <!-- Card body -->
            <div class="works-card-body">
              <div class="works-prep-fields mt-auto">
                <div class="works-detail-list">
                  <?php foreach ($project['details'] as $detail): ?>
                    <div class="works-detail-item">
                      <p class="works-detail-label"><?= htmlspecialchars($detail['label']) ?></p>
                      <?php if ($detail['label'] === '技術スタック詳細'): ?>
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
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- 検索結果なし -->
    <p class="works-no-results" id="worksNoResults" style="display:none;">
      該当するプロジェクトが見つかりませんでした。
    </p>
  </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
