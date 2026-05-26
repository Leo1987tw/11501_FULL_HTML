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
    <link rel="stylesheet" href="style.css">
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