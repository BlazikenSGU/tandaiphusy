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

            <h1 class="news-title">THÔNG TIN VỀ CHÚNG TÔI</h1>

            <div class="grid-container">

                <?php while ($row = $news->fetch_assoc()) { ?>
                    <div class="new">
                        <img src="admin/uploads/<?= $row['image'] ?>" alt="">
                        <div class="info">
                            <a href="new-detail/<?= $row['id'] ?>">
                                <h3>
                                    <?= $row['title'] ?>
                                </h3>
                                <span>
                                    <i class="ri-time-line"></i>:
                                    <?php $ori = $row['createdAt'];
                                    $datetime = new DateTime($ori);
                                    $formatDatetime = $datetime->format('H:i:s d-m-Y');

                                    echo $formatDatetime;
                                    ?>
                                </span>
                            </a>
                        </div>

                    </div>
                <?php } ?>

            </div>


        </section>

        <section class="contact section container">
            <div class="contact__container grid">
                <div class="contact__box">
                    <h2 class="section__title">
                        Gửi thông tin cho <br> chúng tôi
                    </h2>

                    <div class="contact__data">
                        <div class="contact__infomation">
                            <h3 class="contact__subtitle"> Gọi cho chúng tôi để được tư vấn</h3>
                            <span class="contact__description">
                                <i class="ri-phone-line"></i>
                                +84 911 397 916
                            </span>
                        </div>

                        <div class="contact__infomation">
                            <h3 class="contact__subtitle"> Gửi thông tin cần hỗ trợ qua Email</h3>
                            <span class="contact__description">
                                <i class="ri-mail-line"></i>
                                giacongclc@gmail.com
                            </span>
                        </div>
                    </div>
                </div>

                <form action="" class="contact__form">
                    <div class="contact__inputs">
                        <div class="contact__content">
                            <input type="email" placeholder=" " class="contact__input">
                            <label for="" class="contact__label">Email</label>
                        </div>

                        <div class="contact__content">
                            <input type="text" placeholder=" " class="contact__input">
                            <label for="" class="contact__label">Subject</label>
                        </div>

                        <div class="contact__content contact__area">
                            <textarea name="message" placeholder=" " class="contact__input" id="" cols="30" rows="5"></textarea>

                            <label for="" class="contact__label">Message</label>
                        </div>
                    </div>

                    <button class="button button--flex" disabled>
                        Gửi ngay
                        <i class="ri-arrow-right-up-line button-icon"></i>
                    </button>
                </form>

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