<?php
$connection =  mysqli_connect("localhost:3306","root","","lab_7");
if($_SERVER['REQUEST_METHOD']== "POST"){

    $matric = mysqli_real_escape_string($connection, $_POST["matric"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    if(!empty($matric)&&!empty($password)){

        $query = "SELECT * FROM users WHERE matric = '$matric' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if($result){

            if($result && mysqli_num_rows($result)>0){

                $user_data = mysqli_fetch_assoc($result);

                if($user_data["password"]== $password){
                    header("location: index.php");
                    exit();
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .Basedlog1{
            max-width: auto;
            background-color: whitesmoke;
            margin-top:8px;
            margin-bottom:8px;
            padding-top: 130px;
            padding-bottom: 140px;
            max-height:650px;
        }
        .Contentlog{
            margin: auto;
            background-color: aqua;
            border-radius: 5px 5px 5px 5px;
            max-width:30%;
            height: auto;
            padding: 30px;
            padding-left: 50px;
            text-align: center;
        }
        .Tablelog{
            margin: auto;
            max-width: auto;
            height: auto;
            padding: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="Basedlog1">
            <div class="Contentlog">
                <h2>Login</h2>
                <img src="user.png" style="width:102px;height:102px"></br>
                <div class="Tablelog">
                <table>
                    <tr>
                        <th><label for="matric">Matric No :</label></th>
                        <th><input type="text" id="matric" name="matric" required></input></th>
                    </tr>
                    <tr>
                        <th><label for="Password">Password :</label></th>
                        <th><input type="password" id="password" name="password" required></input></th>
                    </tr>
                </table>
                </div>
                <button id="submit" type="submit" name="submit">Submit</button></br></br>
                <label for="register"><a href="http://lab_7webdev.test/lab_7user.php">Register</a> here if you have not.</label>
            </div>
        </div>
    </form>
</body>
</html>