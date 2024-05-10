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
        <title>NEWS</title>
    </head>

    <body>

        <header class="header">
            <nav>
                <div class="nav container">

                </div>
            </nav>
        </header>

        <main class="main">
            <section class="">
                <div class=" container section">
                    <h1 class="add_title">Quản lý bài viết</h1>
                    <a href="add.php" class="btn btn-primary button__add">Thêm bài viết</a>
                    <a href="http://localhost/TANDAIPHUSY/" class="btn btn-success">Trang chủ Client</a>
                    <a class="btn btn-primary" href="logout.php">Đăng xuất</a>
                    <table class="table caption-top">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Image đại diện</th>
                                <th scope="col">Thời gian tạo</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $news->fetch_assoc()) { ?>
                                <tr>
                                    <th scope="row">
                                        <?= $row['id'] ?>
                                    </th>
                                    <td>
                                        <?= $row['title'] ?>
                                    </td>
                                    <td class="td__img"><img src="uploads/<?= $row['image'] ?>" alt=""></td>
                                    <td>
                                        <?php $ori =  $row['createdAt'];
                                        $datetime = new DateTime($ori);
                                        $formatDatetime = $datetime->format('H:i:s d-m-Y');
                                        echo $formatDatetime;
                                        ?>
                                    </td>
                                    <td class="td__function">
                                        <a href="view.php?id=<?= $row['id'] ?>"><i class="far fa-eye"></i></a>
                                        <a href="edit.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0);" onclick="confirmRemove(<?= $row['id'] ?>)"><i class="far fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </section>

        </main>
        <footer>

        </footer>

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