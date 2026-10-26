<?php
// XSS 対策のエスケープ（出力時に必ず通す）
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// 現在のファイル名を返す（ナビの現在地判定に使う）
function current_page() {
  return basename($_SERVER['PHP_SELF']);  // 例: "about.php"
}