<?php
$page_title       = '運営会社情報｜楽園雅苑';
$page_description = '温泉宿「楽園雅苑」を運営する桜庭観光株式会社の会社情報です。';
include 'includes/header.php';

$page_heading   = '運営会社情報';
$page_head_line = false;   // Figma：タイトルの下は罫線なしで、すぐ表
$breadcrumbs    = [['label' => '運営会社情報']];
include __DIR__ . '/includes/parts/page-head.php';

// 会社情報（文章は Figma のまま）。'link' があるものはリンクにする
$company = [
  ['label' => '会社名',         'value' => '桜庭観光株式会社'],
  ['label' => '所在地',         'value' => '〒879-5425 大分県由布市庄内町渕'],
  ['label' => '電話番号',       'value' => '0123-456-7890'],
  ['label' => 'メールアドレス', 'value' => 'info@sakuraba-ryokan.com', 'link' => 'mailto:info@sakuraba-ryokan.com'],
  ['label' => 'ウェブサイト',   'value' => '楽園雅苑ウェブサイト',     'link' => '/index.php'],
  ['label' => '代表者名',       'value' => '山田太郎'],
  ['label' => '創立年',         'value' => '1998年'],
  ['label' => '事業内容',       'value' => '温泉宿「楽園雅苑」の運営'],
  ['label' => '会社概要',       'value' => '桜庭観光株式会社は、大分県内で美しい自然環境と伝統的な温泉文化を提供するリゾート施設を運営する会社です。私たちの温泉宿「楽園雅苑」では、四季折々の美しい景色と温泉を楽しむ贅沢な滞在を提供しております。'],
];
?>

<div class="company">
  <dl class="company-table">
    <?php foreach ($company as $row): ?>
      <div class="company-table__row">
        <dt><?= h($row['label']) ?></dt>
        <dd>
          <?php if (isset($row['link'])): ?>
            <a href="<?= h($row['link']) ?>"><?= h($row['value']) ?></a>
          <?php else: ?>
            <?= h($row['value']) ?>
          <?php endif; ?>
        </dd>
      </div>
    <?php endforeach; ?>
  </dl>
</div>

<?php include 'includes/footer.php'; ?>
