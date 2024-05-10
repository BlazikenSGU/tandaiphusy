<?php
// Kết nối CSDL và thực hiện truy vấn để lấy danh sách sản phẩm dựa trên id_category
include('../connectDB.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "SELECT * FROM product WHERE category = '$id' ";
    $stmt = $conn->prepare($sql);
    // $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();



    // Sử dụng fetch_assoc để lấy dữ liệu từ kết quả truy vấn và tạo HTML cho bảng sản phẩm
    while ($row = $result->fetch_assoc()) {

        $id_cate = $row['category'];

        $parent_query = "SELECT name FROM category WHERE id = $id_cate";
        $parent_result = $conn->query($parent_query);

        if ($parent_result->num_rows > 0) {
            $parent_row = $parent_result->fetch_assoc();
            $parent_name = $parent_row['name'];
        } else {
            $parent_name = "";
        }
?>
        <tr>
            <th scope="row">
                <?= $row['id'] ?>
            </th>
            <td>
                <?= $row['name'] ?>
            </td>
            <td>
                <?= $row['model'] ?>
            </td>
            <td>
                <?= $parent_name ?>
            </td>
            <td>
                <?= $row['cost'] ?>
            </td>
            <td class="td__img"><img src="uploads/<?= $row['image'] ?>" alt=""></td>
            <td>
                <?php $ori =  $row['createdAt'];
                $datetime = new DateTime($ori);
                $formatDatetime = $datetime->format('H:i:s d-m-Y');
                echo $formatDatetime;
                ?>
            </td>
            <td class="td__function">
                <a href="viewProduct.php?id=<?= $row['id'] ?>"><i class="far fa-eye"></i></a>
                <a href="editProduct.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                <a href="javascript:void(0);" onclick="confirmRemove(<?= $row['id'] ?>)"><i class="far fa-trash-alt"></i></a>

            </td>
        </tr>
<?php }
} else {
    echo "id null";
}

$stmt->close();
$conn->close();
