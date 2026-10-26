<?php
$page_title       = 'ご予約｜楽園雅苑';
$page_description = '楽園雅苑のご予約フォームです。';
include 'includes/header.php';
require_once __DIR__ . '/includes/form-functions.php';

// 確認画面の「修正する」から戻ってきたときは、送られてきた値を入力欄に戻す
$values = get_reserve_input($_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST : []);
// TOP のプランの「予約」ボタンから来たときは、そのプランを選んだ状態にする（contact.php?plan=deluxe）
if ($values['plan'] === '' && isset($_GET['plan']) && is_string($_GET['plan']) && array_key_exists($_GET['plan'], plan_options())) {
  $values['plan'] = $_GET['plan'];
}
$errors = [];

$page_heading   = 'ご予約';
$page_head_line = false;
$breadcrumbs    = [['label' => 'ご予約']];
include __DIR__ . '/includes/parts/page-head.php';
include __DIR__ . '/includes/parts/reserve-body.php';

include 'includes/footer.php';
