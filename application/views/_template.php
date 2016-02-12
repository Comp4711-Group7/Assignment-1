<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * views/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assignment-1 Comp 4711</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="../assets/css/custom.css" rel="stylesheet">
    <script>
        function nameChange(link,name) {
            console.log(name)
            window.location.replace("/" + link + "/" + name);
        }
    </script>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Stock Ticker</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
<!--            <ul class="nav navbar-nav">-->
<!--                <li class="active"><a href="#">Home</a></li>-->
<!--                <li><a href="#">About</a></li>-->
<!--                <li><a href="#">Projects</a></li>-->
<!--                <li><a href="#">Contact</a></li>-->
<!--            </ul>-->
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($logged_in == TRUE){
                        ?>

                    <li style="margin-top: 15px; color: white;"><span class="username">{username}</span></li>
                            <li><a href="/authentication/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>



                    <?php
                    }
                    else {
                        ?>
                        <li><a href="/authentication/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <?php
                    }
                ?>
            </ul>
            
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
<!--            <p><a href="#">Link</a></p>-->
<!--            <p><a href="#">Link</a></p>-->
<!--            <p><a href="#">Link</a></p>-->
        </div>
        <div class="col-sm-8 text-left">

            <h1>{title}</h1>
            {content}
        </div>
        <div class="col-sm-2 sidenav">
<!--            <div class="well">-->
<!--                <a href="/stocks" ><button style="width: 100% ; height: 100%;">STOCKS</button></a>-->
<!--            </div>-->
<!--            <div class="well">-->
<!--                <a href="/players" ><button style="width: 100% ; height: 100%;">PLAYERS</button></a>-->
<!--            </div>-->
        </div>
    </div>
</div>

<!--<footer id="footer" class="container-fluid text-center">-->
<!--    <p>Footer Text</p>-->
<!--</footer>-->

</body>
</html>
