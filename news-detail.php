<?php
require_once __DIR__ . '/includes/data.php';

// 見本として最新のお知らせを表示（WordPress 化で記事ごとに切り替わる）
$news = $news_items[0];

$page_title       = $news['title'] . '｜お知らせ｜楽園雅苑';
$page_description = '楽園雅苑からのお知らせです。';
include 'includes/header.php';

// 下層ページ共通の見出し：パンくずは3段（TOP ＞ お知らせ ＞ タイトル）
$page_heading     = 'お知らせ';
$page_heading_tag = 'p';   // お知らせのタイトルを h1 にするため、ここは p
$breadcrumbs      = [
  ['label' => 'お知らせ', 'url' => '/news.php'],
  ['label' => $news['title']],
];
include __DIR__ . '/includes/parts/page-head.php';
?>

<div class="section section--white">
  <div class="container">
    <article class="article">
      <header class="article__header">
        <div class="article__meta">
          <time class="post-card__date" datetime="<?= h($news['date']) ?>"><?= h(str_replace('-', '.', $news['date'])) ?></time>
        </div>
        <h1 class="article__title"><?= h($news['title']) ?></h1>
      </header>

      <div class="article__body">
        <p>いつも楽園雅苑をご利用いただき、誠にありがとうございます。</p>
        <p>年末年始（12月28日〜1月4日）のご宿泊について、ご予約の受付を開始いたしました。期間中は、お正月限定の会席料理と、元旦の朝にお屠蘇（おとそ）をご用意しております。</p>

        <h2>ご予約方法</h2>
        <p>お問い合わせフォーム、またはお電話（0120-000-000）にて承っております。例年、早い時期に満室となりますので、お早めのご予約をおすすめいたします。</p>

        <h2>ご注意</h2>
        <p>年末年始期間は、通常期と料金が異なります。また、キャンセル料の規定も一部変更となりますので、ご予約時にご確認ください。</p>
      </div>

      <div class="article__back">
        <a href="/news.php" class="btn btn--outline">お知らせ一覧へ戻る</a>
      </div>
    </article>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
