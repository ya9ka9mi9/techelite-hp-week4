<?php
// お問い合わせフォーム用の関数（contact / confirm / thanks で共通）

// 項目の定義（ラベルと必須かどうか）
function contact_fields() {
  return [
    'name'    => ['label' => 'お名前',           'required' => true],
    'email'   => ['label' => 'メールアドレス',   'required' => true],
    'tel'     => ['label' => '電話番号',         'required' => false],
    'checkin' => ['label' => 'ご宿泊希望日',     'required' => false],
    'guests'  => ['label' => 'ご宿泊人数',       'required' => false],
    'message' => ['label' => 'お問い合わせ内容', 'required' => true],
    'agree'   => ['label' => 'プライバシーポリシーへの同意', 'required' => true],
  ];
}

// 文字数を数える（日本語も1文字として数える）
// mbstring 拡張が無効な PHP でも動くように、ない場合は正規表現で数える
function text_length($str) {
  if (function_exists('mb_strlen')) {
    return mb_strlen($str, 'UTF-8');
  }
  return preg_match_all('/./us', $str);
}

// 人数の選択肢
function guest_options() {
  return ['1名', '2名', '3名', '4名', '5名以上'];
}

// POST された値を取り出す（前後の空白を除く・未入力は空文字）
function get_contact_input($source) {
  $values = [];
  foreach (array_keys(contact_fields()) as $key) {
    $values[$key] = isset($source[$key]) && is_string($source[$key]) ? trim($source[$key]) : '';
  }
  return $values;
}

// サーバーサイドバリデーション：エラーがあれば [項目 => メッセージ] を返す
function validate_contact($values) {
  $errors = [];

  if ($values['name'] === '') {
    $errors['name'] = 'お名前を入力してください。';
  } elseif (text_length($values['name']) > 50) {
    $errors['name'] = 'お名前は50文字以内で入力してください。';
  }

  if ($values['email'] === '') {
    $errors['email'] = 'メールアドレスを入力してください。';
  } elseif (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'メールアドレスの形式が正しくありません。';
  }

  if ($values['tel'] !== '' && !preg_match('/\A[0-9\-]{10,13}\z/', $values['tel'])) {
    $errors['tel'] = '電話番号は半角数字とハイフンで入力してください。';
  }

  if ($values['checkin'] !== '' && !preg_match('/\A\d{4}-\d{2}-\d{2}\z/', $values['checkin'])) {
    $errors['checkin'] = 'ご宿泊希望日の形式が正しくありません。';
  }

  if ($values['guests'] !== '' && !in_array($values['guests'], guest_options(), true)) {
    $errors['guests'] = 'ご宿泊人数を選択し直してください。';
  }

  if ($values['message'] === '') {
    $errors['message'] = 'お問い合わせ内容を入力してください。';
  } elseif (text_length($values['message']) > 1000) {
    $errors['message'] = 'お問い合わせ内容は1000文字以内で入力してください。';
  }

  if ($values['agree'] !== '1') {
    $errors['agree'] = 'プライバシーポリシーへの同意が必要です。';
  }

  return $errors;
}
