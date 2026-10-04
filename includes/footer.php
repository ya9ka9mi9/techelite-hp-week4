<?php
// CTA バナー：お問い合わせ・予約確認・サンクスの3ページ以外で表示
$no_cta_pages = ['contact.php', 'confirm.php', 'thanks.php'];
if (!in_array(current_page(), $no_cta_pages, true)) {
  include __DIR__ . '/parts/cta.php';
}
?>
</main>
<footer class="site-footer">
  <div class="site-footer__inner">
    <a href="/index.php" class="site-footer__logo">
      <span class="site-footer__logo-ja">楽園雅苑</span>
      <span class="site-footer__logo-en">RAKUEN GAEN</span>
    </a>

    <!-- メインナビ：ヘッダーと同じ $global_nav を使い回す（TOP はロゴがあるので除く） -->
    <nav class="site-footer__nav" aria-label="フッターナビ">
      <ul class="site-footer__nav-list">
        <?php foreach ($global_nav as $file => $label): ?>
          <?php if ($file === 'index.php') continue; ?>
          <li><a href="/<?= h($file) ?>" class="site-footer__link"><?= h($label) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <!-- サブナビ -->
    <ul class="site-footer__sub">
      <li><a href="/privacy.php" class="site-footer__link">プライバシーポリシー</a></li>
      <li><a href="/terms.php" class="site-footer__link">利用規約</a></li>
    </ul>

    <!-- 宿の情報 -->
    <address class="site-footer__info">
      楽園雅苑<br>
      〒000-0000 ○○県○○市○○ 1-2-3<br>
      TEL: 0120-000-000
    </address>

    <p class="site-footer__copy"><small>&copy; RAKUEN GAEN.</small></p>
  </div>
</footer>
<script src="/js/main.js"></script>
</body>
</html>
