<!DOCTYPE html>
<html lang="zh_TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入檢查 cookie</title>
    <!-- 引入思源黑體 -->
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        /* 全域修正：防止 Padding 撐開寬度導致出現水平滾軸 */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans TC', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-attachment: fixed;
            color: #fff;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 24px;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 600px; /* 登入頁面通常窄一點比較好看 */
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .back-btn {
            align-self: flex-start;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: 0.3s ease;
            font-size: 0.9em;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(-5px);
        }

        h2 {
            color: #ffd700;
            border-left: 5px solid #ffd700;
            padding-left: 15px;
            margin-bottom: 25px;
        }

        ul {
            background: rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
            border-radius: 12px;
            line-height: 1.6;
            margin-bottom: 30px;
            font-size: 0.95em;
            color: #eee;
        }

        /* 表單樣式優化 */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .input-field label {
            font-size: 0.9em;
            color: #ffd700;
            padding-left: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1em;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: #ffd700;
            box-shadow: 0 0 10px rgba(255, 215, 0, 0.2);
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 14px;
            border-radius: 12px;
            border: none;
            background: #ffd700;
            color: #333;
            font-weight: bold;
            font-size: 1.1em;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #fff;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
    </style>
</head>

<body>

    <div style="width: 100%; max-width: 600px; display: flex;">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
    </div>

    <div class="container">
        <h2>登入檢查 cookie</h2>
        <ul>
            <li>建立一個可以輸入帳號和密碼的表單畫面</li>
            <li>按下「登入」後，跳轉至後端進行帳密比對。</li>
        </ul>

        <!-- 建議：將密碼 type 改為 password 較符合安全規範 -->
        <form action="usercenter_cookie.php" method="POST">
            <div class="input-field">
                <label>帳號</label>
                <input type="text" name="username" placeholder="請輸入帳號">
            </div>
            
            <div class="input-field">
                <label>密碼</label>
                <input type="password" name="password" placeholder="請輸入密碼">
            </div>

            <input type="submit" value="登入">
        </form>
    </div>

</body>

</html>