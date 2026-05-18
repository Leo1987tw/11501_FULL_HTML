<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>線上月曆製作 - 四種結果展示</title>
    <link href="https://googleapis.com" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        /* 基礎美化設定 */
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
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 24px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 850px;
            width: 100%;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: 0.3s;
        }
        .back-btn:hover { background: rgba(255, 255, 255, 0.25); transform: translateX(-5px); }

        h2, h3 { color: #ffd700; border-left: 5px solid #ffd700; padding-left: 15px; margin-top: 50px; }
        h2:first-of-type { margin-top: 0; }
        
        p.desc { background: rgba(0,0,0,0.2); padding: 10px 15px; border-radius: 8px; font-size: 0.9em; color: #ddd; }

        /* Table 樣式優化 */
        table { width: 100%; border-collapse: separate; border-spacing: 5px; margin: 20px 0; }
        td {
            background: rgba(255, 255, 255, 0.1);
            width: 50px; height: 50px;
            text-align: center; border-radius: 8px;
            transition: 0.3s; border: 1px solid rgba(255,255,255,0.05);
        }
        tr:first-child td { background: rgba(0, 0, 0, 0.2); color: #ffd700; font-weight: bold; }
        td:hover:not(:empty) { background: #ffd700; color: #333; transform: scale(1.1); }

        /* Flex 月曆 */
        .flex-calendar { margin-top: 20px; }
        .tr { display: flex; justify-content: center; }
        .flex-calendar div div {
            display: inline-flex; align-items: center; justify-content: center;
            width: 50px; height: 50px; background: rgba(255, 255, 255, 0.1);
            margin: 3px; border-radius: 8px; transition: 0.3s;
        }
        .flex-calendar .tr div:hover:not(:empty) { background: #ffd700; color: #333; }

        /* 表單與按鈕 */
        form { display: flex; gap: 10px; margin: 20px 0; }
        input[type="month"], input[type="submit"] {
            padding: 10px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.1); color: #fff;
        }
        input[type="submit"] { background: #ffd700; color: #333; font-weight: bold; cursor: pointer; }
        
        .nav-links a {
            padding: 8px 15px; background: rgba(255,255,255,0.2);
            color: #fff; text-decoration: none; border-radius: 5px; margin-right: 5px;
        }
        .nav-links a:hover { background: #ffd700; color: #333; }

        hr { border: 0; height: 1px; background: rgba(255,255,255,0.2); margin: 60px 0; }
    </style>
</head>
<body>

    <div style="width: 100%; max-width: 850px;">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
    </div>

    <div class="container">
        <h2>互動式月曆</h2>

        <?php
        // 初始邏輯
        $today = date("Y-m-d");
        $MonthDays = date("t");
        $FirstDay = date("Y-m-01");
        $FirstDayWeek = date("w", strtotime($FirstDay));
        $TotalDays = $MonthDays + $FirstDayWeek + (6 - date("w", strtotime(date("Y-m-$MonthDays"))));
        $TotalWeeks = $TotalDays / 7;
        ?>

        <!-- 結果一：基礎數字填充 -->
        <h3>1. 基礎數字填充版</h3>
        <p class="desc">使用簡單的 if 判斷式計算格子索引並填入數字。</p>
        <table>
            <tr><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td></tr>
            <?php
            for($i=0; $i < $TotalWeeks; $i++){
                echo "<tr>";
                for($j=0; $j < 7; $j++){
                    echo "<td>";
                    if($j + $i * 7 > $FirstDayWeek -1 && $j + $i *7 <= $FirstDayWeek + $MonthDays - 1){
                        echo ($j + $i * 7 - $FirstDayWeek + 1);
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <hr>

        <!-- 結果二：日期格式化版 -->
        <h3>2. 日期格式化版 (date 函式應用)</h3>
        <p class="desc">利用 strtotime 與 date("d") 確保日期輸出的一致性。</p>
        <table>
            <tr><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td></tr>
            <?php
            for($i=0; $i < $TotalWeeks; $i++){
                echo "<tr>";
                for($j=0; $j < 7; $j++){
                    echo "<td>";
                    $DayNumber = $j + $i * 7 - $FirstDayWeek + 1;
                    if($DayNumber > 0 && $DayNumber <= $MonthDays){
                        $date = date("Y-m-$DayNumber");
                        echo date("d", strtotime($date));
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>

        <hr>

        <!-- 結果三：Flexbox 佈局版 -->
        <h3>3. Flexbox 佈局版</h3>
        <p class="desc">不使用傳統 Table 標籤，改用 CSS FlexBox 進行排版練習。</p>
        <div class="flex-calendar">
            <div class="tr" style="font-weight: bold; color: #ffd700;">
                <div>日</div><div>一</div><div>二</div><div>三</div><div>四</div><div>五</div><div>六</div>
            </div>
            <?php
            for($i=0; $i < $TotalWeeks; $i++){
                echo "<div class='tr'>";
                for($j=0; $j < 7; $j++){
                    echo "<div>";
                    $DayNumber = $j + $i * 7 - $FirstDayWeek + 1;
                    if($DayNumber > 0 && $DayNumber <= $MonthDays){
                        echo $DayNumber;
                    }
                    echo "</div>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <hr>

        <!-- 結果四：互動查詢版 -->
        <h3>4. 互動查詢與導覽版</h3>
        <p class="desc">加入表單提交與月份切換功能，可即時查看不同月份。</p>
        
        <form action="03_calendar.php" method="GET">
            <input type="month" name="month" value="<?= $_GET['month'] ?? date('Y-m'); ?>">
            <input type="submit" value="查詢月份">
        </form>

        <?php
        $currMonth = $_GET['month'] ?? date("Y-m");
        $fDay = $currMonth . "-01";
        $mDays = date("t", strtotime($fDay));
        $fDayW = date("w", strtotime($fDay));
        $m = date("m", strtotime($fDay));
        $y = date("Y", strtotime($fDay));
        
        $prevM = ($m == 1) ? ($y-1)."-12" : $y."-".str_pad($m-1, 2, '0', STR_PAD_LEFT);
        $nextM = ($m == 12) ? ($y+1)."-01" : $y."-".str_pad($m+1, 2, '0', STR_PAD_LEFT);
        ?>

        <div class="nav-links" id="fixed" style="margin-bottom: 20px;">
            <a href="03_calendar.php?month=<?= $prevM ?>#fixed">◀ 上一個月</a>
            <a href="03_calendar.php?month=<?= $nextM ?>#fixed">下一個月 ▶</a>
        </div>

        <table>
            <tr><td>日</td><td>一</td><td>二</td><td>三</td><td>四</td><td>五</td><td>六</td></tr>
            <?php
            $tWeeks = ($mDays + $fDayW + (6 - date("w", strtotime($currMonth."-".$mDays)))) / 7;
            for($i=0; $i < $tWeeks; $i++){
                echo "<tr>";
                for($j=0; $j < 7; $j++){
                    echo "<td>";
                    $dNum = $j + $i * 7 - $fDayW + 1;
                    if($dNum > 0 && $dNum <= $mDays) echo $dNum;
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>