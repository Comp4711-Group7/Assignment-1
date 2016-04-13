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
    <script src="../assets/js/custom.js"></script>
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
            {menubarLeft}
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                {menubarRight}
            </ul>
            
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-1 sidenav">
        </div>
        <div class="col-sm-10 text-left">
            <h1>{title}</h1>
            {content}
        </div>
        <div class="col-sm-1 sidenav">
        </div>
    </div>
</div>
</body>
</html>
