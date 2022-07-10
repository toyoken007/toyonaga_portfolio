<?php
session_start();

function h($value)
{
  return htmlspecialchars($value, ENT_QUOTES);
}

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
  header('Location: contact.php');
  exit();
} else {
  $post = $_SESSION['form'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  unset($_SESSION['form']);
  header('Location: error.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CHECK</title>
  <link rel="stylesheet" href="css/check/style.css">
  <link href="https://fonts.googleapis.com/css?family=Caveat rel=" stylesheet>
</head>

<body>
  <header>
    <div class="check_h1">
      <h1>確認画面</h1>
    </div>
  </header>
  <main>
    <div class="content">
      <div class="content_h2">
        <h2>記入した内容を確認して、「送信ボタン」を入力してください。</h2>
      </div>
      <div class="form_kakunin">
        <form action="" method="post">
          <input type="hidden" name="action" value="submit">
          <table>
            <tr>
              <th>
                <p>SUBJECT : </p>
              </th>
              <td>
                <?php echo h($post['subject']); ?>
              </td>
            </tr>
            <tr>
              <th>
                <p>NAME : </p>
              </th>
              <td>
                <?php echo h($post['name']); ?>
              </td>
            </tr>
            <tr>
              <th>
                <p>カナ : </p>
              </th>
              <td>
                <?php echo h($post['kana']); ?>
              </td>
            </tr>
            <tr>
              <th>
                <p>メールアドレス : </p>
              </th>
              <td>
                <?php echo h($post['email']); ?>
              </td>
            </tr>
            <tr>
              <th>
                <p>お問い合わせ : </p>
              </th>
              <td>
                <?php echo h($post['message']); ?>
              </td>
            </tr>
          </table>
          <div class="botan">
            <div class="back">
              <a href="contact.php" class="a">戻る</a>
            </div>
            <div class="next">
              <input type="submit" vuleu="送信">
            </div>
          </div>
        </form>
      </div>
      <div class="tyui">
        <p>※現在は送信機能を止めています</p>
      </div>
    </div>
  </main>
  <footer>

  </footer>
</body>

</html>