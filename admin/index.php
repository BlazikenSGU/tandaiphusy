<?php

session_start();
ob_start();

if (isset($_SESSION["role"]) && $_SESSION["role"] == 1) {

    include('../connectDB.php');
?>


    <?php
    include('head.php');
    ?>

    <head>
        <title>ADMIN DASHBOARD</title>
    </head>

    <body>



        <main class="main">
            <section class="">
                <div class=" container section">
                    <h1 class="add_title">DASHBOARD</h1>

                    <div class="admin__dash">
                        <a href="http://localhost/TANDAIPHUSY/" class="btn btn-success button__add">Trang chủ website chính</a>
                        <a href="managerCategory.php" class="btn btn-primary button__add">quản lý danh mục</a>
                        <a href="managerProduct.php" class="btn btn-primary button__add">quản lý sản phẩm</a>
                        <a href="managerNews.php" class="btn btn-primary button__add">quản lý bài viết-tin tức</a>
                        <a class="btn btn-danger" href="logout.php">Đăng xuất</a>
                    </div>



                </div>
            </section>

        </main>


        <script>
            function confirmRemove(id) {
                var confirmResult = confirm("Bạn có chắc chắn xoá ?");

                if (confirmResult) {
                    window.location.href = "remove.php?id=" + id;
                } else {
                    //
                }
            }
        </script>

    </body>

    </html>

<?php } else {
    header('location: login.php');
}
?>