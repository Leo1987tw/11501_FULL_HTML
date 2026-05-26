<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日期/時間處理</title>
    <!-- 引入質感字體 -->
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="back-nav">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
    </div>

    <div class="container">
        <h2>給定兩個日期，計算中間間隔天數</h2>
        <ul>
            <li>起始日期: 2026-04-19</li>
            <li>結束日期: 2026-05-04</li>
        </ul>
        <div class="output-box">
            <?php
            $start = "2026-04-19";
            $end = "2026-05-04";
            $start_time = strtotime($start);
            $end_time = strtotime($end);
            $difference = ($end_time - $start_time) / ( 24 * 60 * 60 );
            echo "<br>";
            echo "間隔天數: " . $difference . " 天";
            ?>
        </div>

        <h2>計算距離自己下一次生日還有幾天</h2>
        <div class="output-box">
            <?php
            $today = date("Y-m-d");
            $birthday = "1987-03-03";
            $this_birthday = date("Y") . date("-m-d", strtotime($birthday));
            $this_birthday_time = strtotime($this_birthday);
            $today_time = strtotime($today);
            
            echo "時間戳對比: " . $today_time . " - " . $this_birthday_time;

            if($today_time >= $this_birthday_time){
                $difference = (strtotime("+1 year", strtotime($this_birthday)) - $today_time) / ( 24 *60 * 60 );
            } else{
                $difference = ($this_birthday_time - $today_time) / ( 24 *60 * 60 );
            }

            echo "<br>";
            echo "距離下次生日天數: " . $difference . " 天";
            ?>
        </div>

        <h2>日期格式呈現練習</h2>
        <div class="output-box">
            <?php
            echo date("Y/m/d");
            echo "<br>";
            echo date("n月j日 l");
            echo "<br>";
            echo date("Y-m-d G:") . (int)date("i") . ":" . (int)date("s");
            echo "<br>";
            echo date("Y-m-d G:") . date("i") . ":" . date("s");
            echo "<br>";
            echo date("今天是西元Y年m月d日 ");
            echo (date("N") <= 5 ? "<span class='highlight'>上班日</span>" : "<span class='highlight'>假日</span>");
            ?>
        </div>

        <h2>利用迴圈計算連續五個周一日期</h2>
        <p>基準日期: 2026-05-04</p>
        <div class="output-box">
            <?php
            $date = "2026-05-04";
            for($i=1; $i<=5; $i++){
                $timestring = strtotime("+$i week", strtotime($date));
                echo date("Y-m-d 星期一", $timestring);
                echo "<br>";
            }
            ?>
        </div>
    </div>

</body>
</html>