<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>08. 檔案拆分</title>
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
    </style>
</head>
<body>

<div style="width: 100%; max-width: 600px; display: flex;">
        <a href="./index.html" class="back-btn">← 返回前頁</a>
</div>

<h2>08. 檔案拆分</h2>

<ul>
    <li>可以將檔案拆分成多部分，在不同的頁面連結共同檔案，方便維護</li>
    <li>include 為非必要包含，require 為必要包含</li>
</ul>

<a href="./include/index.php">拆分範例</a>
    
</body>
</html>