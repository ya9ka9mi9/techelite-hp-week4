</main>
<?php
// フッターのナビ：ヘッダーのナビ + ブログ・お知らせ
$footer_nav = array_merge($global_nav, [
  ['label' => 'ブログ',   'href' => '/blog.php'],
  ['label' => 'お知らせ', 'href' => '/news.php'],
]);
$footer_sub = [
  ['label' => '運営会社情報',         'href' => '/about.php'],
  ['label' => 'プライバシーポリシー', 'href' => '/privacy.php'],
  ['label' => '利用規約',             'href' => '/terms.php'],
];
?>
<footer class="site-footer">
  <div class="site-footer__inner">
    <a href="/index.php" class="site-footer__logo">
      <img src="/images/logo-gold.png" alt="楽園雅苑 RAKUENGAEN" width="230" height="90" loading="lazy">
    </a>

    <nav class="site-footer__nav" aria-label="フッターナビ">
      <ul class="site-footer__nav-list">
        <?php foreach ($footer_nav as $item): ?>
          <li><a href="<?= h($item['href']) ?>" class="site-footer__link"><?= h($item['label']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <ul class="site-footer__sub">
      <?php foreach ($footer_sub as $item): ?>
        <li><a href="<?= h($item['href']) ?>" class="site-footer__link"><?= h($item['label']) ?></a></li>
      <?php endforeach; ?>
    </ul>

    <p class="site-footer__copy"><small>&copy; RAKUGAEN.</small></p>
  </div>
</footer>
<script src="/js/main.js"></script>
</body>
</html>
