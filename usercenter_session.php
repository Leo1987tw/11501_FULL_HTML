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
            <style>
                body {
                    font-family: 'Noto Sans TC', sans-serif;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    margin: 0; display: flex; justify-content: center; align-items: center; height: 100vh;
                }
                .error-container {
                    background: rgba(255, 255, 255, 0.1);
                    padding: 40px; border-radius: 30px; backdrop-filter: blur(20px);
                    border: 1px solid rgba(255, 255, 255, 0.2); text-align: center;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); color: white; width: 90%; max-width: 400px;
                }
                .error-icon {
                    width: 70px; height: 70px; background: rgba(231, 76, 60, 0.2);
                    border: 2px solid #e74c3c; border-radius: 50%; display: flex;
                    justify-content: center; align-items: center; margin: 0 auto 20px;
                    color: #e74c3c; font-size: 35px;
                }
                .back-link {
                    display: inline-block; margin-top: 25px; padding: 12px 30px;
                    background: #ffd700; color: #333; text-decoration: none;
                    border-radius: 12px; font-weight: bold; transition: 0.3s;
                }
                .back-link:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }
            </style>
        </head>
        <body>
            <div class="error-container">
                <div class="error-icon">✘</div>
                <h2 style="margin: 0; color: #ff6b6b;">登入失敗</h2>
                <p style="opacity: 0.8; margin-top: 10px;">帳號或密碼輸入錯誤，請重試</p>
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
    <style>
        /* 你精美的成功頁 CSS 保持不變 ... */
        * { box-sizing: border-box; }
        body {
            font-family: 'Noto Sans TC', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-attachment: fixed;
            color: #fff; margin: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1); padding: 50px 40px; border-radius: 30px;
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2); width: 90%; max-width: 420px;
            text-align: center; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        .icon-box {
            width: 70px; height: 70px; background: rgba(255, 215, 0, 0.15);
            border: 2px solid #ffd700; border-radius: 50%; display: flex;
            justify-content: center; align-items: center; margin: 0 auto 25px;
            color: #ffd700; font-size: 35px; text-shadow: 0 0 10px rgba(255, 215, 0, 0.5);
        }
        h2 { margin: 0 0 10px 0; letter-spacing: 2px; font-weight: 700; }
        p { font-size: 1.05em; line-height: 1.6; color: rgba(255, 255, 255, 0.85); margin-bottom: 35px; }
        .username-highlight { color: #ffd700; font-weight: bold; font-size: 1.2em; }
        .btn-group { display: flex; gap: 15px; justify-content: center; }
        .btn { flex: 1; padding: 12px 20px; text-decoration: none; border-radius: 12px; font-weight: bold; font-size: 0.95em; transition: 0.3s; display: inline-block; }
        .btn-logout { background: #ffd700; color: #333; }
        .btn-back { background: rgba(255, 255, 255, 0.1); color: #fff; border: 1px solid rgba(255, 255, 255, 0.3); }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); filter: brightness(1.1); }
    </style>
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