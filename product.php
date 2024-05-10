<?php
include('connectDB.php');
?>

<!DOCTYPE html>
<html lang="en">


<?php
include('head.php');
?>

<body>

    <?php
    include('header.php');
    ?>

    <main class="main">

        <section class="viewlist section container">

            <h1 class="news-title">SẢN PHẨM</h1>

            <div class="product-main">
                <div class="product-tool">
                    <div class="product-search">
                        <label for="">Tìm kiếm</label>
                        <input type="search" id="searchInput" name="searchInput">
                    </div>

                    <div class="name-menu">
                        <label for=""><a href="">Danh mục <i class="ri-restart-line"></i></a></label>
                        <ul class="menu">

                            <?php
                            $rows = array();
                            while ($row = $cate2->fetch_assoc()) {
                                $rows[] = $row;
                            }
                            foreach ($rows as $row) {
                                if ($row['id_parent'] == 0) {
                                    echo '<li>
                                        <a href="#" class="categoryLink" data-category="' . $row['id'] . '" >' . $row['name'] . '</a>
                                        <ul class="submenu">';
                                    foreach ($rows as $row2) {
                                        if ($row['id'] == $row2['id_parent']) {
                                            echo ' <li><a href="#" class="categoryLink" data-category="' . $row2['id'] . '" >' . $row2['name'] . '</a></li>';
                                        }
                                    }
                                    echo '</ul>
                                            </li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div>

                    </div>
                </div>
                <div class="product-item">

                    <div class="product-list" id="productList">
                        <?php while ($row = $product2->fetch_assoc()) { ?>
                            <div class="product-show">
                                <img src="admin/uploads/<?= $row['image'] ?>" alt="">
                                <h3>
                                    <?= $row['name'] ?>
                                </h3>
                                <h3>Mã:
                                    <?= $row['model'] ?>
                                </h3>
                                <span>Giá:
                                    <?php
                                    if ($row['cost'] == 0) {
                                        echo 'Liên Hệ';
                                    } else {
                                        echo $row['cost'];
                                    }
                                    ?>
                                </span>
                                <a href="product-detail.php?id=<?= $row['id']?>">Xem thêm</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    include('footer.php');
    ?>

    <!-- view follow name category -->
    <script>
        $(document).ready(function () {
            // Sự kiện click cho từng thẻ a category
            $(".categoryLink").click(function (e) {
                e.preventDefault();
                var categoryId = $(this).data("category");

                // Gửi yêu cầu AJAX để lấy sản phẩm của category được chọn
                $.ajax({
                    url: "get_products.php",
                    method: "POST",
                    data: { categoryId: categoryId },
                    success: function (response) {
                        // Hiển thị sản phẩm trong #productList
                        $("#productList").html(response);
                    },
                    error: function () {
                        alert("Đã xảy ra lỗi khi tải sản phẩm.");
                    }
                });
            });
        });
    </script>

    <!-- search -->
    <script>
        $(document).ready(function () {
            var initialSearchResult = $('#productList').html();

            $('#searchInput').on('input', function () {
                var keyword = $(this).val().trim();

                if (keyword.length >= 1 || keyword === '') {
                    if (keyword === '') {
                        $('#productList').html(initialSearchResult);
                    } else {
                        $.ajax({
                            method: 'POST',
                            url: 'search.php',
                            data: {
                                keyword: keyword
                            },
                            success: function (response) {
                                $("#productList").html(response);
                            }
                        });
                    }
                }
            });
        });
    </script>

</body>

</html>