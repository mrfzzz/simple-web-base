<?php
$connection =  mysqli_connect("localhost:3306", "root", "", "lab_7");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["delete"])) {
    $id = $_POST["id"];

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo "Error deleting record: " . mysqli_error($connection);
    } else {
        header("Location: tableupdate.php");
        exit();
    }
}

mysqli_close($connection);
?>