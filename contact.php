<?php
session_start();
$post = [
    'subject' => '',
    'name'  => '',
    'kana' => '',
    'email' => '',
    'message' => ''
];

$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post['subject'] = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    if ($post['subject'] === '') {
        $error['subject'] = 'blank';
    }

    $post['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }

    $post['kana'] = filter_input(INPUT_POST, 'kana', FILTER_SANITIZE_STRING);
    if ($post['kana'] === '') {
        $error['kana'] = 'blank';
    }

    $post['email'] = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }

    $post['message'] = filter_input(INPUT_POST, 'message');
    if ($post['message'] === '') {
        $error['message'] = 'blank';
    }

    if (count($error) === 0) {
        $_SESSION['form'] = $post;
        header('Location: check.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
}

?>
<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WORKS</title>
  <link rel="stylesheet" href="css/contact/style.css">
  <link href="https://fonts.googleapis.com/css?family=Caveat rel=" stylesheet>
</head>

<body>
  <header>
    <div class="header_wrap">
      <div class="header_h1">
        <h1>
          <span class="p-1">TOYONAGA KENTA</span>
          <span class="p-2">PortFolio</span>
        </h1>
      </div>
      <nav class="header_list">
        <ul>
          <li><a href="index.html">TOP</a></li>
          <li><a href="about.html">ABOUT</a></li>
          <li><a href="works.html">WORKS</a></li>
          <li><a href="contact.html">CONTACT</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div class="contact_title">
      <p>CONTACT</p>
    </div>
    <div class="contact_comment">
      <p>お仕事のご依頼などはお気軽にメッセージフォームよりお問い合わせください。</p>
    </div>
    <div class="form">
      <form action="" method="post">
        <div class="contact_wrap">
          <label for="subject">SUBJECT　※</label><br>
          <input type="text" class="txt" name="subject" placeholder="お問い合わせ内容">
          <?php if (isset($error['subject']) && $error['subject'] === 'blank') : ?>
            <p class="error">*SUBJECTを入力してください</p>
        <?php endif; ?>
        </div>
        <div class="contact_wrap">
          <label for="name">NAME　※</label><br>
          <input type="text" class="txt" name="name" placeholder="お名前を漢字でご記入ください">
          <?php if (isset($error['name']) && $error['name'] === 'blank') : ?>
              <p class="error">*お名前を入力してください</p>
          <?php endif; ?>
        </div>
        <div class="contact_wrap">
          <label for="name">カナ　※</label><br>
          <input type="text" class="txt" name="kana" placeholder="お名前をカタカナでご記入ください">
          <?php if (isset($error['kana']) && $error['kana'] === 'blank') : ?>
            <p class="error">*カタカナでお名前を入力してください</p>
        <?php endif; ?>
        </div>
        <div class="contact_wrap">
          <label for="email">メールアドレス　※</label><br>
          <input type="text" class="txt" name="email" placeholder="メールアドレス">
          <?php if (isset($error['email']) && $error['email'] === 'blank') : ?>
              <p class="error">*メールアドレスを入力して下さい</p>
          <?php endif; ?>
          <?php if (isset($error['email']) && $error['email'] === 'email') : ?>
              <p class="error">*メールアドレスを正しく入力して下さい</p>
          <?php endif; ?>
        </div>
        <div class="contact_wrap">
          <label for="message">お問い合わせ　※</label><br>
          <textarea id="message" name="message" placeholder="メッセージ"></textarea>
          <?php if (isset($error['message']) && $error['message'] === 'blank') : ?>
              <p class="error">*お問い合わせ内容をご記入ください</p>
          <?php endif; ?> 
        </div>
        <div class="kome">
          <p>※必須</p>
        </div>
        <div class="guidance">
          <p>返信メールが届かない場合、メールアドレスが間違っている可能性がございます。</p>
          <br>
          <p>恐れ入りますが、メールアドレスを再度ご確認くださいませ。</p>
        </div>
        <div class="soushin">
          <div class="submit_button"><input type="submit" value="SEND"></div>
        </div>
      </form>
    </div>
  </main>
  <footer>
    <p>&copy;2022/TOYOKEN</p>
  </footer>
</body>

</html>