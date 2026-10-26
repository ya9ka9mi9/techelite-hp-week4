<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/data.php';

// 見本として最新のお知らせを表示（WordPress 化で記事ごとに切り替わる）
$news = $news_items[0];

$page_title       = $news['title'] . '｜お知らせ｜楽園雅苑';
$page_description = '楽園雅苑からのお知らせです。';
include 'includes/header.php';
?>

<!-- Figma：詳細ページはページタイトルなしで、パンくずの下にすぐ本文 -->
<div class="page-head page-head--crumb-only">
  <div class="page-head__inner">
    <nav class="breadcrumb" aria-label="パンくずリスト">
      <ol class="breadcrumb__list">
        <li class="breadcrumb__item"><a href="/index.php">トップ</a></li>
        <li class="breadcrumb__item"><a href="/news.php">お知らせ</a></li>
        <li class="breadcrumb__item" aria-current="page"><?= h($news['title']) ?></li>
      </ol>
    </nav>
  </div>
</div>

<article class="news-detail">
  <time class="news-detail__date" datetime="<?= h($news['date']) ?>"><?= h(str_replace('-', '/', $news['date'])) ?></time>
  <h1 class="news-detail__title"><?= h($news['title']) ?></h1>
  <div class="news-detail__body">
    <p>いつも楽園雅苑をご利用いただき、誠にありがとうございます。<br>
    年末年始（12月28日〜1月4日）のご宿泊について、ご予約の受付を開始いたしました。期間中は、お正月限定の会席料理と、元旦の朝にお屠蘇（おとそ）をご用意しております。例年、早い時期に満室となりますので、お早めのご予約をおすすめいたします。なお、年末年始期間は通常期と料金・キャンセル規定が異なりますので、ご予約時にご確認ください。</p>
  </div>
  <div class="news-detail__back">
    <a href="/news.php" class="btn btn--outline btn--back">一覧に戻る</a>
  </div>
</article>

<?php include 'includes/footer.php'; ?>
