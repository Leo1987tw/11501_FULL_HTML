<!-- Header -->
<header>
    <div class="header-top">
        <div class="logo">JL</div>
        <div class="company-name">晶聯合科技股份有限公司</div>
    </div>
    <nav>
        <?php

        $page=str_replace("/include/", "", $_SERVER['PHP_SELF']);

        ?>

        <a href="index.php" <?= ($page == 'index.php') ? 'class="active"' : '';?>>首頁</a>
        <a href="product.php" <?= ($page == 'product.php') ? 'class="active"' : '';?>>產品介紹</a>
        <a href="aboutus.php" <?= ($page == 'aboutus.php') ? 'class="active"' : '';?>>聯絡我們</a>
    </nav>
</header>