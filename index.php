<?php
$page_title       = '楽園雅苑｜静けさに、身をゆだねる。';
$page_description = '日本庭園を望む静謐な宿。温泉と旬の味覚でもてなす和風の宿泊施設、楽園雅苑。';
include 'includes/header.php';
require_once __DIR__ . '/includes/data.php';
?>

<!-- ① ヒーロー -->
<section class="hero">
  <img class="hero__bg" src="/images/hero.jpg" alt="" width="1920" height="1330" fetchpriority="high">
  <div class="hero__inner">
    <h1 class="hero__title">静けさに、<br>身をゆだねる。</h1>
    <p class="hero__lead">日本庭園を望む、ひとときの隠れ家。<br>温泉と旬の味覚で、心ほどける時間を。</p>
    <a href="/contact.php" class="btn btn--accent">ご予約・お問い合わせ</a>
  </div>
</section>

<!-- ② サービス紹介 -->
<section class="section" id="service">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">おもてなし</span>
      <span class="section-title__en">Service</span>
    </h2>
    <ul class="card-list">
      <?php foreach ($services as $service): ?>
        <li class="service-card">
          <img class="service-card__img" src="<?= h($service['image']) ?>" alt="<?= h($service['alt']) ?>" loading="lazy" width="1200" height="800">
          <div class="service-card__body">
            <h3 class="service-card__title"><?= h($service['title']) ?></h3>
            <p class="service-card__text"><?= h($service['text']) ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
    <div class="section__more">
      <a href="/service.php" class="btn btn--outline">サービスの詳細を見る</a>
    </div>
  </div>
</section>

<!-- ③ 新着ブログ -->
<section class="section section--white" id="blog">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">宿からの便り</span>
      <span class="section-title__en">Blog</span>
    </h2>
    <div class="card-list">
      <?php foreach (array_slice($blog_posts, 0, 3) as $post): ?>  <!-- 新着3件だけ -->
        <?php include __DIR__ . '/includes/parts/post-card.php'; ?>
      <?php endforeach; ?>
    </div>
    <div class="section__more">
      <a href="/blog.php" class="btn btn--outline">ブログ一覧はこちら</a>
    </div>
  </div>
</section>

<!-- ④ お知らせ -->
<section class="section" id="news">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">お知らせ</span>
      <span class="section-title__en">News</span>
    </h2>
    <ul class="news-list">
      <?php foreach (array_slice($news_items, 0, 3) as $news): ?>  <!-- 最新3件だけ -->
        <?php include __DIR__ . '/includes/parts/news-item.php'; ?>
      <?php endforeach; ?>
    </ul>
    <div class="section__more">
      <a href="/news.php" class="btn btn--outline">お知らせ一覧はこちら</a>
    </div>
  </div>
</section>

<!-- ⑤ CTA バナーは footer.php から自動で表示 -->

<?php include 'includes/footer.php'; ?>
