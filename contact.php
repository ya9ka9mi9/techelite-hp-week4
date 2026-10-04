<?php
$page_title       = 'お問い合わせ｜楽園雅苑';
$page_description = '楽園雅苑へのご予約・お問い合わせはこちらのフォームから。';
include 'includes/header.php';
require_once __DIR__ . '/includes/form-functions.php';

// 確認画面の「修正する」から戻ってきたときは、送られてきた値を入力欄に戻す
$values = get_contact_input($_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : []);
$errors = [];

$page_heading = 'お問い合わせ';
$breadcrumbs  = [['label' => 'お問い合わせ']];
include __DIR__ . '/includes/parts/page-head.php';
?>

<div class="section">
  <div class="container">
    <p class="form__intro">
      ご宿泊のご予約、館内施設やお食事についてのご質問など、お気軽にお問い合わせください。<br>
      内容を確認のうえ、担当者より2営業日以内にご連絡いたします。
    </p>
    <?php include __DIR__ . '/includes/parts/contact-form.php'; ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
