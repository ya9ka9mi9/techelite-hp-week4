<?php
// ブログ記事カード（1枚分）
// 使い方：$post に記事の配列を入れてから include する
?>
<article class="post-card">
  <a href="<?= h($post['url']) ?>" class="post-card__link">
    <img class="post-card__img" src="<?= h($post['image']) ?>" alt="<?= h($post['alt']) ?>" loading="lazy" width="1200" height="800">
    <div class="post-card__body">
      <time class="post-card__date" datetime="<?= h($post['date']) ?>"><?= h(str_replace('-', '.', $post['date'])) ?></time>
      <h3 class="post-card__title"><?= h($post['title']) ?></h3>
      <span class="post-card__tag"><?= h($post['category']) ?></span>
    </div>
  </a>
</article>
