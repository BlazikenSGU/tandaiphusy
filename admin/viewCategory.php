<?php
include('../connectDB.php');

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM category WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $get_item = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>

    <link rel="stylesheet" href="admin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.1/css/all.min.css" integrity="sha512-/RUbtHakVMJrg1ILtwvDIceb/cDkk97rWKvfnFSTOmNbytCyEylutDqeEr9adIBye3suD3RfcsXLOLBqYRW4gw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container_view">

        <button id="url" class="btn btn-secondary back" type="button">
            <i class="fas fa-arrow-left"></i>
        </button>

        <h1 class="add_title">Xem danh mục</h1>
        <?php if ($row = $get_item->fetch_assoc()) {

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

            <form action="" method="post" class="add__news">

                <div class="subbb_1">
                    <div class="subbb_2">
                        <span>#</span>
                        <input type="text" readonly value="<?= $row['id'] ?>">
                    </div>

                </div>

                <div class="subbb_1">

                </div>

                <span>tên danh mục</span>
                <input type="text" readonly value="<?= $row['name'] ?>">

                <span>danh mục cha</span>
                <input type="text" readonly value="<?= $parent_name ?>">





                <span>time: </span>
                <input type="text" readonly value="<?php
                                                    $ori = $row['createdAt'];
                                                    $datetime = new DateTime($ori);
                                                    $formatDatetime = $datetime->format('H:i:s d-m-Y');
                                                    echo $formatDatetime;
                                                    ?>">
                <br>

            </form>
        <?php } ?>
    </div>

    <script src="../assets/js/back.js"></script>
</body>

</html>