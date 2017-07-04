<?php

function generatePage($body, $title="Example", $header="Header") {
    $page = <<<EOPAGE
<!doctype html>
<html>
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>$title</title>	
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
            
    <body>
            $body
    </body>
</html>
EOPAGE;

    return $page;
}
?>