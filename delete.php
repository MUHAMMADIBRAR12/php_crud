<?php
include "connect.php";
session_start();
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "DELETE from crud where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['delete_success'] = true;
        header('Location:index.php');
        exit();
    } else {
        die(mysqli_error($conn));
    }
}