<?php
session_start();
require_once 'validateLogin.php';
if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {

    // extract data from the form
    $email    = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));


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

    if (isset($_SESSION['users'])) {

        // store errors if exist
        if (!empty($errors)) {
            $_SESSION['errors']   = $errors;
            $_SESSION['email']    = $email;
            header('location:../login.php');
            exit();
        }

        // Action
        // check email and password is same as signed up
        $emails = array_column($_SESSION['users'], 'email'); // return all emails that exist in session of user (stored data of user)
        $index = array_search($email, $emails); // array_search return index of User using email(that try to login) if is exist in emails
        $passwordHashed = $_SESSION['users'][$index]['password'];

        if (in_array($email, $emails) && password_verify($password, $passwordHashed)) {
            $name = $_SESSION['users'][$index]['username'];
            $_SESSION['login'] = true; // to logout
            $_SESSION['name'] = $name;
            $_SESSION['success'] = "Welcome $name";
            header('location:../shop.php');
            exit();
        } else {
            $_SESSION['errors'] = ['Invalid Credintials'];
            header('location:../login.php');
            exit();
        }
    } else {
        $_SESSION['email'] = $email;
        header('location:../signup.php');
        exit();
    }

} else {
    header('location:../signup.php');
    exit();
}
