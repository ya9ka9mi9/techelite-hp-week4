<?php
$page_title       = 'ブログ｜楽園雅苑';
$page_description = '楽園雅苑のブログ「宿からの便り」。季節の庭、周辺の観光、料理のお話をお届けします。';
include 'includes/header.php';
require_once __DIR__ . '/includes/data.php';

// 下層ページ共通の見出し
$page_heading = 'ブログ';
$breadcrumbs  = [['label' => 'ブログ']];
include __DIR__ . '/includes/parts/page-head.php';

// カテゴリ絞り込み：URL の ?cat=〇〇 を受け取る（例：blog.php?cat=料理）
$current_cat = $_GET['cat'] ?? '';
if (!in_array($current_cat, $blog_categories, true)) {
  $current_cat = '';   // 一覧にないカテゴリは「すべて」扱い（不正な値への対策）
}
$posts = $current_cat === ''
  ? $blog_posts
  : array_filter($blog_posts, fn($p) => $p['category'] === $current_cat);
?>

<div class="section">
  <div class="container">

    <!-- カテゴリ絞り込み -->
    <nav class="filter" aria-label="カテゴリで絞り込む">
      <ul class="filter__list">
        <li>
          <a href="/blog.php" class="filter__btn<?= $current_cat === '' ? ' is-current' : '' ?>"
             <?= $current_cat === '' ? 'aria-current="page"' : '' ?>>すべて</a>
        </li>
        <?php foreach ($blog_categories as $cat): ?>
          <li>
            <a href="/blog.php?cat=<?= urlencode($cat) ?>" class="filter__btn<?= $current_cat === $cat ? ' is-current' : '' ?>"
               <?= $current_cat === $cat ? 'aria-current="page"' : '' ?>><?= h($cat) ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <!-- 記事カード（TOP と同じ部品） -->
    <h2 class="visually-hidden">記事一覧</h2>
    <div class="card-list card-list--posts">
      <?php foreach ($posts as $post): ?>
        <?php include __DIR__ . '/includes/parts/post-card.php'; ?>
      <?php endforeach; ?>
    </div>

    <!-- ページネーション（枠のみ。本格的な分割は WordPress 化で） -->
    <nav class="pagination" aria-label="ページ送り">
      <ul class="pagination__list">
        <li><span class="pagination__item is-current" aria-current="page">1</span></li>
        <li><a href="#" class="pagination__item">2</a></li>
        <li><a href="#" class="pagination__item">3</a></li>
      </ul>
    </nav>

  </div>
</div>

<?php include 'includes/footer.php'; ?>
