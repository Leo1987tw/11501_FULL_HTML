<?php
// 1. 必須先啟動 Session 才能找到並刪除它
session_start();

// 2. 清空所有 Session 變數內容
session_unset();

// 3. 徹底銷毀伺服器上的 Session 檔案
session_destroy();

// 4. 登出完成後，自動跳轉回登入表單頁面
header("Location: 07_loginsession.php");
exit();
?>