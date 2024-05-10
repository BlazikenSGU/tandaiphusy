<?php
$conn = mysqli_connect("localhost", "root", "", "keopur")
    or die('connect fail');

// product
$product = $conn->prepare("SELECT * FROM product");
$product->execute();

$product2 = $product->get_result();

//category
$cate = $conn->prepare("SELECT * FROM category");
$cate->execute();

$cate2 = $cate->get_result();


//sap xep news
$stmt = $conn->prepare("SELECT * FROM news ORDER BY createdAt DESC");
$stmt->execute();

$news = $stmt->get_result();

// lay ra title random
$check = $conn->prepare("SELECT * FROM news ORDER BY RAND() LIMIT 4");
$check->execute();

$check2 = $check->get_result();


// lay ra user de dang nhap admin
$user = $conn->prepare("SELECT * FROM users");
$user->execute();

$user2 = $user->get_result();
