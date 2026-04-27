<?php
session_start();
require_once 'validateSignup.php';
if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    // extract data from the form
    $username = trim(htmlspecialchars($_POST['username']));
    $email    = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $phone    = trim(htmlspecialchars($_POST['phone']));
    $address  = trim(htmlspecialchars($_POST['address']));

    //Validate
    $errors = [];
    foreach ($validation as $key => $value) {
        $check = filter_input(INPUT_POST, $key, $value['filter_type'], $value['myOptions']);

        // check if error exist
        if (empty($_POST[$key])) { // اللى جايلى من الفورم
            $errors[$key] = "$key Required";
        } elseif (!$check) { // if $check is false
            $errors[] = $value['errors'];
        }
    }
    // store errors if exist
    if (!empty($errors)) {
        $_SESSION['errors']   = $errors;
        $_SESSION['username'] = $username;
        $_SESSION['email']    = $email;
        $_SESSION['phone']    = $phone;
        header('location:../signup.php');
        exit();
    }
    // Store users Data
    $_SESSION['users'][] = [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'phone' => $phone,
    ];
    // header me to login page with email
    $_SESSION['email'] = $email;
    header('location:../login.php');
    exit();
}
