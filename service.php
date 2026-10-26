<?php
$page_title       = '楽園雅苑のサービス｜楽園雅苑';
$page_description = '楽園雅苑の温泉・客室・レストラン・会議室・マッサージなど、館内のサービスをご紹介します。';
include 'includes/header.php';

$page_heading   = '楽園雅苑のサービス';
$page_head_line = false;
$breadcrumbs    = [['label' => 'サービス']];   // Figma のパンくずは「サービス」
include __DIR__ . '/includes/parts/page-head.php';

// 写真2枚（または3枚）を並べる部品
function service_photos($photos) {
  $html = '<ul class="svc-photos svc-photos--' . count($photos) . '">';
  foreach ($photos as [$src, $alt]) {
    $html .= '<li><img src="' . h($src) . '" alt="' . h($alt) . '" loading="lazy" width="580" height="370"></li>';
  }
  return $html . '</ul>';
}
?>

<div class="svc">

  <!-- 温泉 -->
  <section class="svc-block">
    <h2 class="svc-title">温泉</h2>
    <h3 class="svc-sub">癒しの源泉、<br class="u-sp">心と体を満たす至福の温泉体験</h3>
    <p class="svc-text svc-text--left">「楽園雅苑 - 桜庭温泉の隠れ家 -」では、自然の恵みに満ちた温泉を誇ります。当館の温泉は、大自然の地下深くから湧き出る温泉源を利用し、厳選された泉質が心と体を癒やします。その美しい湯色と温かさは、まるで天然の温もりを感じるかのよう。疲れた心と体を癒し、日々の喧騒から解放される贅沢な時間を提供します。楽園雅苑の温泉で、極上の癒しとリフレッシュをご体験ください。</p>
    <?= service_photos([['/images/svc-onsen-1.jpg', '渓流を望む露天風呂'], ['/images/svc-onsen-2.jpg', '紅葉に囲まれた露天風呂']]) ?>

    <dl class="svc-table">
      <div class="svc-table__row">
        <dt>泉質</dt>
        <dd>「桜庭温泉」の泉質は、硫黄泉とナトリウム・カルシウム硫酸塩泉が混ざり合った特別な組み合わせです。硫黄の特有の香りと透明感のある湯色が特徴で、温泉浴後に肌がつるつるになる感覚を提供します。</dd>
      </div>
      <div class="svc-table__row">
        <dt>効能</dt>
        <dd>
          <ul class="svc-table__list">
            <li>疲労回復: 泉質の特性から、疲れた筋肉をほぐし、日々のストレスや疲れを和らげます。</li>
            <li>皮膚の健康: 温泉のミネラルが肌に潤いを与え、肌トラブルを緩和します。</li>
            <li>血行促進: 温まった温泉効果で血行が促進され、身体全体をリフレッシュします。</li>
            <li>神経のリラックス: 温かい泉質が神経を鎮め、リラックスした状態をもたらします。</li>
          </ul>
          このような泉質と効能は、体のリラックスやリフレッシュに役立ちます。
        </dd>
      </div>
    </dl>
  </section>

  <!-- 施設情報 -->
  <section class="svc-block">
    <h2 class="svc-title">施設情報</h2>

    <h3 class="svc-sub">客室</h3>
    <p class="svc-text">プレミアスィート、デラックスルーム、スタンダードルームの豊富な選択肢。<br class="u-pc">快適なベッドとモダンな設備完備。<br class="u-pc">自然の風景を望む客室や温泉露天風呂付き客室をご用意しております。</p>
    <?= service_photos([['/images/svc-room-1.jpg', '庭を望むスタンダードルーム'], ['/images/svc-room-2.jpg', '広々としたデラックスルーム'], ['/images/svc-room-3.jpg', 'プレミアスィートのダイニング']]) ?>
    <div class="svc-more">
      <a href="/index.php#plan" class="btn btn--outline">宿泊プランを見る</a>
    </div>

    <h3 class="svc-sub">レストラン・ダイニング</h3>
    <p class="svc-text">地元の食材を使用した料理を楽しめるレストラン。<br class="u-pc">お部屋食や個室も用意され、贅沢な食体験を提供。</p>
    <?= service_photos([['/images/svc-dining-1.jpg', '個室のお食事処'], ['/images/svc-dining-2.jpg', '季節の会席料理']]) ?>
    <p class="svc-hours">
      朝食7:00 ~ 10:00 <br class="u-sp">(ラストオーダー 9:30)<span class="u-sp-gap"></span><br>
      ランチ11:30 ~ 14:00 <br class="u-sp">(ラストオーダー 13:30)<span class="u-sp-gap"></span><br>
      ディナー18:00 ~ 21:00 <br class="u-sp">(ラストオーダー 20:30)
    </p>
    <p class="svc-note">※ 営業時間は季節や施設の状況によって変更される場合がございますので、事前にご確認ください。</p>
  </section>

  <!-- その他施設・サービス -->
  <section class="svc-block">
    <h2 class="svc-title">その他施設・サービス</h2>

    <h3 class="svc-sub">会議室、イベントスペース</h3>
    <?= service_photos([['/images/svc-meeting-1.jpg', '座卓を並べた会議室'], ['/images/svc-meeting-2.jpg', '格天井の大広間']]) ?>

    <h3 class="svc-sub">マッサージ</h3>
    <?= service_photos([['/images/svc-massage-1.jpg', 'マッサージチェア'], ['/images/svc-massage-2.jpg', '緑を望むマッサージルーム']]) ?>
  </section>

</div>

<?php include 'includes/footer.php'; ?>
