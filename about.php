<?php
$page_title       = '運営会社｜楽園雅苑';
$page_description = '楽園雅苑を運営する会社の理念・沿革・会社情報・アクセスをご紹介します。';
include 'includes/header.php';

// 下層ページ共通の見出し
$page_heading = '運営会社';
$breadcrumbs  = [['label' => '運営会社']];
include __DIR__ . '/includes/parts/page-head.php';

// 沿革（仮データ）
$history = [
  ['year' => '1958年', 'text' => '創業者・楽園一郎が、日本庭園を囲む小さな湯宿として開業'],
  ['year' => '1986年', 'text' => '露天風呂を新設。四季の景色を望む湯処として親しまれる'],
  ['year' => '2005年', 'text' => '客室を全面改装し、全室から庭を望む造りに'],
  ['year' => '2018年', 'text' => '料理長を迎え、地元の旬を活かした会席料理を刷新'],
  ['year' => '2026年', 'text' => '公式サイトをリニューアル'],
];

// 会社情報（仮データ）
$company = [
  '会社名'   => '楽園観光株式会社',
  '代表者'   => '代表取締役 楽園 太郎',
  '所在地'   => '〒000-0000 ○○県○○市○○ 1-2-3',
  '電話番号' => '0120-000-000',
  '設立'     => '1958年4月',
  '事業内容' => '温泉旅館「楽園雅苑」の運営',
];
?>

<!-- 理念 -->
<section class="section" id="philosophy">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">理念</span>
      <span class="section-title__en">Philosophy</span>
    </h2>
    <div class="media">
      <img class="media__img" src="/images/facility-lounge.jpg" alt="木のぬくもりを感じるラウンジ" loading="lazy" width="1200" height="800">
      <div class="media__body">
        <h3 class="media__title">静けさに、身をゆだねる。</h3>
        <p class="media__text">
          庭を渡る風の音、湯けむりのゆらぎ、器に映る季節の色。<br>
          わたしたちは、日々の喧騒から離れ、心がほどけるひとときをお届けすることを大切にしています。
          創業から受け継いできた庭と湯を守りながら、これからもお客様一人ひとりに寄り添うおもてなしを続けてまいります。
        </p>
      </div>
    </div>
  </div>
</section>

<!-- 沿革 -->
<section class="section section--white" id="history">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">沿革</span>
      <span class="section-title__en">History</span>
    </h2>
    <table class="data-table">
      <tbody>
        <?php foreach ($history as $row): ?>
          <tr>
            <th scope="row"><?= h($row['year']) ?></th>
            <td><?= h($row['text']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- 会社情報 -->
<section class="section" id="company">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">会社情報</span>
      <span class="section-title__en">Company</span>
    </h2>
    <table class="data-table">
      <tbody>
        <?php foreach ($company as $label => $value): ?>
          <tr>
            <th scope="row"><?= h($label) ?></th>
            <td><?= h($value) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>

<!-- アクセス -->
<section class="section section--white" id="access">
  <div class="container">
    <h2 class="section-title">
      <span class="section-title__ja">アクセス</span>
      <span class="section-title__en">Access</span>
    </h2>
    <div class="access">
      <div class="access__map" role="img" aria-label="地図（仮）">地図（仮）</div>
      <dl class="access__info">
        <dt>住所</dt>
        <dd>〒000-0000 ○○県○○市○○ 1-2-3</dd>
        <dt>お車でお越しの方</dt>
        <dd>○○インターチェンジより約20分（無料駐車場20台）</dd>
        <dt>電車でお越しの方</dt>
        <dd>JR○○駅より送迎バスで約15分（要予約）</dd>
        <dt>チェックイン / チェックアウト</dt>
        <dd>15:00 / 11:00</dd>
      </dl>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
