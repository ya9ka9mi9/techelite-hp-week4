<?php
require_once __DIR__ . '/functions.php';

// グローバルナビの定義（ここ1箇所を直せば全ページ反映）
$global_nav = [
  'index.php'   => 'TOP',
  'about.php'   => '運営会社',
  'service.php' => 'サービス',
  'blog.php'    => 'ブログ',
  'news.php'    => 'お知らせ',
  'contact.php' => 'お問い合わせ',
];
$current = current_page();
// 詳細ページを開いているときは、親の一覧ページのナビをハイライトする
$nav_parent  = [
  'blog-detail.php' => 'blog.php',
  'news-detail.php' => 'news.php',
  'confirm.php'     => 'contact.php',
  'thanks.php'      => 'contact.php',
];
$current_nav = $nav_parent[$current] ?? $current;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= h($page_title ?? '楽園雅苑｜静けさに、身をゆだねる。') ?></title>
  <meta name="description" content="<?= h($page_description ?? '日本庭園を望む静謐な宿。温泉と旬の味覚でもてなす和風の宿泊施設、楽園雅苑。') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="site-header__inner">
    <a href="/index.php" class="site-header__logo">
      <span class="site-header__logo-ja">楽園雅苑</span>
      <span class="site-header__logo-en">RAKUEN GAEN</span>
    </a>

    <button class="site-header__toggle" aria-label="メニューを開く" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <nav class="global-nav" aria-label="グローバルナビ">
      <ul class="global-nav__list">
        <?php foreach ($global_nav as $file => $label): ?>
          <li class="global-nav__item">
            <a href="/<?= h($file) ?>"
               class="global-nav__link<?= $file === $current_nav ? ' is-current' : '' ?>"
               <?= $file === $current ? 'aria-current="page"' : '' ?>>
              <?= h($label) ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</header>
<main>