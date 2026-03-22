<?php
require_once __DIR__ . '/includes/data.php';
$pageTitle = 'Yoshihiro Hotta | Portfolio';
$pageDescription = 'フロントエンドからバックエンド、インフラまで一通り扱えるエンジニアのポートフォリオ。';
$basePath = '';
require_once __DIR__ . '/includes/head.php';
require_once __DIR__ . '/includes/header.php';
?>

<!-- ================================================
     Hero Section
     ================================================ -->
<section class="hero-section">
  <!-- Blur Blob 装飾 -->
  <div class="hero-blob hero-blob-1"></div>
  <div class="hero-blob hero-blob-2"></div>
  <div class="hero-blob hero-blob-3"></div>

  <div class="container max-w-container hero-content text-center">
    <h1 class="display-hero gradient-text">
      <?= $profile['title'] ?>
    </h1>

    <p class="hero-desc">
      <?= safe_html($profile['description']) ?>
    </p>

    <div class="d-flex gap-3 justify-content-center flex-wrap align-items-center">
      <a href="/profile/" class="btn-primary-custom">プロフィール詳細</a>
    </div>
  </div>

  <!-- Scroll indicator -->
  <button class="hero-scroll-indicator" id="js-scroll-indicator" aria-label="次のセクションへスクロール">
    <div class="hero-scroll-line"></div>
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <path d="m6 9 6 6 6-6" />
    </svg>
  </button>
</section>

<!-- ================================================
     Featured Skills Section
     ================================================ -->
<section class="section-py section-bg-tint">
  <div class="container max-w-container">
    <div class="mb-5">
      <h2 class="section-title">得意とする技術領域</h2>
      <p class="section-desc">
        フロントエンドを軸に、バックエンド・インフラまで幅広く対応しています。
      </p>
    </div>

    <div class="row gy-4 gx-0 gx-md-4">
      <?php foreach ($skillCategories as $i => $category): ?>
        <div class="col-lg-4 col-md-6">
          <div class="card-panel skill-card<?= $i === 1 ? ' skill-card--alt' : '' ?>">
            <span class="summary-card-title display-text d-block"><?= htmlspecialchars($category['titleJa']) ?></span>
            <div class="d-flex flex-wrap gap-2">
              <?php foreach ($category['items'] as $item): ?>
                <span class="tech-badge"><?= htmlspecialchars($item) ?></span>
              <?php endforeach; ?>
            </div>
            <p class="profile-section-body"><?= safe_html($category['description']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
      <a href="/skills/" class="btn-secondary-custom">すべてのスキルを見る</a>
    </div>
  </div>
</section>

<!-- ================================================
     Featured Works Section
     ================================================ -->
<section class="section-py">
  <div class="container max-w-container">
    <div class="mb-5">
      <h2 class="section-title">制作物</h2>
      <p class="section-desc">
        個人開発および業務で取り組んだ制作物の一部です。<br>使用技術や実装の工夫、開発のポイントをあわせて紹介しています。
      </p>
    </div>

    <div class="row gy-4 gx-0 gx-md-4">
      <?php foreach (array_slice($works, 0, 3, true) as $i => $work): ?>
        <div class="col-lg-4 col-md-6">
          <a href="/works/#work-<?= $i ?>" class="works-card d-block">
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
                <h3 class="display-text works-card-title">
                  <?= htmlspecialchars($work['title']) ?>
                </h3>
              </div>
            </div>

            <!-- Card body -->
            <div class="works-card-body">
              <p class="works-card-desc">
                <?php
                  $overview = '';
                  foreach ($work['details'] as $d) {
                    if ($d['label'] === '概要') { $overview = $d['value']; break; }
                  }
                  echo safe_html($overview ?: $work['summary']);
                ?>
              </p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
      <a href="/works/" class="btn-secondary-custom">すべての制作物を見る</a>
    </div>
  </div>
</section>

<!-- ================================================
     Featured Projects Section
     ================================================ -->
<section class="section-py section-bg-tint">
  <div class="container max-w-container">
    <div class="mb-5">
      <h2 class="section-title">プロジェクト経験</h2>
      <p class="section-desc">
        実務で携わった開発・改修・運用プロジェクトの一部です。<br>担当役割や使用技術、取り組みの概要をあわせて紹介しています。
      </p>
    </div>

    <div class="row gy-4 gx-0 gx-md-4">
      <?php foreach (array_slice($projects, 0, 3, true) as $i => $project): ?>
        <div class="col-lg-4 col-md-6">
          <a href="/projects/#project-<?= $i ?>" class="works-card d-block">
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
                <h3 class="display-text works-card-title">
                  <?= htmlspecialchars($project['title']) ?>
                </h3>
              </div>
            </div>

            <!-- Card body -->
            <div class="works-card-body">
              <p class="works-card-desc">
                <?php
                  $overview = '';
                  foreach ($project['details'] as $d) {
                    if ($d['label'] === '概要') { $overview = $d['value']; break; }
                  }
                  echo safe_html($overview);
                ?>
              </p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-5">
      <a href="/projects/" class="btn-secondary-custom">すべてのプロジェクト経験を見る</a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>