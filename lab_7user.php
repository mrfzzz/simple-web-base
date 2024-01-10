<?php
$connection =  mysqli_connect("localhost:3306","root","","lab_7");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $matric = mysqli_real_escape_string($connection, $_POST["matric"]);
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $accessLevel = mysqli_real_escape_string($connection, $_POST["accessLevel"]);

    // Perform the SQL query, you need to modify this according to your database structure
    $sql = "INSERT INTO users (matric, name, password, accessLevel) VALUES ('$matric', '$name', '$password', '$accessLevel')";

    if (mysqli_query($connection, $sql)) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .Base1{
            max-width: auto;
            background-color: whitesmoke;
            margin-top:8px;
            margin-bottom:8px;
            padding-top: 130px;
            padding-bottom: 140px;
            max-height:650px;
        }
        .Content{
            margin: auto;
            background-color: aqua;
            border-radius: 5px 5px 5px 5px;
            max-width:35%;
            height: auto;
            padding: 30px;
            text-align: center;
        }
        .table{
            margin: auto;
            max-width: auto;
            height: auto;
            padding: 30px;
            text-align: center;
            
        }
        
    </style>
</head>
<body>
    <div class="Base1">
            <div class="Content">
                <form action="" method="post">
                    <div class ="table">
                        <h2>Register</h2>
                    <table>
                        <tr>
                            <th> <label for="Matric">Matric :</label></th>
                            <th><input type="text" id="matric" name="matric" required></th>
                        </tr>
                        <tr>
                            <th> <label for="Name">Name :</label></th>
                            <th><input type="text" id="name" name="name" required></th>
                        </tr>
                        <tr>
                            <th><label for="Password">Password :</th>
                            <th><input type="password"  name="password"></th>
                        </tr>
                        <tr>
                            <th><label for="Password">Comfirm Password :</th>
                            <th><input type="password" id="password" name="password" required></th>
                        </tr>
                        <tr>
                            <th><label for="Role">Role :</label></th>
                            <th><select id="accessLevel" name="accessLevel" style="width: 175px; height:22px">
                                <option value="lecturer">lecturer</option>
                                <option value="student">student</option>
                                </select>
                            </th>
                        </tr>
                    </table>
                    </div>
                    <button type="btnsub" id="Submit" name="Submit">Register</button>
                    <button type="cancel" id ="cancelbtn" name="cancel" onclick="BtnCancel1()">Cancel</button></br></br>
                    <label for="login"><a href="http://lab_7webdev.test/login.php">Login</a> here if you finish register.</label>
                </form>
                <script>
                    function BtnCancel1(){
                        window.location.href = "http://lab_7webdev.test/";
                    }
                </script>
            </div>
    </div>
    
</body>
</html>