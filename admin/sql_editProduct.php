<?php
include('../connectDB.php');

if (isset($_POST['save'])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $model = $_POST["model"];
    $category = $_POST["category"];
    $cost = $_POST["cost"];


    if (isset($_FILES['image_new']) && $_FILES['image_new']['error'] === UPLOAD_ERR_OK) {
        $image_temp = $_FILES['image_new']['tmp_name'];
        $image_new = 'uploads/' . $_FILES['image_new']['name'];

        if (move_uploaded_file($image_temp, $image_new)) {
            // Nếu di chuyển thành công, cập nhật giá trị $image
            $image = $_FILES['image_new']['name'];
        } else {
            // Nếu di chuyển không thành công, giữ nguyên giá trị cũ của $image
            $image = $_POST["image"];
        }
    } else {
        // Nếu không có tệp hình ảnh mới được tải lên, giữ nguyên giá trị cũ của $image
        $image = $_POST["image"];
    }

    $image1 = isset($_FILES['image1_new']) && $_FILES['image1_new']['error'] === UPLOAD_ERR_OK ? $_FILES['image1_new']['name'] : $_POST["image1"];
    $image2 = isset($_FILES['image2_new']) && $_FILES['image2_new']['error'] === UPLOAD_ERR_OK ? $_FILES['image2_new']['name'] : $_POST["image2"];
    $image3 = isset($_FILES['image3_new']) && $_FILES['image3_new']['error'] === UPLOAD_ERR_OK ? $_FILES['image3_new']['name'] : $_POST["image3"];
    $image4 = isset($_FILES['image4_new']) && $_FILES['image4_new']['error'] === UPLOAD_ERR_OK ? $_FILES['image4_new']['name'] : $_POST["image4"];

    $content = $_POST["content"];

    $sql  = "UPDATE product SET
                        name = '$name',
                        model = '$model',
                        category = '$category',
                        cost = '$cost',
                        image = '$image',
                        image1 = '$image1',
                        image2 = '$image2', 
                        image3 = '$image3',
                        image4 = '$image4',
                        content = '$content'
                        WHERE id = $id
                        ";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
                alert("update thành công");
                window.location = "managerProduct.php";
            </script>';
    } else {
        echo '<script>
                alert("error update");
                window.location = "editProduct.php?id=' . $id . '";
            </script>';
    }

    mysqli_close($conn);
}
