<?php

if(!($_POST["username"] == "Leo" && $_POST["password"] == "1234")){
    echo "登入失敗";
    echo "<a href='05_logincheck.php' class='back-btn error-btn'>返回登入</a>";
    exit();
}

?>

<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入結果</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Noto Sans TC', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-attachment: fixed;
            color: #fff;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 24px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .icon {
            font-size: 50px;
            margin-bottom: 20px;
            color: #ffd700;
        }

        h2 {
            margin: 0 0 20px 0;
            letter-spacing: 2px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #ffd700;
            color: #333;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #fff;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="icon">✔</div>
        <h2>登入成功</h2>
        <p>您的帳號密碼正確</p>
        
        <!-- 點擊回登入頁或首頁 -->
        <a href="05_logincheck.php" class="back-btn">登出</a>
    </div>

</body>
</html>