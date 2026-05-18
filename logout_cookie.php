<?php
// 把時間設為負數（過去的時間），瀏覽器就會立刻刪除它
setcookie('usernamelogin', '', time() - 3600);

// 導回登入頁
header("Location: 06_logincookie.php");
exit();
?>