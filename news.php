<?php
$page_title       = 'お知らせ｜楽園雅苑';
$page_description = '楽園雅苑からの新着情報・休館日などのお知らせです。';
include 'includes/header.php';
require_once __DIR__ . '/includes/data.php';

// 下層ページ共通の見出し
$page_heading = 'お知らせ';
$breadcrumbs  = [['label' => 'お知らせ']];
include __DIR__ . '/includes/parts/page-head.php';
?>

<div class="section">
  <div class="container">

    <!-- お知らせ一覧（TOP と同じ .news-list / .news-item） -->
    <ul class="news-list">
      <?php foreach ($news_items as $news): ?>
        <?php include __DIR__ . '/includes/parts/news-item.php'; ?>
      <?php endforeach; ?>
    </ul>

    <!-- ページネーション（枠のみ） -->
    <nav class="pagination" aria-label="ページ送り">
      <ul class="pagination__list">
        <li><span class="pagination__item is-current" aria-current="page">1</span></li>
        <li><a href="#" class="pagination__item">2</a></li>
      </ul>
    </nav>

  </div>
</div>

<?php include 'includes/footer.php'; ?>
