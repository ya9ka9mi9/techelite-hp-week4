<?php
// サイトで使う仮データ（TOP・ブログ一覧・お知らせ一覧で共通利用）
// ※ Week 7 以降は WordPress の投稿データに置き換わる

// サービス紹介
$services = [
  [
    'title' => '宿泊プラン',
    'text'  => '庭を望む和室で、季節の移ろいを感じながらゆったりとお過ごしいただけます。',
    'image' => '/images/service-plan.jpg',
    'alt'   => '大きな窓から庭が見える和室',
  ],
  [
    'title' => '温泉・館内施設',
    'text'  => '四季折々の景色を眺める露天風呂。湯けむりの中で、心も体もほどけていきます。',
    'image' => '/images/service-onsen.jpg',
    'alt'   => '雪景色の露天風呂',
  ],
  [
    'title' => 'お食事',
    'text'  => '地元の旬の素材を活かした会席料理を、器や盛り付けとともにお楽しみください。',
    'image' => '/images/service-meal.jpg',
    'alt'   => '季節の会席料理',
  ],
];

// ブログ「宿からの便り」
$blog_posts = [
  [
    'title'    => '紅葉が見頃を迎えました。床もみじの座敷から',
    'date'     => '2026-10-20',
    'category' => '観光地',
    'image'    => '/images/blog-01.jpg',
    'alt'      => '紅葉が床に映り込む座敷',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => '温泉に入るサルの話。冬の湯けむり豆知識',
    'date'     => '2026-10-12',
    'category' => '豆知識',
    'image'    => '/images/blog-02.jpg',
    'alt'      => '温泉につかるニホンザル',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => '料理長が語る、秋の会席に込めた想い',
    'date'     => '2026-10-05',
    'category' => '料理',
    'image'    => '/images/blog-03.jpg',
    'alt'      => '料理を盛り付ける料理長の手元',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => '雪見の露天風呂、冬だけの特別な景色',
    'date'     => '2026-09-28',
    'category' => '観光地',
    'image'    => '/images/service-onsen.jpg',
    'alt'      => '雪景色の露天風呂',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => '和室のしつらえ。床の間に込められた意味',
    'date'     => '2026-09-18',
    'category' => '豆知識',
    'image'    => '/images/service-plan.jpg',
    'alt'      => '庭が見える和室',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => '旬の会席「紅葉膳」ができるまで',
    'date'     => '2026-09-10',
    'category' => '料理',
    'image'    => '/images/service-meal.jpg',
    'alt'      => '季節の会席料理',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => '夜の中庭、ライトアップのご案内',
    'date'     => '2026-08-30',
    'category' => '観光地',
    'image'    => '/images/hero.jpg',
    'alt'      => 'ライトアップされた中庭と池',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => 'こたつのある客室で過ごす、冬の夜',
    'date'     => '2026-08-21',
    'category' => '豆知識',
    'image'    => '/images/room-02.jpg',
    'alt'      => 'こたつのある和室',
    'url'      => '/blog-detail.php',
  ],
  [
    'title'    => '湯上がりラウンジのおすすめドリンク',
    'date'     => '2026-08-12',
    'category' => '料理',
    'image'    => '/images/facility-lounge.jpg',
    'alt'      => '木のぬくもりを感じるラウンジ',
    'url'      => '/blog-detail.php',
  ],
];

// ブログのカテゴリ（絞り込みボタン用）
$blog_categories = ['観光地', '豆知識', '料理'];

// お知らせ
$news_items = [
  ['date' => '2026-10-15', 'title' => '年末年始のご予約受付を開始しました', 'url' => '/news-detail.php'],
  ['date' => '2026-10-01', 'title' => '秋の会席「紅葉膳」の提供を始めました', 'url' => '/news-detail.php'],
  ['date' => '2026-09-20', 'title' => '露天風呂のメンテナンスに伴う休止のお知らせ', 'url' => '/news-detail.php'],
  ['date' => '2026-09-05', 'title' => '秋の連休の空室状況について', 'url' => '/news-detail.php'],
  ['date' => '2026-08-25', 'title' => '中庭のライトアップを再開しました', 'url' => '/news-detail.php'],
  ['date' => '2026-08-01', 'title' => '夏季休館日のお知らせ（8月18日・19日）', 'url' => '/news-detail.php'],
  ['date' => '2026-07-15', 'title' => '公式サイトからのご予約特典のご案内', 'url' => '/news-detail.php'],
  ['date' => '2026-07-01', 'title' => '公式サイトをリニューアルしました', 'url' => '/news-detail.php'],
];
