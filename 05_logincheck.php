<!DOCTYPE html>
<html lang="zh_TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入檢查</title>
    <!-- 引入思源黑體 -->
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="back-nav">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
    </div>

    <div class="container">
        <h2>登入檢查</h2>
        <ul>
            <li>建立一個可以輸入帳號和密碼的表單畫面</li>
            <li>按下「登入」後，跳轉至後端進行帳密比對。</li>
        </ul>

        <!-- 建議：將密碼 type 改為 password 較符合安全規範 -->
        <form action="usercenter.php" method="POST">
            <div class="input-field">
                <label>帳號</label>
                <input type="text" name="username" placeholder="請輸入帳號" required>
            </div>
            
            <div class="input-field">
                <label>密碼</label>
                <input type="password" name="password" placeholder="請輸入密碼" required>
            </div>

            <input type="submit" value="登入">
        </form>
    </div>

</body>

</html>