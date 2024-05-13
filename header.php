<?php
include ('connectDB.php');
?>


<header class="header" id="header">
    <nav class="nav container">
        <a href="home" class="nav__logo">
            <img src="assets/img/logoo.png" alt="">
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="home" class="nav__link">Trang chủ</a>
                </li>
                <li class="nav__item">
                    <a href="about.php" class="nav__link">Thông tin</a>
                </li>
                <li class="nav__item">
                    <div class="dropdown">
                        <a href="product.php" class="nav__link dropdown-toggle">Sản phẩm</a>
                        <div class="dropdown-menu-product">
                            <?php
                            $rows = array();
                            while ($row = $cate2->fetch_assoc()) {
                                $rows[] = $row;
                            }
                            foreach ($rows as $row) { ?>

                                <?php if ($row['id_parent'] == 0 && isset($row['name'])) { ?>
                                    <div class="label">
                                        <a href="product.php?id=<?= $row['id']?>"><?= $row['name'] ?></a>

                                        <?php $submenus = array();
                                        foreach ($rows as $row2) {
                                            if ($row2['id_parent'] == $row['id']) {
                                                $submenus[] = $row2;
                                            }
                                        }
                                        if (!empty($submenus)) { ?>
                                            <div class="submenu">
                                                <?php foreach ($submenus as $submenu) {
                                                    ?>
                                                    <a href="product.php?id=<?= $submenu['id']?>"><?= $submenu['name'] ?></a>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php }
                            }
                            unset($rows);
                            ?>

                        </div>
                    </div>
                </li>

                <li class="nav__item">
                    <a href="news" class="nav__link">Dịch Vụ</a>
                </li>
                <li class="nav__item">
                    <a href="duan.php" class="nav__link">Dự Án</a>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-circle-line"></i>
            </div>
        </div>

        <div class="nav__btns">

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i>
            </div>
        </div>



    </nav>

</header>