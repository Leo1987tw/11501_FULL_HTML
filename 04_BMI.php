<!DOCTYPE html>
<html lang="zh_TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI 計算練習</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            /* 讓寬度包含 Padding 和 Border */
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
        }

        .nav-header {
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: 0.3s;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-5px);
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 24px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 600px;
            width: 100%;
        }

        h2 {
            color: #ffd700;
            border-left: 5px solid #ffd700;
            padding-left: 15px;
            margin-top: 30px;
        }

        h2:first-of-type {
            margin-top: 0;
        }

        ui {
            display: block;
            background: rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        li {
            margin-bottom: 5px;
            color: #eee;
        }

        /* 表單樣式優化 */
        form {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        input[type="number"] {
            flex: 1;
            min-width: 120px;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            outline: none;
        }

        input[type="submit"] {
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            background: #ffd700;
            color: #333;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #fff;
            transform: translateY(-2px);
        }

        /* 結果區塊 */
        .result-card {
            background: rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 15px;
            margin-top: 20px;
            text-align: center;
        }

        .bmi-value {
            font-size: 2em;
            color: #00d2ff;
            font-weight: bold;
            display: block;
            margin: 10px 0;
        }

        .bmi-msg {
            font-size: 1.2em;
            background: #ffd700;
            color: #333;
            padding: 5px 15px;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <div class="nav-header">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
    </div>

    <div class="container">
        <h2>BMI 計算</h2>
        <ui>
            <li>建立一個可以輸入身高和體重的表單畫面</li>
            <li>按下"計算BMI"按鈕後，在下方顯示計算結果</li>
        </ui>

        <p>GET 方式傳輸：</p>
        <form method="GET" action="04_BMI.php">
            <input type="number" name="height" value="180" placeholder="身高 (cm)">
            <input type="number" name="weight" value="90" placeholder="體重 (kg)">
            <input type="submit" value="GET 計算">
        </form>

        <p>POST 方式傳輸：</p>
        <form method="POST" action="04_BMI.php">
            <input type="number" name="height" value="180" placeholder="身高 (cm)">
            <input type="number" name="weight" value="90" placeholder="體重 (kg)">
            <input type="submit" value="POST 計算">
        </form>

        <?php
        $height = 0;
        $weight = 0;
        $BMI = 0;
        if (isset($_GET['height'])) {
            $height = $_GET['height'];
        }
        if (isset($_GET['weight'])) {
            $weight = $_GET['weight'];
        }
        if (isset($_POST['height'])) {
            $height = $_POST['height'];
        }
        if (isset($_POST['weight'])) {
            $weight = $_POST['weight'];
        }

        if ($height > 0 && $weight > 0):
            // 修正計算公式中的 ^ 為 ** (PHP 的次方運算)
            $BMI = round($weight / (($height / 100) ** 2), 2);
        ?>
            <div class="result-card">
                <h3>計算結果</h3>
                <p>身高：<?= $height; ?> cm | 體重：<?= $weight; ?> kg</p>
                <span class="bmi-value">BMI：<?= $BMI; ?></span>

                <?php
                switch (true) {
                    case ($BMI < 18.5):
                        $message = "體重過輕";
                        break;
                    case ($BMI < 24):
                        $message = "正常範圍";
                        break;
                    case ($BMI < 27):
                        $message = "異常過重";
                        break;
                    case ($BMI < 30):
                        $message = "輕度肥胖";
                        break;
                    case ($BMI < 35):
                        $message = "中度肥胖";
                        break;
                    default:
                        $message = "重度肥胖";
                        break;
                }
                ?>
                <div class="bmi-msg"><?= $message; ?></div>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>