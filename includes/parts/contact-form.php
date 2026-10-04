<?php
// お問い合わせの入力フォーム（contact.php と、エラー時の confirm.php で共通）
// 使い方：$values（入力値）と $errors（エラー）を用意してから include する
$values = $values ?? get_contact_input([]);
$errors = $errors ?? [];
?>
<?php if ($errors): ?>
  <div class="form__error-summary" role="alert">
    <p>入力内容に誤りがあります。下記をご確認ください。</p>
  </div>
<?php endif; ?>

<form class="form" action="/confirm.php" method="post">

  <div class="form__row">
    <label class="form__label" for="name">お名前 <span class="form__required">必須</span></label>
    <input class="form__input" type="text" id="name" name="name" value="<?= h($values['name']) ?>" autocomplete="name" required
      <?= isset($errors['name']) ? 'aria-invalid="true" aria-describedby="name-error"' : '' ?>>
    <?php if (isset($errors['name'])): ?><p class="form__error" id="name-error"><?= h($errors['name']) ?></p><?php endif; ?>
  </div>

  <div class="form__row">
    <label class="form__label" for="email">メールアドレス <span class="form__required">必須</span></label>
    <input class="form__input" type="email" id="email" name="email" value="<?= h($values['email']) ?>" autocomplete="email" required
      <?= isset($errors['email']) ? 'aria-invalid="true" aria-describedby="email-error"' : '' ?>>
    <?php if (isset($errors['email'])): ?><p class="form__error" id="email-error"><?= h($errors['email']) ?></p><?php endif; ?>
  </div>

  <div class="form__row">
    <label class="form__label" for="tel">電話番号</label>
    <input class="form__input" type="tel" id="tel" name="tel" value="<?= h($values['tel']) ?>" autocomplete="tel" placeholder="例）090-1234-5678"
      <?= isset($errors['tel']) ? 'aria-invalid="true" aria-describedby="tel-error"' : '' ?>>
    <?php if (isset($errors['tel'])): ?><p class="form__error" id="tel-error"><?= h($errors['tel']) ?></p><?php endif; ?>
  </div>

  <div class="form__row form__row--half">
    <div>
      <label class="form__label" for="checkin">ご宿泊希望日</label>
      <input class="form__input" type="date" id="checkin" name="checkin" value="<?= h($values['checkin']) ?>"
        <?= isset($errors['checkin']) ? 'aria-invalid="true" aria-describedby="checkin-error"' : '' ?>>
      <?php if (isset($errors['checkin'])): ?><p class="form__error" id="checkin-error"><?= h($errors['checkin']) ?></p><?php endif; ?>
    </div>
    <div>
      <label class="form__label" for="guests">ご宿泊人数</label>
      <select class="form__input" id="guests" name="guests"
        <?= isset($errors['guests']) ? 'aria-invalid="true" aria-describedby="guests-error"' : '' ?>>
        <option value="">選択してください</option>
        <?php foreach (guest_options() as $option): ?>
          <option value="<?= h($option) ?>" <?= $values['guests'] === $option ? 'selected' : '' ?>><?= h($option) ?></option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($errors['guests'])): ?><p class="form__error" id="guests-error"><?= h($errors['guests']) ?></p><?php endif; ?>
    </div>
  </div>

  <div class="form__row">
    <label class="form__label" for="message">お問い合わせ内容 <span class="form__required">必須</span></label>
    <textarea class="form__input form__textarea" id="message" name="message" rows="6" required
      <?= isset($errors['message']) ? 'aria-invalid="true" aria-describedby="message-error"' : '' ?>><?= h($values['message']) ?></textarea>
    <?php if (isset($errors['message'])): ?><p class="form__error" id="message-error"><?= h($errors['message']) ?></p><?php endif; ?>
  </div>

  <div class="form__row form__row--agree">
    <label class="form__check">
      <input type="checkbox" name="agree" value="1" <?= $values['agree'] === '1' ? 'checked' : '' ?> required
        <?= isset($errors['agree']) ? 'aria-invalid="true" aria-describedby="agree-error"' : '' ?>>
      <span><a href="/privacy.php" target="_blank" rel="noopener">プライバシーポリシー</a>に同意する <span class="form__required">必須</span></span>
    </label>
    <?php if (isset($errors['agree'])): ?><p class="form__error" id="agree-error"><?= h($errors['agree']) ?></p><?php endif; ?>
  </div>

  <div class="form__actions">
    <button type="submit" class="btn btn--accent">入力内容を確認する</button>
  </div>
</form>
