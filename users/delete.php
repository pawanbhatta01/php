<?php require '../connection/config.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("DELETE FROM users WHERE id=$id");
    if ($result) {
        echo "<script>alert('User deleted successfully');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
} else {
    echo header('Location:index.php?msg=InvalidId');
}