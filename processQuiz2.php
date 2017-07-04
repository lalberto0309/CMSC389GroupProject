<?php
    require_once("support1.php");
    require_once("databaseAccess.php");
    require_once("dbLogin.php");

    $letter = $_POST["result"];
    $name = $_POST["name"];
    $retrieval = getNameAndImage("2", $letter, $host, $user, $password, $database);
    $image = base64_encode($retrieval["image"]);
    $resultName = $retrieval["name"];
    
    $body = "<img src=\"data:image/jpg;base64,$image\" alt=$resultName/><br/><br/>";
    $body .= addText($letter, $name);
    $body .= "<form action=\"Homepage.html\" method=\"post\">";
	$body .= "<input type=\"submit\" value = \"Home\">";
	$body .= "</form>";

    
    
    $page = generatePage($body);
	echo $page;
    
    
    function addText($value, $name) {
        $txt = "<p><strong>$name, </strong>";
        switch($value) {
            case "A":
                $txt .= "";
                break;
            case "B":
                $txt .= "";
                break;
            case "C":
                $txt .= "";
                break;
            case "D":
                $txt .= "";
                break;
        }
        $txt .= "</p>";
        return $txt;
    }
?>