<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>字串處理練習</title>
    <!-- 引入與首頁相同的字體 -->
    <link href="https://googleapis.com" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="back-nav">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
    </div>

    <div class="container">
        <h2>字串取代</h2>
        <p>將”aaddw1123”改成”*********”</p>
        <div class="output-section">
            <?php
            $string = "aaddw1123";
            echo "$string";
            echo "<br>";
            echo str_replace(["a", "d", "w", "1", "2", "3"], "*", $string); // 字元取代
            echo "<br>";
            echo str_repeat("*", mb_strlen($string)); // 字元重覆
            ?>
        </div>

        <h2>字串分割</h2>
        <p>將”this,is,a,book”依”,”切割後成為陣列</p>
        <div class="output-section">
            <?php
            $string = "this is a book";
            echo $string;
            echo "<br>";
            $array = explode(" ", $string); // 字元分割
            echo "<pre>";
            print_r($array);
            echo "</pre>";
            ?>
        </div>

        <h2>字串組合</h2>
        <p>將上例陣列重新組合成“this is a book”</p>
        <div class="output-section">
            <?php
            echo "<pre>";
            print_r($array);
            echo "</pre>";
            $string_again = join(" ", $array); // 字元合併
            echo $string;
            ?>
        </div>

        <h2>子字串取用</h2>
        <p>將” The reason why a great man is great is that he resolves to be a great man”只取前十字成為” The reason…”</p>
        <div class="output-section">
            <?php
            $string = "The reason why a great man is great is that he resolves to be a great man";
            echo "$string";
            echo "<br>";
            $short = substr($string, 0, 10); // 選取字串
            echo $short . "...";
            echo "<br>";
            echo substr($string, 0, -20);
            echo "<br>";
            echo substr($string, -20, 10);
            ?>
        </div>

        <h2>尋找字串與HTML、css整合應用</h2>
        <ul>
            <li>給定一個句子，將指定的關鍵字放大</li>
            <li>“學會PHP網頁程式設計，薪水會加倍，工作會好找”</li>
            <li>請將上句中的 “程式設計” 放大字型或變色.</li>
        </ul>
        <div class="output-section">
            <?php
            $string = "學會PHP網頁程式設計，薪水會加倍，工作會好找";
            echo "$string";
            echo "<br>";
            $keyword = "程式設計";
            $temporary = "<span style='color: #00d2ff; font-size: 24px; font-weight: bold;'>$keyword</span>";

            if(strpos($string, $keyword) > 0){
                $string = str_replace($keyword, $temporary, $string);
            }
            echo $string;
            echo "<br>";

            $string = "學習程式設計就像是一場充滿驚喜的馬拉松。剛才我們一起看了 PHP 的字串處理和 HTML5 Canvas 的繪圖技巧，這讓我想到，寫程式最迷人的地方就在於那份「精準」。有時候，只是一個漏掉的分號或是用錯的引號，就能讓整段代碼停擺。但正是這些小細節，鍛鍊了我們解決問題的邏輯。無論是在處理複雜的字串擷取，還是調整網頁上的漸層顏色，每一行程式碼都是在構建你腦中的藍圖。不要被螢幕上紅色的錯誤訊息給嚇到，把它們看作是通往成功的提示。當你最後成功在瀏覽器上看到預期的成果時，那種成就感是無與倫比的。保持好奇心，繼續探索這個充滿邏輯的美麗世界吧！";
            $keywords = ["程式設計", "馬拉松", "迷人"];
            $temporary = [];
            foreach($keywords as $keyword){
                $temporary[] = "<a href='#' style='color: #00d2ff; font-size: 24px; font-weight: bold; text-decoration: none;'>$keyword</a>";
            }
            $string = str_replace($keywords, $temporary, $string);
            echo $string;
            echo "<br>";
            ?>
        </div>
    </div>
</body>
</html>