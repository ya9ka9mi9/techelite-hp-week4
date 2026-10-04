<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/form-functions.php';

// 確認画面から正しく送られてきたときだけ表示（直接開いた・値が不正なときは入力画面へ）
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || validate_contact(get_contact_input($_POST))) {
  header('Location: /contact.php');
  exit;
}

// ※ 本格的なメール送信は Week 8（WordPress のお問い合わせ機能）で扱う

$page_title       = '送信完了｜楽園雅苑';
$page_description = 'お問い合わせの送信が完了しました。';
include 'includes/header.php';

$page_heading = '送信完了';
$breadcrumbs  = [['label' => 'お問い合わせ', 'url' => '/contact.php'], ['label' => '送信完了']];
include __DIR__ . '/includes/parts/page-head.php';
?>

<div class="section">
  <div class="container">
    <div class="thanks">
      <p class="thanks__title">お問い合わせありがとうございます。</p>
      <p class="thanks__text">
        内容を確認のうえ、担当者より2営業日以内にご連絡いたします。<br>
        しばらく経っても連絡がない場合は、お手数ですがお電話（0120-000-000）にてお問い合わせください。
      </p>
      <a href="/index.php" class="btn btn--outline">TOP へ戻る</a>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
