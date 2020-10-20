<!DOCTYPE html>
<html lang="en">
<head>
    <title>MiniProject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="content">
        <div class ="row">
            <nav class="navbar navbar-default container-fluid">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="./">MiniProject</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li <?php if($data["page"]=="Home") echo 'class="active"'?>><a href="./Home">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if(isset($_SESSION["username"])){
                                echo "<li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"></span> {$_SESSION["username"]}</a></li>";
                                echo "<li><a href=\"./Login/logout\"><span class=\"glyphicon glyphicon-log-out\"></span> Log out</a></li>";
                            } else {
                                echo "
                                    <li><a href=\"./Register\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
                                    <li><a href=\"./Login\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
                                ";
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <?php 
                if(isset($data["page"])){
                    require_once './mvc/views/'.$data["page"].'.php';
                }
            ?>  
        </div>
    </div>
</body>
</html>