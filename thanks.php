<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/form-functions.php';

// 確認画面から正しく送られてきたときだけ表示（直接開いた・値が不正なときは入力画面へ）
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || validate_reserve(get_reserve_input($_POST))) {
  header('Location: /contact.php');
  exit;
}
// ※ 本格的なメール送信は Week 8（WordPress のお問い合わせ機能）で扱う

$page_title       = '予約完了｜楽園雅苑';
$page_description = 'ご予約を受け付けました。';
include 'includes/header.php';

$page_heading   = '予約が完了しました';
$page_head_line = false;
$breadcrumbs    = [
  ['label' => 'ご予約', 'url' => '/contact.php'],
  ['label' => '予約内容の確認'],   // 確認画面は POST でしか開けないのでリンクにしない
  ['label' => '予約完了'],
];
include __DIR__ . '/includes/parts/page-head.php';
?>

<div class="reserve reserve--thanks">
  <p>「楽園雅苑 - 桜庭温泉の隠れ家 -」へのご予約、誠にありがとうございます。<br>
  お客様の予約が正常に受け付けられました。<br>
  <br>
  ご注意事項:<br>
  ご予約に関する特別なリクエストや変更がある場合、お手続きの前に当宿のスタッフがご連絡いたします。<br>
  予約内容の変更やキャンセルについては、ご予約確認メールに記載の手順に従ってご連絡いただけます。</p>
  <p>「楽園雅苑」でのご滞在が、素晴らしい思い出とくつろぎに満ちたひとときとなることを心より願っております。何かご質問やご要望がある場合は、いつでもご連絡いただけます。<br>
  お客様にお会いできることを楽しみにしております。</p>
</div>

<?php include 'includes/footer.php'; ?>
