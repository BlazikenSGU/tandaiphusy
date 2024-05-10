<?php
include('../connectDB.php');

if (isset($_POST['save'])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $id_parent = $_POST["id_parent"];


    $name = mysqli_real_escape_string($conn, $name);

    $sql  = "UPDATE category SET
                        name = '$name',
                        id_parent = '$id_parent'
                        WHERE id = $id
                        ";

    if (mysqli_query($conn, $sql)) {
        echo '<script>
                alert("update thành công");
                window.location = "managerCategory.php";
            </script>';
    } else {
        echo '<script>
                alert("error update");
                window.location = "editCategory.php?id=' . $id . '";
            </script>';
    }

    mysqli_close($conn);
}
