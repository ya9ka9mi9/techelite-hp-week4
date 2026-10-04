<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/form-functions.php';

// 入力画面を通らずに直接開かれたときは、入力画面へ戻す
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: /contact.php');
  exit;
}

$values = get_contact_input($_POST);
$errors = validate_contact($values);

$page_title       = ($errors ? 'お問い合わせ' : '予約確認') . '｜楽園雅苑';
$page_description = 'お問い合わせ内容の確認画面です。';
include 'includes/header.php';

$page_heading = $errors ? 'お問い合わせ' : '予約確認';
$breadcrumbs  = $errors
  ? [['label' => 'お問い合わせ']]
  : [['label' => 'お問い合わせ', 'url' => '/contact.php'], ['label' => '予約確認']];
include __DIR__ . '/includes/parts/page-head.php';
?>

<div class="section">
  <div class="container">

    <?php if ($errors): ?>
      <!-- エラーあり：入力画面をもう一度表示（入力値とエラーメッセージ付き） -->
      <?php include __DIR__ . '/includes/parts/contact-form.php'; ?>

    <?php else: ?>
      <!-- エラーなし：確認画面 -->
      <p class="form__intro">以下の内容でよろしければ「送信する」を押してください。</p>

      <table class="data-table">
        <tbody>
          <?php foreach (contact_fields() as $key => $field): ?>
            <?php if ($key === 'agree') continue; ?>
            <tr>
              <th scope="row"><?= h($field['label']) ?></th>
              <td><?= $values[$key] === '' ? '（未入力）' : nl2br(h($values[$key])) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="form__actions">
        <!-- 修正する：入力値を持って入力画面へ戻る -->
        <form action="/contact.php" method="post">
          <?php foreach ($values as $key => $value): ?>
            <input type="hidden" name="<?= h($key) ?>" value="<?= h($value) ?>">
          <?php endforeach; ?>
          <button type="submit" class="btn btn--outline">修正する</button>
        </form>
        <!-- 送信する：サンクス画面へ -->
        <form action="/thanks.php" method="post">
          <?php foreach ($values as $key => $value): ?>
            <input type="hidden" name="<?= h($key) ?>" value="<?= h($value) ?>">
          <?php endforeach; ?>
          <button type="submit" class="btn btn--accent">送信する</button>
        </form>
      </div>
    <?php endif; ?>

  </div>
</div>

<?php include 'includes/footer.php'; ?>
