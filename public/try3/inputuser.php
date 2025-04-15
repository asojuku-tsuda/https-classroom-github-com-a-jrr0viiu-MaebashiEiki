<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body class="cyberpunk-bg">
    <div class="login-box">
      <h2>
      <?php
// ユーザー入力を取得
$username     = filter_input(INPUT_GET, 'username');
$useraddress  = filter_input(INPUT_GET, 'useraddress');
$usermail     = filter_input(INPUT_GET, 'usermail');

// ▼ 入力チェック ▼

// 名前：必須・日本語のみ・20文字まで
if (!is_string($username) || trim($username) === '') {
    die("名前を入力してください。");
} elseif (mb_strlen($username) > 20) {
  die("名前は20文字以内で入力してください。");
}elseif
(!mb_ereg('^[ぁ-んァ-ン一-龥ーa-zA-Z\s]+$', $username)) {
    die("名前は20文字以内の日本語（または英字）で入力してください。");
}

// 住所：必須・日本語のみ・50文字まで
if (!is_string($useraddress) || trim($useraddress) === '') {
    die("住所を入力してください。");
} elseif(mb_strlen($useraddress) > 20) {
  die("住所は20文字以内で入力してください。");
}elseif  
 (!mb_ereg('^[ぁ-んァ-ン一-龥ーa-zA-Z0-9\s\-ー]+$', $useraddress)) {
    die("住所は50文字以内の日本語（または一部英数字記号）で入力してください。");
}

// メールアドレス：必須・100文字以内・特定文字のみ許可
if (!is_string($usermail) || trim($usermail) === '') {
    die("メールアドレスを入力してください。");
} elseif (mb_strlen($usermail) > 100) {
    die("メールアドレスは100文字以内で入力してください。");
} elseif (!preg_match('/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}$/', $usermail)) {
    die("正しい形式のメールアドレスを入力してください。");
}

// ▼ 表示 ▼
echo "あなたが入力した値<br>";
echo "名前：" . htmlspecialchars($username) . "<br>";
echo "住所：" . htmlspecialchars($useraddress) . "<br>";
echo "メールアドレス：" . htmlspecialchars($usermail);
?>

    </h2>
    </div>
  </body>
</html>
