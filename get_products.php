<?php
// include file connectDB.php để kết nối cơ sở dữ liệu
include('connectDB.php');

// Kiểm tra xem yêu cầu AJAX có chứa categoryId không
if(isset($_POST['categoryId'])) {
    // Lấy categoryId từ yêu cầu POST
    $categoryId = $_POST['categoryId'];
    
    // Truy vấn cơ sở dữ liệu để lấy các sản phẩm thuộc categoryId
    $sql = "SELECT * FROM product WHERE category = $categoryId";
    $result = $conn->query($sql);

    // Tạo một biến HTML để chứa danh sách sản phẩm
    $output = '';

    // Kiểm tra xem có sản phẩm nào được trả về từ cơ sở dữ liệu không
    if ($result->num_rows > 0) {
        // Lặp qua các hàng dữ liệu và tạo HTML cho mỗi sản phẩm
        while ($row = $result->fetch_assoc()) {
            $output .= '<div class="product-show">';
            $output .= '<img src="admin/uploads/'. $row['image'] .'" alt="">';
            $output .= '<h3>' . $row['name'] . '</h3>';
            $output .= '<h3>Mã: ' . $row['model'] . '</h3>';
            $output .= '<span>Giá: ' . $row['cost'] . '</span>';
            $output .= '<a href="product-detail.php?id='.$row['id'].'">Xem thêm</a href="#">';
            $output .= '</div>';
        }
    } else {
        // Nếu không có sản phẩm nào thuộc category này, hiển thị thông báo không có sản phẩm
        $output = '<p>Không có sản phẩm nào.</p>';
    }

    // Trả về dữ liệu HTML của sản phẩm
    echo $output;
}
?>
