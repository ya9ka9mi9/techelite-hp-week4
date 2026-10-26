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

// お部屋（TOP のタブ）※文章は Figma のまま
$rooms = [
  [
    'id'    => 'standard',
    'tab'   => ['スタンダードルーム', '- 自然のぬくもり -'],
    'title' => '自然のぬくもり',
    'text'  => '「自然のぬくもり」スタンダードルームは、自然との共感を感じるお部屋です。山の景色を楽しむことができ、ナチュラルリトリートプランには朝食が含まれています。心地よいぬくもりとくつろぎのひとときを提供します。',
    'image' => '/images/room-standard.jpg',
    'alt'   => '大きな窓から庭を望む和室',
  ],
  [
    'id'    => 'deluxe',
    'tab'   => ['デラックスルーム', '- 静寂の庭園 -'],
    'title' => '静寂の庭園',
    'text'  => '「静寂の庭園」デラックスルームは、静寂と美しさに包まれた部屋です。個別の温泉ビューバルコニーからは、美しい庭園と温泉の景色が広がります。ロマンティックゲットアウェイプランで、特別なひとときを過ごしましょう。',
    'image' => '/images/room-deluxe.jpg',
    'alt'   => 'こたつのある広い和室',
  ],
  [
    'id'    => 'premium',
    'tab'   => ['プレミアスィート', '- 桜花の調べ -'],
    'title' => '桜花の調べ',
    'text'  => '「桜花の調べ」プレミアスィートは、最高級のラグジュアリーを追求した特別なお部屋です。広々とした空間に、温泉露天風呂が設けられ、そこからは四季折々の美しい景色を楽しむことができます。',
    'image' => '/images/room-premium.jpg',
    'alt'   => '木のぬくもりを感じるラウンジ',
  ],
];

// プラン（TOP のカード）
$plans = [
  ['id' => 'standard', 'name' => ['スタンダードルーム', '- 自然のぬくもり -'], 'price' => '30,000円/1部屋',  'in' => '16:00', 'out' => '10:00'],
  ['id' => 'deluxe', 'name' => ['デラックスルーム', '- 静寂の庭園 -'],       'price' => '50,000円/1部屋',  'in' => '14:00', 'out' => '12:00'],
  ['id' => 'premium', 'name' => ['プレミアスィート', '- 桜花の調べ -'],       'price' => '100,000円',       'in' => '15:00', 'out' => '11:00'],
];

// ブログ「宿からの便り」
$blog_posts = [
  [
    'title'    => '湯けむりの里を歩く。宿から足をのばして地獄めぐりへ',
    'date'     => '2026-10-20',
    'category' => '観光地',
    'image'    => '/images/blog-01.jpg',
    'alt'      => '湯けむりが立ちのぼる温泉地',
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
  ['date' => '2026-06-15', 'title' => '梅雨の季節限定「紫陽花の庭」ライトアップのお知らせ', 'url' => '/news-detail.php'],
  ['date' => '2026-06-01', 'title' => '貸切風呂のご予約方法が変わりました', 'url' => '/news-detail.php'],
];
