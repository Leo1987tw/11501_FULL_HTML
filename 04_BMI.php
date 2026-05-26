<!DOCTYPE html>
<html lang="zh_TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI 計算練習</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="back-nav">
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