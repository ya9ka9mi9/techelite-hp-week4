<?php
// お知らせ1行分
// 使い方：$news にお知らせの配列を入れてから include する
?>
<li class="news-item">
  <a href="<?= h($news['url']) ?>" class="news-item__link">
    <time class="news-item__date" datetime="<?= h($news['date']) ?>"><?= h(str_replace('-', '/', $news['date'])) ?></time>
    <span class="news-item__title"><?= h($news['title']) ?></span>
    <span class="news-item__arrow" aria-hidden="true"></span>
  </a>
</li>
