<?php
require_once __DIR__ . '/functions.php';

// グローバルナビの定義（ここ1箇所を直せば全ページ反映）
// TOP 内のセクションへはページ内リンク、ページがあるものは file を指定（現在地ハイライト用）
$global_nav = [
  ['label' => 'お部屋',             'href' => '/index.php#rooms'],
  ['label' => 'プラン',             'href' => '/index.php#plan'],
  ['label' => '四季',               'href' => '/index.php#season'],
  ['label' => 'アクセス',           'href' => '/index.php#access'],
  ['label' => '楽園雅苑のサービス', 'href' => '/service.php', 'file' => 'service.php'],
];

$current = current_page();
// 詳細・確認ページを開いているときは、親ページを現在地として扱う
$nav_parent  = [
  'blog-detail.php' => 'blog.php',
  'news-detail.php' => 'news.php',
  'confirm.php'     => 'contact.php',
  'thanks.php'      => 'contact.php',
];
$current_nav = $nav_parent[$current] ?? $current;
$is_top      = $current === 'index.php';

$page_title       = $page_title ?? '楽園雅苑｜大自然と調和する、極上の癒し。';
$page_description = $page_description ?? '大分の自然環境と共に、身も心も癒やされる至福のひとときを。日本庭園と温泉の宿、楽園雅苑。';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= h($page_title) ?></title>
  <meta name="description" content="<?= h($page_description) ?>">

  <!-- favicon / OGP（Figma の Favicon・OGP フレームを書き出し） -->
  <link rel="icon" href="/images/favicon-32.png" sizes="32x32">
  <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
  <meta property="og:type" content="<?= $is_top ? 'website' : 'article' ?>">
  <meta property="og:title" content="<?= h($page_title) ?>">
  <meta property="og:description" content="<?= h($page_description) ?>">
  <meta property="og:image" content="/images/ogp.jpg">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Noto+Serif+JP:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="site-header<?= $is_top ? ' site-header--top' : '' ?>">
  <div class="site-header__inner">
    <a href="/index.php" class="site-header__logo">
      <img src="/images/logo-white.png" alt="楽園雅苑 RAKUENGAEN" width="150" height="59">
    </a>

    <nav class="global-nav" aria-label="グローバルナビ">
      <div class="global-nav__panel">
        <ul class="global-nav__list">
          <?php foreach ($global_nav as $item): ?>
            <?php $is_current = isset($item['file']) && $item['file'] === $current_nav; ?>
            <li class="global-nav__item">
              <a href="<?= h($item['href']) ?>"
                 class="global-nav__link<?= $is_current ? ' is-current' : '' ?>"
                 <?= $is_current && $item['file'] === $current ? 'aria-current="page"' : '' ?>>
                <?= h($item['label']) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </nav>

    <a href="/contact.php" class="site-header__reserve">予約</a>

    <button class="site-header__toggle" aria-label="menu メニューを開く" aria-expanded="false">
      <span class="site-header__toggle-lines"><span></span><span></span><span></span></span>
      <span class="site-header__toggle-text">menu</span>
    </button>
  </div>
</header>
<main>
