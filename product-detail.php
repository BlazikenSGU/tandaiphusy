<?php
include ('connectDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id = '" . $id . "'";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">



<?php
include ('head.php');
?>

<body>

    <?php
    include ('header.php');
    ?>

    <main class="main">

        <section class="viewlist section container">

            <div class="product-detail">

                <button id="url" class="btn btn-primary back" type="button">
                    <i class="fas fa-arrow-left"></i>
                </button>

                <div class="product-more-info">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="product-more-info1">
                            <div class="product-info-img">
                                <!-- <img src="admin/uploads/<?= $row['image'] ?>" alt=""> -->

                                <section class="show-slider-img">
                                    <div class="slider-for">
                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image']) ? $row['image'] : '' ?>" alt=""
                                                style="width:100%">
                                        </div>
                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image1']) ? $row['image1'] : '' ?>"
                                                alt="" style="width:100%">
                                        </div>
                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image2']) ? $row['image2'] : '' ?>"
                                                alt="" style="width:100%">
                                        </div>
                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image3']) ? $row['image3'] : '' ?>"
                                                alt="" style="width:100%">
                                        </div>
                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image4']) ? $row['image4'] : '' ?>"
                                                alt="" style="width:100%">
                                        </div>
                                    </div>
                                    <div class="slider-nav">
                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image']) ? $row['image'] : '' ?>" alt=""
                                                style="width:100%">
                                        </div>

                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image1']) ? $row['image1'] : '' ?>"
                                                alt="" style="width:100%">
                                        </div>

                                        <div>
                                            <img src="admin/uploads/<?= isset($row['image2']) ? $row['image2'] : '' ?>"
                                                alt="" style="width:100%">
                                        </div>
                                        
                                        <?php if(isset($row['image3'])): ?>
                                        <div>
                                            <img src="admin/uploads/<?= $row['image3']?>"
                                                alt="" style="width:100%">
                                        </div>
                                        <?php endif; ?>

                                        <?php if(isset($row['image4'])): ?>
                                        <div>
                                            <img src="admin/uploads/<?= $row['image4']?>"
                                                alt="" style="width:100%">
                                        </div>
                                        <?php endif; ?>

                                    </div>
                                </section>
                            </div>

                            <div class="product-info-title">
                                <h2><?= $row['name'] ?> </h2>
                                <p>Mã: <?= $row['model'] ?></p>
                                <p style="text-transform: capitalize;">
                                    Danh mục:
                                    <?php while ($row2 = $cate2->fetch_assoc()) {
                                        if ($row2['id'] == $row['category']) {
                                            echo $row2['name'];
                                        }
                                    } ?>
                                </p>
                                <p>Giá: <?= $row['cost'] ?></p>
                                <p>Liên Hệ : 096 355 1514</p>
                                <button><a href="">Liên Hệ</a></button>
                            </div>
                        </div>

                        <div class="product-more-info2">
                            <h1 style="text-align:center">Mô tả sản phẩm</h1>
                            <p><?php
                            $content = $row['content'];
                            $content = preg_replace('/<img(.*?)src="(.*?)"(.*?)>/i', '<img$1src="admin/$2"$3>', $content);
                            echo $content;
                            ?>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </section>
    </main>

    <?php
    include ('footer.php');
    ?>

    <!-- scroll up -->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-circle-line scrollup__icon"></i>
    </a>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/back.js"></script>

    <script>

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            asNavFor: '.slider-nav'
        });


        $('.slider-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            centerMode: true,
            focusOnSelect: true
        });



    </script>

</body>

</html>