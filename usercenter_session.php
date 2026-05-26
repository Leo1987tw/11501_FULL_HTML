<?php
session_start();

if (!isset($_SESSION['login'])) {
    $user = $_POST["username"] ?? '';
    $pass = $_POST["password"] ?? '';

    if (!($user == "Leo" && $pass == "1234")) {
        // --- 登入失敗美化畫面 ---
        ?>
        <!DOCTYPE html>
        <html lang="zh_TW">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>登入失敗</title>
            <link href="https://googleapis.com" rel="stylesheet">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <div class="error-container">
                <div class="error-icon">✘</div>
                <h2 class="error-title">登入失敗</h2>
                <p class="error-desc">帳號或密碼輸入錯誤，請重試</p>
                <a href="07_loginsession.php" class="back-link">返回登入</a>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
    
    $_SESSION['login'] = 1;
    $_SESSION['username'] = $user;
}
?>

<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入結果 Session</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="icon-box">✔</div>
        <h2>登入成功</h2>
        <p>歡迎回來，<span class="username-highlight"><?= htmlspecialchars($_SESSION['username']); ?></span><br>
        您的帳號密碼驗證正確。</p>

        <div class="btn-group">
            <a href="07_loginsession.php" class="btn btn-back">回登入頁</a>
            <a href="logout_session.php" class="btn btn-logout">安全登出</a>
        </div>
    </div>

</body>
</html>