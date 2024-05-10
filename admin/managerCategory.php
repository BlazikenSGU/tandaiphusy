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
        <title>Danh mục</title>
    </head>

    <body>

        <!-- <header class="header">
            <nav>
                <div class="nav container">

                </div>
            </nav>
        </header> -->

        <main class="main">
            <section class="">
                <div class=" container section">
                    <h1 class="add_title">Quản lý danh mục</h1>


                    <div class="button__main">
                        <div>
                            <a href="index.php" class="btn btn-primary button__add"><i class="fas fa-arrow-left"></i></a>
                            <a href="addCategory.php" class="btn btn-primary button__add">thêm danh mục</a>
                        </div>

                        <div class="search-container">
                            <input type="text" id="getName" placeholder=" nhập tên danh mục">
                            <label for="search-input">
                                <i class="fas fa-search"></i>
                            </label>
                        </div>
                    </div>


                    <table class="table caption-top">

                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Danh mục cha</th>
                                <th scope="col">Thời gian tạo</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                            <?php while ($row = $cate2->fetch_assoc()) {

                                //check danh muc cha
                                $id_parent = $row['id_parent'];

                                $parent_query = "SELECT name FROM category WHERE id = $id_parent";
                                $parent_result = $conn->query($parent_query);

                                if ($parent_result->num_rows > 0) {
                                    $parent_row = $parent_result->fetch_assoc();
                                    $parent_name = $parent_row['name'];
                                } else {
                                    $parent_name = "";
                                }

                            ?>
                                <tr>
                                    <th scope="row">
                                        <?= $row['id'] ?>
                                    </th>
                                    <td>
                                        <?= $row['name'] ?>
                                    </td>
                                    <td>
                                        <?= $parent_name ?> (<?= $row['id_parent'] ?>)
                                    </td>

                                    <td>
                                        <?php $ori =  $row['createdAt'];
                                        $datetime = new DateTime($ori);
                                        $formatDatetime = $datetime->format('H:i:s d-m-Y');
                                        echo $formatDatetime;
                                        ?>
                                    </td>
                                    <td class="td__function">
                                        <a href="viewCategory.php?id=<?= $row['id'] ?>"><i class="far fa-eye"></i></a>
                                        <a href="editCategory.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
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
                    window.location.href = "removeCategory.php?id=" + id;
                } else {
                    //
                }
            }
        </script>

        <script>
            $(document).ready(function() {
                $('#getName').on("keyup", function() {
                    var getName = $(this).val();
                    $.ajax({
                        method: 'POST',
                        url: 'searchCategory.php',
                        data: {
                            name: getName
                        },
                        success: function(response) {
                            $("#showdata").html(response);
                        }
                    });
                });
            });
        </script>

    </body>

    </html>

<?php } else {
    header('location: login.php');
}
?>