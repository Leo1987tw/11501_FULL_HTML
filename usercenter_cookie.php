<?php
// 預先處理要顯示的名字
$displayName = $_COOKIE['usernamelogin'] ?? '';

if (empty($displayName)) {
    $user = $_POST["username"] ?? '';
    $pass = $_POST["password"] ?? '';

    if ($user === "Leo" && $pass === "1234") {
        setcookie('usernamelogin', 'Leo', time() + 360);
        $displayName = "Leo"; // 讓當下頁面能直接抓到變數
    } else {
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
            <div class="error-card">
                <div class="error-icon">✘</div>
                <h2>登入失敗</h2>
                <p>帳號或密碼輸入錯誤</p>
                <a href="06_logincookie.php" class="retry-btn">返回重試</a>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入結果 cookie</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="icon-box">✔</div>
        <h2>登入成功</h2>
        <p>歡迎回來，<span class="user-highlight"><?= htmlspecialchars($displayName); ?></span><br>您的帳號驗證正確</p>

        <div class="btn-group">
            <a href="06_logincookie.php" class="btn btn-return">回登入頁</a>
            <a href="logout_cookie.php" class="btn btn-logout">安全登出</a>
        </div>
    </div>

</body>
</html>