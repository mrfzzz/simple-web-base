<?php
$connection =  mysqli_connect("localhost:3306","root","","lab_7");
if(!$connection){
    die("Connection failed: ". mysqli_connect_error());
}
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);

//del

if (isset($_POST["delete"])) {
    $id = $_POST["id"];

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        echo "Error deleting record: " . mysqli_error($connection);
    } else {
        echo "del";
    }
}

mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
    <style>
        .Basetbl{
            max-width: auto;
            background-color: whitesmoke;
            margin-top:8px;
            margin-bottom:8px;
            min-height:650px;
            padding-top: 10px;
        }
        .Contenttbl{
            margin: auto;
            background-color: white;
            border-radius: 5px 5px 5px 5px;
            max-width:50%;
            height: auto;
            padding: 30px;
            min-height:600px;
        }
        .Tbl{
            margin: auto;
            max-width: auto;
            height: auto;
            padding: 10px;
            padding-left: 30px;
        }
        .btnDel{
            color:white;
            border-radius: 5px 5px 5px 5px;
            border-color:red;
            background-color:red;
        }
        .btnDel:hover{
            background-color: darkred;
            color: #fff;
        }
        .btnUpd{
            border-color:green;
            background-color:green;
            color:white;
            border-radius: 5px 5px 5px 5px;
            margin-right:3px;
        }
        .btnUpd:hover{
            background-color: darkgreen;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="Basetbl">
        <div class="Contenttbl">
            <h2 style="text-align: center">List Update Student account.</h2>
            <div class="Tbl">
            <button id="back" type="back" name="back" onclick="BtnBack()">back</button></br></br>
            <table border="black">
                <tr border="white">
                    <th><b>Id</b></th>
                    <th><b>Matric</b></th>
                    <th><b>Name</b></th>
                    <th><b>Level</b></th>
                    <th><b>Operations</b></th>
                </tr>
                <tr>
                    <?php 
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <td><?php echo $row["id"];?></td>
                    <td><?php echo $row["matric"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["accessLevel"];?></td>
                    <td> 
                        <button class="btnUpd" onclick="BtnUpdate('<?php echo $row["matric"]; ?>', '<?php echo $row["name"]; ?>', '<?php echo $row["accessLevel"]; ?>', '<?php echo $row["id"]; ?>')">update</button>
                        <button class="btnDel" onclick="BtnDelete('<?php echo $row["id"]; ?>')">Delete</button>
                    </td>
                </tr>
                    <?php
                    }
                    mysqli_free_result($result);
                    ?>
            </table>
            <script>
                function BtnUpdate(matric, name, accessLevel, id) {
                    window.location.href = "http://lab_7webdev.test/update.php?matric=" + matric + "&name=" + name + "&accessLevel=" + accessLevel + "&id=" + id;
                }
                function BtnBack(){
                    window.location.href = "http://lab_7webdev.test/tablelist.php";
                }

                function BtnDelete(id) {
                        if (confirm("Are you sure you want to delete this record?")) {
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    // Reload the page after successful deletion
                                    location.reload();
                                }
                            };
                            xhttp.open("POST", "", true); // Add your delete.php file here
                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send("delete=1&id=" + id);
                        }
                    }
                
            </script>
            </div>
        </div>
    </div>
</body>
</html>
<?php
mysqli_close($connection);
?>