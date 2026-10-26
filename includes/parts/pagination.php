<?php
// ページネーション（Figma：今いるページは墨の四角に白文字、ほかは薄いグレーの数字）
// ※ 今は見た目の枠だけ。本当にページを分ける処理は WordPress 化（Week 7）で作る
$page_total = $page_total ?? 5;
?>
<nav class="pagination" aria-label="ページ送り">
  <ul class="pagination__list">
    <?php for ($i = 1; $i <= $page_total; $i++): ?>
      <li>
        <?php if ($i === 1): ?>
          <span class="pagination__item is-current" aria-current="page"><?= $i ?></span>
        <?php else: ?>
          <a href="#" class="pagination__item" aria-label="<?= $i ?>ページ目"><?= $i ?></a>
        <?php endif; ?>
      </li>
    <?php endfor; ?>
  </ul>
</nav>
