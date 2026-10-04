<?php
$page_title       = 'サービス｜楽園雅苑';
$page_description = '楽園雅苑の宿泊プラン・温泉と館内施設・お食事をご紹介します。';
include 'includes/header.php';

// 下層ページ共通の見出し
$page_heading = 'サービス';
$breadcrumbs  = [['label' => 'サービス']];
include __DIR__ . '/includes/parts/page-head.php';

// サービスの詳細（仮データ）
$service_details = [
  [
    'id'    => 'plan',
    'en'    => 'Stay',
    'title' => '宿泊プラン',
    'text'  => '全室から日本庭園を望む和室をご用意しています。障子越しの光、畳の香り、窓いっぱいの緑。季節の移ろいを感じながら、時間を忘れてお過ごしください。',
    'points'=> ['全室 庭園ビューの和室', '素泊まり / 朝食付き / 一泊二食付き', '記念日・ご長寿祝いプラン'],
    'image' => '/images/service-plan.jpg',
    'alt'   => '大きな窓から庭が見える和室',
  ],
  [
    'id'    => 'onsen',
    'en'    => 'Onsen',
    'title' => '温泉・館内施設',
    'text'  => '源泉かけ流しの露天風呂からは、春の新緑、秋の紅葉、冬の雪景色と、四季折々の庭の表情をお楽しみいただけます。湯上がりには、木のぬくもりあふれるラウンジでおくつろぎください。',
    'points'=> ['源泉かけ流しの露天風呂', '貸切風呂（要予約）', '湯上がりラウンジ'],
    'image' => '/images/service-onsen.jpg',
    'alt'   => '雪景色の露天風呂',
  ],
  [
    'id'    => 'meal',
    'en'    => 'Cuisine',
    'title' => 'お食事',
    'text'  => '地元で採れた旬の素材を、料理長が一品ずつ丁寧に仕立てる会席料理。器や盛り付けにも季節を映し、目でも舌でも味わう時間をお届けします。',
    'points'=> ['季節の会席料理（夕食）', '炊きたてご飯の和朝食', 'アレルギー対応（事前にご相談ください）'],
    'image' => '/images/service-meal.jpg',
    'alt'   => '季節の会席料理',
  ],
];
?>

<!-- 導入文 -->
<div class="section">
  <div class="container">
    <p class="lead">
      庭を眺め、湯に浸かり、旬を味わう。<br>
      楽園雅苑の三つのおもてなしをご紹介します。
    </p>
  </div>
</div>

<!-- サービス詳細：写真とテキストを交互に左右反転 -->
<?php foreach ($service_details as $i => $item): ?>
  <section class="section <?= $i % 2 === 0 ? 'section--white' : '' ?>" id="<?= h($item['id']) ?>">
    <div class="container">
      <div class="media <?= $i % 2 === 1 ? 'media--reverse' : '' ?>">
        <img class="media__img" src="<?= h($item['image']) ?>" alt="<?= h($item['alt']) ?>" loading="lazy" width="1200" height="800">
        <div class="media__body">
          <p class="media__en"><?= h($item['en']) ?></p>
          <h2 class="media__title"><?= h($item['title']) ?></h2>
          <p class="media__text"><?= h($item['text']) ?></p>
          <ul class="media__list">
            <?php foreach ($item['points'] as $point): ?>
              <li><?= h($point) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </section>
<?php endforeach; ?>

<?php include 'includes/footer.php'; ?>
