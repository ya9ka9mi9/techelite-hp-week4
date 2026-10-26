<?php
// ご予約の入力フォーム（contact.php と、エラー時の confirm.php で共通）
// 使い方：$values（入力値）と $errors（エラー）を用意してから include する
$values = $values ?? get_reserve_input([]);
$errors = $errors ?? [];

// エラーがあれば赤枠にして、読み上げ用にエラー文と結びつける
// 未入力のときは Figma どおり、入力欄の中に赤字で「＊入力必須です」を出す（placeholder）
// $ph = false の欄（日付・セレクト）は placeholder が使えないので付けない
$attr = function ($key, $ph = true) use ($errors, $values) {
  if (!isset($errors[$key])) return '';
  $html = ' aria-invalid="true" aria-describedby="' . $key . '-error"';
  if ($ph && $values[$key] === '') $html .= ' placeholder="' . h($errors[$key]) . '"';
  return $html;
};
// エラーメッセージ：未入力のときは画面に出さず読み上げ用だけ、形式の誤りは入力欄の下に表示
// $ph = false の欄（日付）は、未入力のエラーも欄の下に表示する
$error = function ($key, $ph = true) use ($errors, $values) {
  if (!isset($errors[$key])) return '';
  $class = $ph && $values[$key] === '' ? 'visually-hidden' : 'form__error';
  return '<p class="' . $class . '" id="' . $key . '-error">' . h($errors[$key]) . '</p>';
};
// セレクトボックス
$select = function ($key, $options) use ($values, $errors, $attr, $error) {
  $html = '<div class="form__field form__select"><select class="form__input" id="' . $key . '" name="' . $key . '" required' . $attr($key, false) . '>';
  $first = isset($errors[$key]) && $values[$key] === '' ? $errors[$key] : '選択してください';
  $html .= '<option value="">' . h($first) . '</option>';
  foreach ($options as $value => $label) {
    $value = is_int($value) ? $label : $value;
    $html .= '<option value="' . h($value) . '"' . ($values[$key] === $value ? ' selected' : '') . '>' . h($label) . '</option>';
  }
  return $html . '</select>' . $error($key) . '</div>';
};
$address = [
  'zip'    => ['郵便番号', 'postal-code'],
  'pref'   => ['都道府県', 'address-level1'],
  'city'   => ['市区町村', 'address-level2'],
  'street' => ['町域・番地<br class="u-pc">建物名', 'address-line1'],
];
?>
<form class="form" action="/confirm.php" method="post" novalidate>
  <?php if ($errors): ?>
    <p class="visually-hidden" role="alert">入力内容に誤りがあります。赤い枠の項目をご確認ください。</p>
  <?php endif; ?>

  <?php foreach (['name' => ['お名前<span class="form__req">＊</span>', 'text', 'name'], 'email' => ['メールアドレス<span class="form__req">＊</span>', 'email', 'email'], 'tel' => ['電話番号<span class="form__req">＊</span>', 'tel', 'tel']] as $key => [$label, $type, $auto]): ?>
    <div class="form__row">
      <label class="form__label" for="<?= $key ?>"><?= $label ?></label>
      <div class="form__field">
        <input class="form__input" type="<?= $type ?>" id="<?= $key ?>" name="<?= $key ?>" value="<?= h($values[$key]) ?>" autocomplete="<?= $auto ?>" required<?= $attr($key) ?>>
        <?= $error($key) ?>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- ご住所：郵便番号・都道府県・市区町村・町域番地建物名 -->
  <fieldset class="form__row">
    <legend class="form__label">ご住所<span class="form__req">＊</span></legend>
    <div class="form__address">
      <?php foreach ($address as $key => [$label, $auto]): ?>
        <div class="form__address-row">
          <label class="form__sublabel" for="<?= $key ?>"><?= $label ?></label>
          <div class="form__field">
            <input class="form__input" type="text" id="<?= $key ?>" name="<?= $key ?>" value="<?= h($values[$key]) ?>" autocomplete="<?= $auto ?>" required<?= $attr($key) ?>>
            <?= $error($key) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </fieldset>

  <?php foreach (['checkin' => 'チェックイン日<span class="form__req">＊</span>', 'checkout' => 'チェックアウト日<span class="form__req">＊</span>'] as $key => $label): ?>
    <div class="form__row">
      <label class="form__label" for="<?= $key ?>"><?= $label ?></label>
      <div class="form__field form__select">
        <input class="form__input form__input--date" type="date" id="<?= $key ?>" name="<?= $key ?>" value="<?= h($values[$key]) ?>" required<?= $attr($key, false) ?>>
        <?= $error($key, false) ?>
      </div>
    </div>
  <?php endforeach; ?>

  <div class="form__row">
    <label class="form__label" for="plan">ご希望の宿泊プラン<span class="form__req">＊</span></label>
    <?= $select('plan', plan_options()) ?>
  </div>
  <div class="form__row">
    <label class="form__label" for="adults">大人の人数<span class="form__req">＊</span></label>
    <?= $select('adults', adult_options()) ?>
  </div>
  <div class="form__row">
    <label class="form__label" for="children">お子様の人数<span class="form__req">＊</span><br class="u-pc"><span class="form__note">(12歳未満)</span></label>
    <?= $select('children', child_options()) ?>
  </div>

  <div class="form__row">
    <label class="form__label" for="request">特別リクエスト</label>
    <div class="form__field">
      <textarea class="form__input form__textarea" id="request" name="request"<?= $attr('request') ?>><?= h($values['request']) ?></textarea>
      <?= $error('request') ?>
    </div>
  </div>

  <div class="form__footer">
    <p class="form__footer-text">予約を確認するため、お客様の連絡先情報をご提供いただきます。ご予約に関する詳細情報や特別なリクエストがございましたら、お知らせください。心よりお待ちしております。</p>
    <button type="submit" class="btn btn--submit">送信する</button>
  </div>
</form>
