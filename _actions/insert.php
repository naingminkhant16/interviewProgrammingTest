<?php
require "config.php";
if ($_POST) {
    if (empty($_POST['name']) || empty($_POST['email']) ||  empty($_POST['message'])) {
        $error = '';
        if (empty($_POST['name'])) {
            $error .= "nameErr&";
        }
        if (empty($_POST['email'])) {
            $error .= "emailErr&";
        }
        if (empty($_POST['message'])) {
            $error .= "msgErr";
        }
        header("location: ../index.php?" . $error);
    } else {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
        ];

        $db = new DB();
        $db->connect();
        $result = $db->insert($data);
        if (is_numeric($result)) {
            echo "<script>alert('Your message is submmited');window.location.href='../index.php'</script>";
        } else {
            header("location: index.php?error=insert");
        }
    }
} else {
    header("location: ../index.php");
}
