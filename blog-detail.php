<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

// 見本として1本目の記事を表示（WordPress 化で記事ごとに切り替わる）
$article = $blog_posts[0];

$page_title       = $article['title'] . '｜ブログ｜楽園雅苑';
$page_description = '楽園雅苑のブログ記事です。';
include 'includes/header.php';

// 本文の見出し（目次と本文で共通。id で目次から飛べるようにする）
$sections = [
  [
    'id' => 'sec1', 'title' => '宿から車で20分。湯けむりの里へ',
    'subs' => [
      ['id' => 'sec1-1', 'title' => 'おすすめは朝の時間帯'],
      ['id' => 'sec1-2', 'title' => '歩きやすい靴で出かけましょう'],
    ],
  ],
  [
    'id' => 'sec2', 'title' => '地獄めぐりのモデルコース',
    'subs' => [
      ['id' => 'sec2-1', 'title' => '所要時間と料金'],
    ],
  ],
];

// 人気記事（サイドバー）・こんな記事も読まれています
$popular = array_slice($blog_posts, 0, 10);
$related = array_slice(array_values(array_filter($blog_posts, fn($p) => $p !== $article)), 0, 2);
?>

<!-- Figma：詳細ページはページタイトルなしで、パンくずの下にすぐ記事 -->
<div class="page-head page-head--crumb-only">
  <div class="page-head__inner">
    <nav class="breadcrumb" aria-label="パンくずリスト">
      <ol class="breadcrumb__list">
        <li class="breadcrumb__item"><a href="/index.php">トップ</a></li>
        <li class="breadcrumb__item"><a href="/blog.php">ブログ一覧</a></li>
        <li class="breadcrumb__item" aria-current="page"><?= h($article['title']) ?></li>
      </ol>
    </nav>
  </div>
</div>

<div class="post-layout">

  <!-- 記事本文 -->
  <article class="post">
    <header class="post__header">
      <h1 class="post__title"><?= h($article['title']) ?></h1>
      <div class="post__meta">
        <time datetime="<?= h($article['date']) ?>"><?= h(str_replace('-', '/', $article['date'])) ?></time>
        <span class="post-card__tag"><?= h($article['category']) ?></span>
      </div>
    </header>

    <img class="post__img" src="/images/blog-detail-main.jpg" alt="<?= h($article['alt']) ?>" width="780" height="470">

    <!-- 目次 -->
    <nav class="toc" aria-labelledby="toc-title">
      <p class="toc__title" id="toc-title">目次</p>
      <ol class="toc__list">
        <?php foreach ($sections as $sec): ?>
          <li class="toc__item">
            <a href="#<?= h($sec['id']) ?>"><?= h($sec['title']) ?></a>
            <ul class="toc__sub">
              <?php foreach ($sec['subs'] as $sub): ?>
                <li><a href="#<?= h($sub['id']) ?>"><?= h($sub['title']) ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
        <?php endforeach; ?>
      </ol>
    </nav>

    <div class="post__body">
      <h2 id="sec1"><?= h($sections[0]['title']) ?></h2>
      <p>楽園雅苑から車でおよそ20分。山あいの温泉地には、地面のあちこちから湯けむりが立ちのぼる「地獄」と呼ばれる景色が広がります。乳白色、青、赤と、場所によって色の違う湯が湧き出す様子は、まるで別の世界に迷い込んだよう。<strong>チェックイン前の散策にもおすすめ</strong>のスポットです。</p>

      <h3 id="sec1-1"><?= h($sections[0]['subs'][0]['title']) ?></h3>
      <p>気温の低い朝は、湯けむりがいっそう濃く、幻想的な景色に出会えます。朝食の前に少し早起きして出かけると、人も少なく静かな時間を過ごせます。<mark>冬の晴れた朝は、とくに湯けむりがきれいに見えます。</mark>お帰りの際は、宿の温泉でゆっくりと体を温めてください。</p>

      <h3 id="sec1-2"><?= h($sections[0]['subs'][1]['title']) ?></h3>
      <p>遊歩道には石畳や段差のある場所もあります。歩きやすい靴でお出かけください。フロントでは、周辺の地図と散策マップをお渡ししています。</p>

      <h2 id="sec2"><?= h($sections[1]['title']) ?></h2>
      <p>朝食のあとに出発し、昼食までに宿へ戻る半日のコースです。</p>

      <h3 id="sec2-1"><?= h($sections[1]['subs'][0]['title']) ?></h3>
      <table class="post__table">
        <tbody>
          <tr><th scope="row">所要時間</th><td>約2〜3時間（移動を含む）</td></tr>
          <tr><th scope="row">宿からの距離</th><td>車で約20分</td></tr>
          <tr><th scope="row">入場料</th><td>大人 400円 ／ 小学生 200円（1か所あたり）</td></tr>
          <tr><th scope="row">共通券</th><td>大人 2,200円 ／ 小学生 1,000円</td></tr>
          <tr><th scope="row">駐車場</th><td>各施設に無料駐車場あり</td></tr>
          <tr><th scope="row">送迎</th><td>宿から無料送迎あり（前日までに要予約）</td></tr>
        </tbody>
      </table>
    </div>
  </article>

  <!-- 人気記事 -->
  <aside class="popular" aria-labelledby="popular-title">
    <h2 class="popular__title" id="popular-title">人気記事</h2>
    <ol class="popular__list">
      <?php foreach ($popular as $p): ?>
        <li>
          <a href="<?= h($p['url']) ?>" class="popular__link">
            <img src="<?= h($p['image']) ?>" alt="" width="53" height="34" loading="lazy">
            <span><?= h($p['title']) ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ol>
  </aside>

  <!-- こんな記事も読まれています（TOP・一覧と同じ部品） -->
  <section class="related" aria-labelledby="related-title">
    <h2 class="related__title" id="related-title">こんな記事も読まれています</h2>
    <div class="related__list">
      <?php foreach ($related as $post): ?>
        <?php include __DIR__ . '/includes/parts/post-card.php'; ?>
      <?php endforeach; ?>
    </div>
  </section>

</div>

<?php include 'includes/footer.php'; ?>
