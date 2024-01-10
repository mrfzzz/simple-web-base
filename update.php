<?php
$connection =  mysqli_connect("localhost:3306","root","","lab_7");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    // Retrieve data from the form
    $matric = mysqli_real_escape_string($connection, $_POST["matric"]);
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    $accessLevel = mysqli_real_escape_string($connection, $_POST["accessLevel"]);

    // Using prepared statement to prevent SQL injection
    $query = "UPDATE `users` SET `matric`=?, `name`=?, `accessLevel`=? WHERE `id`=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $matric, $name, $accessLevel, $id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check for successful execution
    if ($result) {
        // Check if any rows were affected
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header("Location: tableupdate.php");
            exit();
        } else {
            echo "No records updated.";
        }
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <style>
        .Basedupd1{
            max-width: auto;
            background-color: whitesmoke;
            margin-top:8px;
            margin-bottom:8px;
            padding-top: 130px;
            padding-bottom: 140px;
            max-height:650px;
        }
        .Basedupd2{
            margin: auto;
            background-color: aqua;
            border-radius: 5px 5px 5px 5px;
            max-width:35%;
            height: auto;
            padding: 30px;
            text-align: center;
        }
        .Contentupd{
            margin: auto;
            max-width: auto;
            height: auto;
            padding: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="update.php" method="GET">
        <div class="Basedupd1">
        <div class="Basedupd2">
            <h2 style="text-align:center">Update User</h2>
            <div class="Contentupd">
                <table>
                    <tr>
                            <th><label for="Matric">Matric :</label></th>
                            <th><input type="text" id="matric" name="matric" value="<?php echo isset($_GET['matric']) ? $_GET['matric'] : ''; ?>"></th>
                        </tr>
                        <tr>
                            <th><label for="Name">Name :</label></th>
                            <th><input type="text" id="name" name="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>"></th>
                        </tr>
                        <tr>
                            <th><label for="Access Level">Access Level :</label></th>
                            <th><input type="text" id="accessLevel" name="accessLevel" value="<?php echo isset($_GET['accessLevel']) ? $_GET['accessLevel'] : ''; ?>"></th>
                        </tr>
                </table>
            </div>
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <button type="submit" id="update" name="update" style="margin-right:5px">Update</button>
            <button type="button" id="cancelup" name="cancelup" onclick="window.location.href='tableupdate.php';">Cancel</button>
        </div>
    </div>
</form>
    

</body>
</html>