<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/form-functions.php';

// 入力画面を通らずに直接開かれたときは、入力画面へ戻す
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: /contact.php');
  exit;
}

$values = get_reserve_input($_POST);
$errors = validate_reserve($values);

if ($errors) {
  // エラーあり：入力画面をもう一度表示（Figma の「お問い合わせフォーム_2」）
  $page_title       = 'ご予約｜楽園雅苑';
  $page_description = '楽園雅苑のご予約フォームです。';
  include 'includes/header.php';
  $page_heading   = 'ご予約';
  $page_head_line = false;
  $breadcrumbs    = [['label' => 'ご予約']];
  include __DIR__ . '/includes/parts/page-head.php';
  include __DIR__ . '/includes/parts/reserve-body.php';
  include 'includes/footer.php';
  exit;
}

// エラーなし：確認画面（Figma の「予約確認画面」）
$page_title       = 'ご予約の確認｜楽園雅苑';
$page_description = 'ご予約内容の確認画面です。';
include 'includes/header.php';
$page_heading = 'ご予約の確認';
$breadcrumbs  = [['label' => 'ご予約', 'url' => '/contact.php'], ['label' => '予約内容の確認']];
include __DIR__ . '/includes/parts/page-head.php';

$address = implode("\n", array_filter([
  $values['zip'] !== '' ? '〒' . $values['zip'] : '',
  $values['pref'], $values['city'], $values['street'],
], 'strlen'));
$rows = [
  'お名前'           => $values['name'],
  'メールアドレス'   => $values['email'],
  '電話番号'         => $values['tel'],
  'ご住所'           => $address,
  'チェックイン日'   => reserve_display('checkin', $values['checkin']),
  'チェックアウト日' => reserve_display('checkout', $values['checkout']),
  '部屋のタイプ'     => reserve_display('plan', $values['plan']),
  '大人の人数'       => $values['adults'],
  'お子様の人数'     => $values['children'],
  '特別リクエスト'   => $values['request'],
];
?>

<div class="reserve reserve--confirm">
  <dl class="confirm-list">
    <?php foreach ($rows as $label => $value): ?>
      <div class="confirm-list__row">
        <dt><?= h($label) ?></dt>
        <dd><?= $value === '' ? 'なし' : nl2br(h($value), false) ?></dd>
      </div>
    <?php endforeach; ?>
  </dl>

  <div class="form__footer form__footer--confirm">
    <p class="form__footer-text">上記の内容で送信いたします</p>
    <form action="/thanks.php" method="post">
      <?php foreach ($values as $key => $value): ?>
        <input type="hidden" name="<?= h($key) ?>" value="<?= h($value) ?>">
      <?php endforeach; ?>
      <button type="submit" class="btn btn--submit">送信する</button>
    </form>
    <!-- Figma にはないが、入力し直せるように「修正する」を文字リンクの形で用意 -->
    <form action="/contact.php" method="post" class="form__back">
      <?php foreach ($values as $key => $value): ?>
        <input type="hidden" name="<?= h($key) ?>" value="<?= h($value) ?>">
      <?php endforeach; ?>
      <button type="submit" class="form__back-btn">入力内容を修正する</button>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
