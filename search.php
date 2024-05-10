<?php
include('connectDB.php');

if(isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];

    $sql = "SELECT * FROM product WHERE name LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product-show">';
            echo '<img src="admin/uploads/'. $row['image'] .'" alt="">';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<h3>Mã: ' . $row['model'] . '</h3>';
            echo '<span>Giá: ' . $row['cost'] . '</span>';
            echo '<a href="product-detail.php">Xem thêm</a>';
            echo '</div>';
        }
    } else {
        echo '<p> Không tìm thấy sản phẩm nào. </p>';
    }
}
?>
