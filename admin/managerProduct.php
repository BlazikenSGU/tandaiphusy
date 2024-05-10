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
        <title>Product</title>
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
                    <h1 class="add_title">Quản lý sản phẩm</h1>
                    <div class="button__main">
                        <div>
                            <a href="index.php" class="btn btn-primary button__add"><i class="fas fa-arrow-left"></i></a>
                            <a href="addProduct.php" class="btn btn-primary button__add">thêm sản phẩm</a>
                        </div>

                        <div class="">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Lọc theo danh mục
                            </button>
                            <div class="dropdown-menu">
                                <?php while ($row2 = $cate2->fetch_assoc()) { ?>
                                    <a data-id=<?php echo $row2['id'] ?> class="dropdown-item" href="#">(<?php echo $row2['id'] ?>) <?php echo $row2['name'] ?></a>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="search-container">

                            <input type="text" id="getName" placeholder=" nhập tên sản phẩm">
                            <label for="search-input">
                                <i class="fas fa-search"></i>
                            </label>
                        </div>
                    </div>

                    <table class="table caption-top" id="productTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mã </th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Image</th>
                                <th scope="col">Time</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody id="showdata">
                            <?php while ($row = $product2->fetch_assoc()) {

                                $id_cate = $row['category'];

                                $parent_query = "SELECT name FROM category WHERE id = $id_cate";
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
                                        <?= $row['model'] ?>
                                    </td>
                                    <td>
                                        <?= $parent_name ?>
                                    </td>
                                    <td>
                                        <?= $row['cost'] ?>
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
                                        <a href="viewProduct.php?id=<?= $row['id'] ?>"><i class="far fa-eye"></i></a>
                                        <a href="editProduct.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
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
                    window.location.href = "removeProduct.php?id=" + id;
                } else {
                    //
                }
            }
        </script>

        <script>
            //showdata theo ma id cua danh muc
            document.addEventListener('DOMContentLoaded', function() {
                var dropdownItems = document.querySelectorAll('.dropdown-item');
                var showdata = document.getElementById('showdata');

                dropdownItems.forEach(function(item) {
                    item.addEventListener('click', function() {

                        var idCategory = item.getAttribute('data-id');


                        var xhr = new XMLHttpRequest();

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                showdata.innerHTML = xhr.responseText;
                            }
                        };

                        console.log(xhr)
                        xhr.open('GET', 'filter_product.php?id=' + idCategory, true);
                        xhr.send();
                    })
                })
            })
        </script>

        <!-- search -->
        <script>
            $(document).ready(function() {
                $('#getName').on("keyup", function() {
                    var getName = $(this).val();
                    $.ajax({
                        method: 'POST',
                        url: 'searchProduct.php',
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