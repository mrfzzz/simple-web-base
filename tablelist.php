<?php
$connection =  mysqli_connect("localhost:3306","root","","lab_7");
if(!$connection){
    die("Connection failed: ". mysqli_connect_error());
}
$query = "select * from users";
$result = mysqli_query($connection, $query);
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
            padding-left: 110px;
        }
    </style>
</head>
<body>
    <div class="Basetbl">
        <div class="Contenttbl">
            <h2 style="text-align: center">List Register Student account.</h2>
            <div class="Tbl">
            <button id="back1" type="back1" name="back1" onclick="BtnBack1()">back</button>
            <button id="edit" type="edit" name="edit" onclick="Btnedit()">edit</button></br></br>
            <table border="black">
                <tr border="white">
                    <th><b>Id</b></th>
                    <th><b>Matric</b></th>
                    <th><b>Name</b></th>
                    <th><b>Level</B></th>
                </tr>
                    <?php 
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["matric"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["accessLevel"]) . "</td>";
                        echo "</tr>";
                        }
                        mysqli_free_result($result);
                    ?>
            </table>
            <script>
                 function Btnedit(){
                    window.location.href = "http://lab_7webdev.test/tableupdate.php";
                }
                function BtnBack1(){
                    window.location.href = "http://lab_7webdev.test/";
                }
            </script>
            </div>
        </div>
    </div>
</body>
</html>