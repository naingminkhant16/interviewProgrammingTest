<?php
require 'config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = new DB();
    $db->connect();
    $result = $db->delete($id);
    if ($result) header("location: ../showData.php");
} else {
    header('location: ../index.php');
}
