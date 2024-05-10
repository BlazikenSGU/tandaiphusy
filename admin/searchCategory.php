<?php
include('../connectDB.php');

$name = $_POST['name'];
$escaped_name = mysqli_real_escape_string($conn, $name);

if (strpos($name, "'") !== false) {
    echo "<span style='color:red;'> Không nhập ký tự đặc biệt này!<span/>";
} else {
    $sql = "SELECT * FROM  category  WHERE name LIKE '%$escaped_name%' ";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) == 0) {
        echo "<span style='color:red;'> Không tìm thấy </span>";
    } else {
        while ($row = mysqli_fetch_assoc($query)) {

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
            <tr>
                <th scope="row">
                    <?= $row['id'] ?>
                </th>
                <td>
                    <?= $row['name'] ?>
                </td>
                <td>
                    <?= $parent_name ?> (<?= $row['id_parent'] ?>)
                </td>
                <td>
                    <?php $ori =  $row['createdAt'];
                    $datetime = new DateTime($ori);
                    $formatDatetime = $datetime->format('H:i:s d-m-Y');
                    echo $formatDatetime;
                    ?>
                </td>
                <td class="td__function">
                    <a href="viewCategory.php?id=<?= $row['id'] ?>"><i class="far fa-eye"></i></a>
                    <a href="editCategory.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>
                    <a href="javascript:void(0);" onclick="confirmRemove(<?= $row['id'] ?>)"><i class="far fa-trash-alt"></i></a>
                </td>
            </tr>
<?php }
    }
}
?>