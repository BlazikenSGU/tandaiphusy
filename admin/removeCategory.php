<?php 
    include('../connectDB.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM category WHERE id = $id";

        if($conn->query($sql) === TRUE){
            echo '
            <script>window.location = "managerCategory.php";</script>';
        }else{
            echo "error";
        }
    }else{
        echo "ID khong ton tai";
    }


    mysqli_close($conn);
?>