<?php

function generatePage($body, $title="Quiz Results", $css="styles.css", $header="Header") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>$title</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" href="quizstyle.css" type="text/css" />	
        <link rel="stylesheet" href="$css" type="text/css" />
    </head>
            
    <body>
        <nav class="navbar navbar-inverse" style="background-color: red">
            <div class="navbar-header">
                <a class="navbar-brand" href="Homepage.html" style="color: white"><u>FizzBuzzFeed</u></a>
            </div>
        </nav>
            $body
    </body>
    <br><br>
    <footer class="bg-4 text-center">
        <p>
            FizzBuzzFeed &copy; 2017 By Lucrecio Alberto, Randy Flores, and Stephen Meyer
        </p>
    </footer>
</html>
EOPAGE;

    return $page;
}
?>