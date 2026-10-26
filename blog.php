<?php
$page_title       = 'ブログ｜楽園雅苑';
$page_description = '楽園雅苑のブログ。周辺の観光地や温泉の豆知識、料理のお話をお届けします。';
include 'includes/header.php';
require_once __DIR__ . '/includes/data.php';

$page_heading   = 'ブログ';
$page_head_line = false;
$breadcrumbs    = [['label' => 'ブログ一覧']];   // Figma のパンくずは「ブログ一覧」
include __DIR__ . '/includes/parts/page-head.php';

// カテゴリ絞り込み：URL の ?cat=〇〇 を受け取る（例：blog.php?cat=料理）
$current_cat = isset($_GET['cat']) && is_string($_GET['cat']) ? $_GET['cat'] : '';
if (!in_array($current_cat, $blog_categories, true)) {
  $current_cat = '';   // 一覧にないカテゴリは「ALL」扱い（不正な値への対策）
}
$posts = $current_cat === ''
  ? $blog_posts
  : array_filter($blog_posts, fn($p) => $p['category'] === $current_cat);

// 絞り込みボタン（ALL + カテゴリ）
$filters = ['' => 'ALL'];
foreach ($blog_categories as $cat) $filters[$cat] = $cat;
?>

<div class="blog-list">
  <!-- カテゴリ絞り込み：選択中は金の塗り、ほかは金の枠線 -->
  <nav class="filter" aria-label="カテゴリで絞り込む">
    <ul class="filter__list">
      <?php foreach ($filters as $value => $label): ?>
        <?php $is_current = $value === $current_cat; ?>
        <li>
          <a href="/blog.php<?= $value === '' ? '' : '?cat=' . urlencode($value) ?>"
             class="filter__btn<?= $is_current ? ' is-current' : '' ?>"<?= $is_current ? ' aria-current="page"' : '' ?>><?= h($label) ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <!-- 記事カード（TOP と同じ部品） -->
  <h2 class="visually-hidden">記事一覧</h2>
  <div class="card-list card-list--blog">
    <?php foreach ($posts as $post): ?>
      <?php include __DIR__ . '/includes/parts/post-card.php'; ?>
    <?php endforeach; ?>
  </div>

  <!-- ページネーション（枠のみ。本格的な分割は WordPress 化で） -->
  <?php include __DIR__ . '/includes/parts/pagination.php'; ?>
</div>

<?php include 'includes/footer.php'; ?>
