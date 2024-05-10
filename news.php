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

            <h1 class="news-title">DỊCH VỤ</h1>

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
    </main>

    <?php
    include('footer.php');
    ?>

    <!-- scroll up -->


</body>

</html>