<?php
// ご予約フォーム用の関数（contact / confirm / thanks で共通）
// 項目は Figma の「お問い合わせフォーム」（見出し：ご予約）に合わせている

// 文字数を数える（mbstring 拡張が無効な PHP でも動くように）
function text_length($str) {
  if (function_exists('mb_strlen')) {
    return mb_strlen($str, 'UTF-8');
  }
  return preg_match_all('/./us', $str);
}

// 宿泊プランの選択肢（値 => 表示名）
function plan_options() {
  return [
    'standard' => 'スタンダードルーム',
    'deluxe'   => 'デラックスルーム',
    'premium'  => 'プレミアスィート',
  ];
}
// 人数の選択肢
function adult_options() { return ['1名', '2名', '3名', '4名', '5名', '6名']; }
function child_options() { return ['0名', '1名', '2名', '3名', '4名']; }

// 入力項目の名前
function reserve_keys() {
  return ['name', 'email', 'tel', 'zip', 'pref', 'city', 'street', 'checkin', 'checkout', 'plan', 'adults', 'children', 'request'];
}

// POST された値を取り出す（前後の空白を除く・未入力は空文字）
function get_reserve_input($source) {
  $values = [];
  foreach (reserve_keys() as $key) {
    $values[$key] = isset($source[$key]) && is_string($source[$key]) ? trim($source[$key]) : '';
  }
  return $values;
}

// サーバーサイドバリデーション：エラーがあれば [項目 => メッセージ] を返す
function validate_reserve($v) {
  $e = [];
  $required = '＊入力必須です';   // Figma のエラー表示の文言

  if ($v['name'] === '')                    $e['name'] = $required;
  elseif (text_length($v['name']) > 50)     $e['name'] = '50文字以内で入力してください';

  if ($v['email'] === '')                                   $e['email'] = $required;
  elseif (!filter_var($v['email'], FILTER_VALIDATE_EMAIL))  $e['email'] = 'メールアドレスの形式が正しくありません';

  if ($v['tel'] === '')                                     $e['tel'] = $required;
  elseif (!preg_match('/\A[0-9\-]{10,13}\z/', $v['tel']))   $e['tel'] = '半角数字とハイフンで入力してください';

  if ($v['zip'] === '')                                     $e['zip'] = $required;
  elseif (!preg_match('/\A\d{3}-?\d{4}\z/', $v['zip']))     $e['zip'] = '7桁の郵便番号を入力してください';
  if ($v['pref'] === '')   $e['pref'] = $required;
  if ($v['city'] === '')   $e['city'] = $required;
  if ($v['street'] === '') $e['street'] = $required;

  $date = '/\A\d{4}-\d{2}-\d{2}\z/';
  if ($v['checkin'] === '')                     $e['checkin'] = $required;
  elseif (!preg_match($date, $v['checkin']))    $e['checkin'] = '日付を選び直してください';
  if ($v['checkout'] === '')                    $e['checkout'] = $required;
  elseif (!preg_match($date, $v['checkout']))   $e['checkout'] = '日付を選び直してください';
  elseif (!isset($e['checkin']) && $v['checkout'] <= $v['checkin'])
                                                $e['checkout'] = 'チェックイン日より後の日付を選んでください';

  if (!array_key_exists($v['plan'], plan_options()))     $e['plan'] = $v['plan'] === '' ? $required : '選び直してください';
  if (!in_array($v['adults'], adult_options(), true))    $e['adults'] = $v['adults'] === '' ? $required : '選び直してください';
  if (!in_array($v['children'], child_options(), true))  $e['children'] = $v['children'] === '' ? $required : '選び直してください';

  if (text_length($v['request']) > 1000)    $e['request'] = '1000文字以内で入力してください';

  return $e;
}

// 確認画面での表示用（プランの値を表示名に、日付を 2023/11/12 の形に）
function reserve_display($key, $value) {
  if ($value === '') return '';
  if ($key === 'plan') return plan_options()[$value] ?? '';
  if ($key === 'checkin' || $key === 'checkout') return str_replace('-', '/', $value);
  return $value;
}
