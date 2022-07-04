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
</head>

<body>
<header>
    <div class="header_wrap">
      <div class="header_h1">
        <h1>
          <a href="index.html" class="p-1">TOYONAGA KENTA</a>
          <a href="index.html" class="p-2">PortFolio</a>
        </h1>
      </div>
      <nav class="header_list nav" id="js-nav">
        <ul>
          <li><a href="index.html">TOP</a></li>
          <li><a href="about.html">ABOUT</a></li>
          <li><a href="works.html">WORKS</a></li>
          <li><a href="contact.php">CONTACT</a></li>
        </ul>
      </nav>
      <button class="header__hamburger hamburger" id="js-hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </header>
  <main>
    <div class="contact_title">
      <p>CONTACT</p>
    </div>
    <div class="contact_comment">
      <p>お仕事のご依頼などはお気軽にメッセージフォームよりお問い合わせください。</p>
    </div>
    <div class="kome">
      <p>※必須</p>
    </div>
    <div class="form">
      <form action="" method="post">
        <div class="contact_wrap">
          <label for="subject">お問い合わせ内容　※</label><br>
          <select id="subject" name="subject" onchange="changeColor(this)">
            <option class=".option" value="">選択してください</option>
            <option value="web制作依頼">web制作依頼</option>
            <option value="wordplessでのブログ開設">wordplessでのブログ開設</option>
            <option value="wordplessテーマ制作">wordplessテーマ制作</option>
            <option value="コーポレートサイト制作">コーポレートサイト制作</option>
            <option value="お問い合わせ">お問い合わせ</option>
            <option value="その他">その他</option>
          </select>
          <?php if (isset($error['subject']) && $error['subject'] === 'blank') : ?>
            <p class="error">*お問い合わせ内容を選んでください</p>
          <?php endif; ?>
        </div>
        <div class="contact_wrap">
          <label for="name">お名前※</label><br>
          <input type="text" name="name" placeholder="お名前を漢字でご記入ください">
          <?php if (isset($error['name']) && $error['name'] === 'blank') : ?>
            <p class="error">*お名前を入力してください</p>
          <?php endif; ?>
        </div>
        <div class="contact_wrap">
          <label for="name">カナ　※</label><br>
          <input type="text" name="kana" placeholder="お名前をカタカナでご記入ください">
          <?php if (isset($error['kana']) && $error['kana'] === 'blank') : ?>
            <p class="error">*カタカナでお名前を入力してください</p>
          <?php endif; ?>
        </div>
        <div class="contact_wrap">
          <label for="email">メールアドレス　※</label><br>
          <input type="text" name="email" placeholder="メールアドレス">
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
        <div class="soushin">
          <div class="submit_button"><input type="submit" value="SEND"></div>
        </div>
      </form>
      <div class="guidance">
        <p>返信メールが届かない場合、メールアドレスが間違っている可能性がございます。</p>
        <br>
        <p>恐れ入りますが、メールアドレスを再度ご確認くださいませ。</p>
      </div>
    </div>
  </main>
  <footer>
    <p>&copy;2022/TOYOKEN</p>
  </footer>
  <script src="js/jquery.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/burger.js"></script>
  <script>
    function changeColor(hoge) {
      if (hoge.value == 0) {
        hoge.style.color = '';
      } else {
        hoge.style.color = 'black';
      }
    }
  </script>
</body>

</html>