<?php
include('connectDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id = '" . $id . "'";
    $result = $conn->query($sql);
}



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

            <div class="product-detail">
                <div class="product-link">
                    Trang chủ/Sản Phẩm/REINER/AIR COMPRESSOR/REINER SIMPLE (RVL)/RVL – ( 5.5KW ~ 132KW )
                </div>

                <div class="product-more-info">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <div class="product-more-info1">
                            <div class="product-info-img">
                                <img src="admin/uploads/<?= $row['image']?>" alt="">
                            </div>

                            <div class="product-info-title">
                                <h2><?= $row['name']?> </h2>
                                <h2>Model : RVL (Single stage – Inverter)</h2>
                                <p>Liên Hệ : 096 355 15 14</p>
                                <p>Gia: Lien he</p>
                                <button><a href="">Lien he</a></button>
                            </div>
                        </div>

                        <div class="product-more-info2">
                            <h1>mo ta</h1>
                            <p>MÁY NÉN KHÍ HIỆU REINER – MODEL RVL
                                Máy nén khí Reiner được sử dụng Motor Inverter đạt tiêu chuẩn IE4 (từ trường vĩnh cửu) ,
                                Permanent magnet motor PMM
                                Cấp bảo vệ động cơ IP55 chống bụi mịn và nước áp lực cao
                                Chi phí phụ tùng bảo trì giá thấp hơn các nhãn hiệu khác ít nhất là 40%.
                                Máy được bảo hành 2 năm cho toàn bộ , riêng buồng nén 5 năm (Bảo hành thay mới 100% với bộ
                                phận bị hư Không sữa chữa).
                                Đạt tiêu chuẩn chất lượng CHÂU ÂU- CE marking (certification of international organizations
                                – ECM).
                                QUỐC TẾ ISO 9001-2015, ISO14001:2015 được chứng nhận bởi tổ chức Tổ chức Quốc tế (IAF)
                                Chi phí phụ tùng bảo trì giá thấp hơn các nhãn hiệu khác
                                <br>

                                MÁY NÉN KHÍ HIỆU REINER – MODEL RVL
                                Máy nén khí Reiner được sử dụng Motor Inverter đạt tiêu chuẩn IE4 (từ trường vĩnh cửu) ,
                                Permanent magnet motor PMM
                                Cấp bảo vệ động cơ IP55 chống bụi mịn và nước áp lực cao
                                Chi phí phụ tùng bảo trì giá thấp hơn các nhãn hiệu khác ít nhất là 40%.
                                Máy được bảo hành 2 năm cho toàn bộ , riêng buồng nén 5 năm (Bảo hành thay mới 100% với bộ
                                phận bị hư Không sữa chữa).
                                Đạt tiêu chuẩn chất lượng CHÂU ÂU- CE marking (certification of international organizations
                                – ECM).
                                QUỐC TẾ ISO 9001-2015, ISO14001:2015 được chứng nhận bởi tổ chức Tổ chức Quốc tế (IAF)
                                Chi phí phụ tùng bảo trì giá thấp hơn các nhãn hiệu khác
                                <br>

                                MÁY NÉN KHÍ HIỆU REINER – MODEL RVL
                                Máy nén khí Reiner được sử dụng Motor Inverter đạt tiêu chuẩn IE4 (từ trường vĩnh cửu) ,
                                Permanent magnet motor PMM
                                Cấp bảo vệ động cơ IP55 chống bụi mịn và nước áp lực cao
                                Chi phí phụ tùng bảo trì giá thấp hơn các nhãn hiệu khác ít nhất là 40%.
                                Máy được bảo hành 2 năm cho toàn bộ , riêng buồng nén 5 năm (Bảo hành thay mới 100% với bộ
                                phận bị hư Không sữa chữa).
                                Đạt tiêu chuẩn chất lượng CHÂU ÂU- CE marking (certification of international organizations
                                – ECM).
                                QUỐC TẾ ISO 9001-2015, ISO14001:2015 được chứng nhận bởi tổ chức Tổ chức Quốc tế (IAF)
                                Chi phí phụ tùng bảo trì giá thấp hơn các nhãn hiệu khác
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>








        </section>
    </main>

    <?php
    include('footer.php');
    ?>

    <!-- scroll up -->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-circle-line scrollup__icon"></i>
    </a>

    <script src="assets/js/main.js"></script>

</body>

</html>