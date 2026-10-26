<?php
$page_title       = '楽園雅苑｜大自然と調和する、極上の癒し。';
$page_description = '大分の自然環境と共に、身も心も癒やされる至福のひとときを提供します。日本庭園と温泉の宿、楽園雅苑。';
include 'includes/header.php';
require_once __DIR__ . '/includes/data.php';
?>

<!-- ① ヒーロー -->
<section class="hero" aria-label="メインビジュアル">
  <img class="hero__bg" src="/images/hero.jpg" alt="" width="1440" height="900" fetchpriority="high">
  <div class="hero__body">
    <h1 class="hero__catch">大自然と調和する、<br class="u-sp">極上の癒し。</h1>
    <p class="hero__lead">大分の自然環境と共に、<br>身も心も癒やされる<br class="u-sp">至福のひとときを提供します。</p>
  </div>
  <p class="hero__scroll" aria-hidden="true">SCROOLL</p>
</section>

<!-- ② 導入 -->
<section class="intro" aria-label="ごあいさつ">
  <div class="intro__inner">
    <div class="intro__body">
      <img class="intro__logo" src="/images/logo-gold.png" alt="楽園雅苑 RAKUENGAEN" width="260" height="102" loading="lazy">
      <p class="intro__text">自然美に囲まれた楽園で、<br>贅沢な癒しのひとときを<br>お過ごしください。</p>
    </div>
    <img class="intro__img-main" src="/images/intro-main.jpg" alt="紅葉を望む座敷" width="610" height="460" loading="lazy">
    <img class="intro__img-sub" src="/images/intro-sub.jpg" alt="季節の料理" width="250" height="250" loading="lazy">
  </div>
</section>

<!-- ③ お部屋 -->
<section class="rooms" id="rooms">
  <div class="container">
    <img class="rooms__pattern" src="/images/pattern-seigaiha.png" alt="" width="241" height="128" loading="lazy">
    <?php $section_ja = 'お部屋'; $section_en = 'room'; include __DIR__ . '/includes/parts/section-head.php'; ?>
    <p class="section-lead">「楽園雅苑」の豪華なお部屋は、大分県自然の美しさと格式の高いサービスが調和した完璧な空間を提供します。桜花の調べが響くプレミアスィート、静寂の庭園に囲まれたデラックスルーム、そして自然のぬくもりを感じるスタンダードルーム。どの部屋も極上の癒しとくつろぎがお待ちしております。贅沢な温泉体験と非日常のくつろぎをお楽しみください。</p>

    <!-- タブ：押すと下のお部屋が切り替わる（js/main.js） -->
    <div class="room-tabs" role="tablist" aria-label="お部屋の種類">
      <?php foreach ($rooms as $i => $room): ?>
        <button class="room-tabs__tab" type="button" role="tab" id="tab-<?= h($room['id']) ?>"
                aria-controls="panel-<?= h($room['id']) ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>">
          <?= h($room['tab'][0]) ?><br><?= h($room['tab'][1]) ?>
        </button>
      <?php endforeach; ?>
    </div>

    <?php foreach ($rooms as $i => $room): ?>
      <div class="room-panel" role="tabpanel" id="panel-<?= h($room['id']) ?>" aria-labelledby="tab-<?= h($room['id']) ?>" <?= $i === 0 ? '' : 'hidden' ?>>
        <img class="room-panel__img" src="<?= h($room['image']) ?>" alt="<?= h($room['alt']) ?>" width="1200" height="650" loading="lazy">
        <div class="room-panel__body">
          <h3 class="room-panel__title"><?= h($room['title']) ?></h3>
          <p class="room-panel__text"><?= h($room['text']) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ④ プラン -->
<section class="plan" id="plan">
  <div class="container">
    <img class="plan__pattern" src="/images/pattern-ichimatsu.png" alt="" width="235" height="78" loading="lazy">
    <?php $section_ja = 'プラン'; $section_en = 'plan'; include __DIR__ . '/includes/parts/section-head.php'; ?>
    <ul class="plan__list">
      <?php foreach ($plans as $plan): ?>
        <li class="plan-card">
          <h3 class="plan-card__title"><?= h($plan['name'][0]) ?><br><?= h($plan['name'][1]) ?></h3>
          <ul class="plan-card__info">
            <li>一泊の値段 : <?= h($plan['price']) ?></li>
            <li>チェックイン時間 : <?= h($plan['in']) ?></li>
            <li>チェックアウト時間 : <?= h($plan['out']) ?></li>
          </ul>
          <a href="/contact.php?plan=<?= h($plan['id']) ?>" class="btn btn--pill plan-card__btn">予約<span class="visually-hidden">（<?= h($plan['name'][0]) ?>）</span></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ⑤ 四季 -->
<section class="seasons" id="season">
  <div class="container">
    <?php $section_ja = '四季'; $section_en = 'seasons'; include __DIR__ . '/includes/parts/section-head.php'; ?>
    <p class="section-lead">「楽園雅苑」は、大分県自然の美しさが四季折々に変化する場所です。春には桜花が舞い、夏には新緑が輝き、秋には紅葉が魅了し、冬には雪景色が広がります。四季折々の風景や風味を楽しむためのアクティビティや特別なイベントが用意されています。どの季節に訪れても、自然の美しさに囲まれた楽園で贅沢なひとときを過ごしませんか？</p>
  </div>
  <div class="seasons__gallery">
    <img class="seasons__img-main" src="/images/season-main.jpg" alt="紅葉に彩られた湖" width="1020" height="536" loading="lazy">
    <img class="seasons__cloud seasons__cloud--1" src="/images/cloud-1.png" alt="" width="211" height="93" loading="lazy">
    <img class="seasons__img-fall" src="/images/season-waterfall.jpg" alt="新緑に囲まれた滝" width="230" height="300" loading="lazy">
    <img class="seasons__img-sub" src="/images/season-sub.jpg" alt="雪景色の露天風呂" width="586" height="338" loading="lazy">
    <img class="seasons__cloud seasons__cloud--2" src="/images/cloud-2.png" alt="" width="155" height="55" loading="lazy">
  </div>
  <!-- 四季の写真スライダー：左右の矢印で1枚ずつ動く（最後まで行くと最初に戻る） -->
  <?php
  $season_photos = [
    ['src' => '/images/season-strip-1.jpg', 'alt' => '桜の咲く渓谷'],
    ['src' => '/images/season-strip-2.jpg', 'alt' => '崖沿いの山道と新緑'],
    ['src' => '/images/season-strip-3.jpg', 'alt' => '霧氷に覆われた山'],
    ['src' => '/images/season-strip-4.jpg', 'alt' => '菜の花畑と一本の木'],
    ['src' => '/images/season-strip-5.jpg', 'alt' => '紅葉と湯けむりの東屋'],
  ];
  ?>
  <div class="season-slider" role="region" aria-roledescription="カルーセル" aria-label="四季の写真">
    <div class="season-slider__viewport">
      <ul class="season-slider__track">
        <?php
        // 前後に同じ5枚の複製を置き、端まで行っても途切れずに回り込めるようにする（複製は読み上げない）
        foreach (['copy', 'real', 'copy'] as $set):
          foreach ($season_photos as $photo): ?>
            <li class="season-slider__item"<?= $set === 'copy' ? ' aria-hidden="true"' : '' ?>>
              <img src="<?= h($photo['src']) ?>" alt="<?= $set === 'copy' ? '' : h($photo['alt']) ?>" width="340" height="244" loading="lazy">
            </li>
          <?php endforeach;
        endforeach; ?>
      </ul>
    </div>
    <button class="season-slider__btn season-slider__btn--prev" type="button" aria-label="前の写真へ"></button>
    <button class="season-slider__btn season-slider__btn--next" type="button" aria-label="次の写真へ"></button>
  </div>
  <div class="section-more">
    <a href="/service.php" class="btn btn--outline">楽園雅苑のサービス</a>
  </div>
</section>

<!-- ⑥ アクセス -->
<section class="top-access" id="access">
  <div class="container">
    <?php $section_ja = 'アクセス'; $section_en = 'access'; include __DIR__ . '/includes/parts/section-head.php'; ?>
  </div>
  <div class="top-access__map">
    <iframe src="https://maps.google.com/maps?q=%E5%A4%A7%E5%88%86%E7%9C%8C%E7%94%B1%E5%B8%83%E5%B8%82%E5%BA%84%E5%86%85%E7%94%BA%E6%B8%95&z=14&output=embed"
            title="楽園雅苑の地図" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="container">
    <div class="top-access__address">
      <img src="/images/logo-gold.png" alt="楽園雅苑 RAKUENGAEN" width="169" height="66" loading="lazy">
      <p>〒879-5425<br class="u-sp"> 大分県由布市　庄内町渕</p>
    </div>
    <p class="top-access__text">当宿からのアクセスは便利で、お車や公共交通機関をご利用いただけます。<br>自家用車をご利用の場合、ご宿泊の方には無料の駐車場がご用意されております。<br>公共交通機関をご利用の場合、最寄り駅からはバス、タクシー、またはレンタサイクルを利用してお越しいただけます。</p>
  </div>
</section>

<!-- ⑦ ブログ -->
<section class="top-blog" id="blog">
  <div class="container">
    <?php $section_ja = 'ブログ'; $section_en = 'blog'; include __DIR__ . '/includes/parts/section-head.php'; ?>
    <div class="card-list">
      <?php foreach (array_slice($blog_posts, 0, 3) as $post): ?>  <!-- 新着3件だけ -->
        <?php include __DIR__ . '/includes/parts/post-card.php'; ?>
      <?php endforeach; ?>
    </div>
    <div class="section-more">
      <a href="/blog.php" class="btn btn--outline">ブログ一覧はこちら</a>
    </div>
  </div>
</section>

<!-- ⑧ お知らせ -->
<section class="top-news" id="news">
  <div class="container">
    <?php $section_ja = 'お知らせ'; $section_en = 'news'; include __DIR__ . '/includes/parts/section-head.php'; ?>
    <ul class="news-list">
      <?php foreach (array_slice($news_items, 0, 3) as $news): ?>  <!-- 最新3件だけ -->
        <?php include __DIR__ . '/includes/parts/news-item.php'; ?>
      <?php endforeach; ?>
    </ul>
    <div class="section-more">
      <a href="/news.php" class="btn btn--outline">お知らせ一覧はこちら</a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
