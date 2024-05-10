<?php
include('../connectDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $model = $_POST["model"];
    $category = $_POST["category"];
    $cost = $_POST["cost"];

    $image = $_FILES["image"]["name"];
    $image1 = $_FILES["image1"]["name"];
    $image2 = $_FILES["image2"]["name"];                                                                                                    
    $image3 = $_FILES["image3"]["name"];
    $image4 = $_FILES["image4"]["name"];
    $content = $_POST["content"];

    $name = mysqli_real_escape_string($conn, $name);
    $content = mysqli_real_escape_string($conn, $content);

    //xu ly hinh anh
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $targetFile1 = $targetDir . basename($_FILES["image1"]["name"]);
    $targetFile2 = $targetDir . basename($_FILES["image2"]["name"]);
    $targetFile3 = $targetDir . basename($_FILES["image3"]["name"]);
    $targetFile4 = $targetDir . basename($_FILES["image4"]["name"]);

    if (
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile) &&
        move_uploaded_file($_FILES["image1"]["tmp_name"], $targetFile1) &&
        move_uploaded_file($_FILES["image2"]["tmp_name"], $targetFile2) &&
        move_uploaded_file($_FILES["image3"]["tmp_name"], $targetFile3) &&
        move_uploaded_file($_FILES["image4"]["tmp_name"], $targetFile4)
    ) {
        //upload thanh cong
    } else {
        echo "error1";
    }


    //check id chống trùng ID
    $check = "SELECT * FROM product WHERE id = '$id'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "ma san pham da ton tai.";
    } else {
        //id chua ton tai, co the them vao DB
        $sql = "INSERT INTO product (id,
                                    name,
                                    model,
                                    category,
                                    cost,
                                    image,
                                    image1,
                                    image2,
                                    image3,
                                    image4,
                                    content,
                                    createdAt
                                    )VALUES (
                                        NULL,
                                       '$name',
                                       '$model',
                                       '$category',
                                       '$cost',
                                       '$image',
                                       '$image1',
                                       '$image2',
                                       '$image3',
                                       '$image4',
                                        '$content',
                                        NULL
                                    )";
        if ($conn->query($sql) === TRUE) {

            echo '<script>
            alert("them thanh cong");
             window.location = "managerProduct.php";
             </script>';
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
