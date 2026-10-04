<?php
// 下層ページ共通の見出し（パンくず + ページタイトル）
// 使い方：$page_heading（タイトル）と $breadcrumbs（パンくずの配列）を用意してから include する
//   $breadcrumbs = [
//     ['label' => 'ブログ', 'url' => '/blog.php'],   // 途中の階層はリンク付き
//     ['label' => '記事タイトル'],                    // 最後（今いるページ）は url なし
//   ];
$last_index = count($breadcrumbs) - 1;
// 記事詳細ページでは記事タイトルを h1 にするため、ここは p で出す（$page_heading_tag = 'p'）
$heading_tag = ($page_heading_tag ?? 'h1') === 'p' ? 'p' : 'h1';
?>
<div class="page-head">
  <div class="container">
    <nav class="breadcrumb" aria-label="パンくずリスト">
      <ol class="breadcrumb__list">
        <li class="breadcrumb__item"><a href="/index.php">TOP</a></li>
        <?php foreach ($breadcrumbs as $i => $crumb): ?>
          <?php if ($i === $last_index): ?>
            <li class="breadcrumb__item" aria-current="page"><?= h($crumb['label']) ?></li>
          <?php else: ?>
            <li class="breadcrumb__item"><a href="<?= h($crumb['url']) ?>"><?= h($crumb['label']) ?></a></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ol>
    </nav>
    <<?= $heading_tag ?> class="page-head__title"><?= h($page_heading) ?></<?= $heading_tag ?>>
  </div>
</div>
