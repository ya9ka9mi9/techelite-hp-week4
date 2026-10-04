<?php
require_once __DIR__ . '/includes/data.php';

// 見本として1本目の記事を表示（WordPress 化で記事ごとに切り替わる）
$article = $blog_posts[0];

$page_title       = $article['title'] . '｜ブログ｜楽園雅苑';
$page_description = '楽園雅苑のブログ「宿からの便り」の記事です。';
include 'includes/header.php';

// 下層ページ共通の見出し：パンくずは3段（TOP ＞ ブログ ＞ 記事タイトル）
$page_heading     = 'ブログ';
$page_heading_tag = 'p';   // 記事タイトルを h1 にするため、ここは p
$breadcrumbs      = [
  ['label' => 'ブログ', 'url' => '/blog.php'],
  ['label' => $article['title']],
];
include __DIR__ . '/includes/parts/page-head.php';

// 関連記事：今の記事以外から3件
$related = array_slice(array_filter($blog_posts, fn($p) => $p !== $article), 0, 3);
?>

<div class="section section--white">
  <div class="container">
    <article class="article">
      <header class="article__header">
        <div class="article__meta">
          <time class="post-card__date" datetime="<?= h($article['date']) ?>"><?= h(str_replace('-', '.', $article['date'])) ?></time>
          <span class="post-card__tag"><?= h($article['category']) ?></span>
        </div>
        <h1 class="article__title"><?= h($article['title']) ?></h1>
      </header>

      <img class="article__img" src="<?= h($article['image']) ?>" alt="<?= h($article['alt']) ?>" width="1200" height="800">

      <div class="article__body">
        <p>朝晩の空気がひんやりと澄んできた頃、楽園雅苑の庭も少しずつ秋の色をまとい始めました。今年は夏の暑さが長く続いたぶん、色づきはゆっくり。そのぶん、赤・橙・黄色が混ざり合う、深みのある紅葉になっています。</p>

        <h2>床もみじの座敷から眺める庭</h2>
        <p>おすすめは、磨き上げられた座敷の床に紅葉が映り込む「床もみじ」。夕暮れから灯りがともると、窓の外と床の上に二つの庭が現れたような、幻想的な景色に包まれます。</p>
        <p>お部屋から庭へは、どなたでも自由にご覧いただけます。湯上がりの散策にもぜひお立ち寄りください。</p>

        <h2>見頃とおすすめの時間帯</h2>
        <p>例年の見頃は11月中旬から下旬。日中は光を透かした葉の色が、夜はライトアップで浮かび上がる姿がお楽しみいただけます。混み合いにくいのは、朝食前の早い時間です。</p>

        <h2>紅葉の季節限定プラン</h2>
        <p>この季節だけの会席「紅葉膳」付きのプランもご用意しています。詳しくはお気軽にお問い合わせください。</p>
      </div>

      <div class="article__back">
        <a href="/blog.php" class="btn btn--outline">ブログ一覧へ戻る</a>
      </div>
    </article>
  </div>
</div>

<!-- 関連記事（TOP・一覧と同じ部品） -->
<section class="section">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">関連記事</span>
      <span class="section-title__en">Related</span>
    </h2>
    <div class="card-list card-list--posts">
      <?php foreach ($related as $post): ?>
        <?php include __DIR__ . '/includes/parts/post-card.php'; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
