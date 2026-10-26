<?php
$page_title       = 'お知らせ｜楽園雅苑';
$page_description = '楽園雅苑からの新着情報・休館日などのお知らせです。';
include 'includes/header.php';
require_once __DIR__ . '/includes/data.php';

$page_heading   = 'お知らせ';
$page_head_line = false;
$breadcrumbs    = [['label' => 'お知らせ']];
include __DIR__ . '/includes/parts/page-head.php';
?>

<div class="news-page">
  <!-- お知らせの行（TOP と同じ部品） -->
  <ul class="news-list">
    <?php foreach ($news_items as $news): ?>
      <?php include __DIR__ . '/includes/parts/news-item.php'; ?>
    <?php endforeach; ?>
  </ul>

  <!-- ページネーション（ブログ一覧と同じ部品） -->
  <?php include __DIR__ . '/includes/parts/pagination.php'; ?>
</div>

<?php include 'includes/footer.php'; ?>
