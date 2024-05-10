<?php
include('../connectDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $id_parent = $_POST["id_parent"];


    $name = mysqli_real_escape_string($conn, $name);

    //check id chống trùng ID
    $check = "SELECT * FROM product WHERE id = '$id'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "ma san pham da ton tai.";
    } else {
        //id chua ton tai, co the them vao DB
        $sql = "INSERT INTO category (id,
                                    name,
                                    id_parent,
                                    createdAt
                                    )VALUES (
                                        NULL,
                                       '$name',
                                       '$id_parent',
                                        NULL
                                    )";
        if ($conn->query($sql) === TRUE) {

            echo '<script>
            alert("them thanh cong");
             window.location = "managerCategory.php";
             </script>';
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
