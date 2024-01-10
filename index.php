<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body {
            background-color: rgb(237,237,237);
            font-family:Arial,Arial, Helvetica, sans-serif,sans-serif;
            font-size: 12px;
        }
        .wrapper{
            width: 1170px;
            margin: auto;
        }
        .content {
            background-color: rgb(237, 237, 237);
            width: 100%;
            float: left;
            margin-top: 5px;
            min-height: 500px;
        }

        .menu{
            background-color: #114B5F;
            max-width: 1290px;
            margin: 0px 0px 0px;
            padding: 0px;
            height: 40px;
            color: #114B5F;
            border-radius: 5px 5px 5px 5px;
        }
        .menu ul{
        }
        .menu ul li{
            float: right;
            display: block;
            list-style: none;
            border-right: 1px solid #B1D4E0;
            border-left: 1px solid #B1D4E0;
        }
        .menu ul li a {
            font-size: 13px;
            font-weight: bold;
            line-height: 40px;
            padding: 8px 20px;
            color: rgb(255,255,255,255);
            border-radius: 5px 5px 5px 5px;
            text-decoration: none;
        }

         .menu ul li:hover {
            background-color: #1e82a5;
            border-right: 1px solid #1e82a5;
            border-radius: 5px 5px 5px 5px;
        }
        .clear{
            clear: both;
        }
        .footer {
            height: 50px;
            background-color: #114B5F;
            color: rgb(255,255,255);
            border-radius: 5px 5px 5px 5px;
            text-align: center;
        }
        .contact {
            background-color: rgb(237, 237, 237);
            width: 50%;
            height: 70%;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
        <div class="wrapper">
            <div class ="menu">
                <ul>
                    <li><a href="http://lab_7webdev.test/login.php">Login</a></li>
                    <li><a href="AboutUs">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Class</a></li>
                    <li><a href="http://lab_7webdev.test/tablelist.php">Student List</a></li>
                    <li><a href="http://lab_7webdev.test/lab_7user.php">Register</a></li>
                 </ul>
             </div>
        </div>
        <div class="clear"></div>
        <div class="content">
            <div>
               <asp:ContentPlaceHolder ID="bodycontent" runat="server">
               <h2 style="text-align: center">WELCOME MY BOYS</h2>
                </asp:ContentPlaceHolder>
        </div>
        </div>
        <div class="clear"></div>
        <div class="footer">
            <h2>Web Developement-2023/2024</h2>
        </div>
    </form>
</body>
</html>