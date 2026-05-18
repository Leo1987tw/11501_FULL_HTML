<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日期/時間處理</title>
    <!-- 引入質感字體 -->
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        *{
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
        }

        /* 返回首頁導覽 */
        .back-nav {
            width: 100%;
            max-width: 800px;
            margin-bottom: 20px;
        }
        .back-btn {
            display: inline-block;
            padding: 10px 25px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            font-size: 0.9em;
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
            max-width: 800px;
            width: 100%;
        }

        h2 {
            color: #ffd700;
            border-left: 5px solid #ffd700;
            padding-left: 15px;
            margin-top: 40px;
            font-size: 1.5em;
        }
        h2:first-of-type { margin-top: 0; }

        p, ul {
            background: rgba(0, 0, 0, 0.1);
            padding: 15px 25px;
            border-radius: 10px;
            color: #eee;
            line-height: 1.6;
        }

        ul { list-style-type: none; }
        li::before {
            content: "📅 ";
            margin-right: 8px;
        }

        /* PHP 輸出區塊 */
        .output-box {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 12px;
            margin: 15px 0;
            font-family: 'Fira Code', monospace;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #a5d6ff;
            line-height: 1.8;
        }

        .highlight {
            color: #ffd700;
            font-weight: bold;
        }
    </style>
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