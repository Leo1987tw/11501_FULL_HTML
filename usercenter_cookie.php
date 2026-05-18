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
            <style>
                body {
                    font-family: sans-serif;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    margin: 0; display: flex; justify-content: center; align-items: center; height: 100vh;
                }
                .error-card {
                    background: rgba(255, 255, 255, 0.1);
                    padding: 40px; border-radius: 24px; backdrop-filter: blur(15px);
                    border: 1px solid rgba(255, 255, 255, 0.2); text-align: center;
                    color: white; box-shadow: 0 8px 32px rgba(0,0,0,0.3); width: 320px;
                }
                .error-icon { font-size: 50px; color: #ff6b6b; margin-bottom: 20px; }
                .retry-btn {
                    display: inline-block; margin-top: 20px; padding: 12px 30px;
                    background: #ff6b6b; color: white; text-decoration: none;
                    border-radius: 12px; font-weight: bold; transition: 0.3s;
                }
                .retry-btn:hover { background: #fff; color: #ff6b6b; transform: scale(1.05); }
            </style>
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
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Noto Sans TC', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-attachment: fixed;
            color: #fff;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 50px 40px;
            border-radius: 30px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 90%;
            max-width: 420px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .icon-box {
            width: 70px; height: 70px;
            background: rgba(255, 215, 0, 0.15);
            border: 2px solid #ffd700;
            border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            margin: 0 auto 25px;
            color: #ffd700; font-size: 35px;
            text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }

        h2 { margin: 0 0 10px 0; letter-spacing: 2px; font-weight: 700; }
        p { font-size: 1.1em; color: rgba(255, 255, 255, 0.85); margin-bottom: 30px; }
        .user-highlight { color: #ffd700; font-weight: bold; }

        .btn-group { display: flex; gap: 12px; }
        .btn {
            flex: 1; padding: 14px; border-radius: 12px;
            text-decoration: none; font-weight: bold; transition: 0.3s;
        }
        .btn-return { background: rgba(255, 255, 255, 0.1); color: #fff; border: 1px solid rgba(255,255,255,0.3); }
        .btn-logout { background: #ffd700; color: #333; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.3); filter: brightness(1.1); }
    </style>
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