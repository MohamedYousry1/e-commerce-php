<?php
session_start();
if (isset($_POST['addProduct'])) {
    // extract
    $category    = trim(htmlspecialchars($_POST['category']));
    $title       = trim(htmlspecialchars($_POST['title']));
    $description = trim(htmlspecialchars($_POST['description']));
    $price       = trim(htmlspecialchars($_POST['price']));
    $quantity    = trim(htmlspecialchars($_POST['quantity']));

    $img = $_FILES['img'];
    $imgName = $img['name'];
    $tmpName = $img['tmp_name'];
    $ext = pathinfo($imgName, PATHINFO_EXTENSION);
    $extenstions = ['jpeg', 'jpg', 'png'];
    $imgNewName = uniqid() . "." . $ext;

    // Validation
    $errors = [];
    if (empty($category) || empty($title) || empty($price) || empty($quantity)) {
        $errors[] = "Please Fill All Fileds";
    }

    if(empty($imgName)){
        $errors[] = "Image Required";
    }elseif($img['error'] != 0){
        $errors[] = "Failde File";
    }elseif(!in_array($ext,$extenstions)){
        $errors[] = "File Must Be 'jpeg', 'jpg', 'png' ";
    }

    // store errors if exist
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['category'] = $category;
        $_SESSION['title'] = $title;
        $_SESSION['description'] = $description;
        $_SESSION['price'] = $price;
        $_SESSION['quantity'] = $quantity;
        header('location:../view/addProduct.php');
        exit();
    }

    // Store
    $_SESSION['productS'][] = [
        "category"    => $category,
        "title"       => $title,
        "description" => $description,
        "price"       => $price,
        "quantity"    => $quantity,
        "imgNewName"  => $imgNewName
    ];

    // Upload Img
    move_uploaded_file($tmpName, "../upload/" . $imgNewName);

    // Success msg
    $_SESSION['success'] = "Product created successfully";
    header("location:../view/addProduct.php");
    exit();
}
