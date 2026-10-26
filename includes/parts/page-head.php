<?php
// 下層ページ共通の見出し（パンくず + ページタイトル + 罫線）
// 使い方：$page_heading（タイトル）と $breadcrumbs（パンくずの配列）を用意してから include する
//   $breadcrumbs = [
//     ['label' => 'ブログ', 'url' => '/blog.php'],   // 途中の階層はリンク付き（url がなければ文字だけ）
//     ['label' => '記事タイトル'],                    // 最後（今いるページ）は url なし
//   ];
// $page_head_line = false にすると、タイトルの下の罫線を出さない（予約フォーム・予約完了）
$last_index  = count($breadcrumbs) - 1;
// 記事詳細ページでは記事タイトルを h1 にするため、ここは p で出す（$page_heading_tag = 'p'）
$heading_tag = ($page_heading_tag ?? 'h1') === 'p' ? 'p' : 'h1';
$head_line   = $page_head_line ?? true;
?>
<div class="page-head<?= $head_line ? '' : ' page-head--no-line' ?>">
  <div class="page-head__inner">
    <nav class="breadcrumb" aria-label="パンくずリスト">
      <ol class="breadcrumb__list">
        <li class="breadcrumb__item"><a href="/index.php">トップ</a></li>
        <?php foreach ($breadcrumbs as $i => $crumb): ?>
          <?php if ($i === $last_index): ?>
            <li class="breadcrumb__item" aria-current="page"><?= h($crumb['label']) ?></li>
          <?php elseif (!empty($crumb['url'])): ?>
            <li class="breadcrumb__item"><a href="<?= h($crumb['url']) ?>"><?= h($crumb['label']) ?></a></li>
          <?php else: ?>
            <li class="breadcrumb__item"><?= h($crumb['label']) ?></li>
          <?php endif; ?>
        <?php endforeach; ?>
      </ol>
    </nav>
    <<?= $heading_tag ?> class="page-head__title"><?= h($page_heading) ?></<?= $heading_tag ?>>
  </div>
</div>
