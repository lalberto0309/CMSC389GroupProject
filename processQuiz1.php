<?php
    require_once("support1.php");
    require_once("databaseAccess.php");
    require_once("dbLogin.php");

    $quizName = "quiz1.html";
    $letter = $_POST["result"];
    $name = $_POST["name"];
    $retrieval = getNameAndImage("1", $letter, $host, $user, $password, $database);
    $image = base64_encode($retrieval["image"]);
    $resultName = $retrieval["name"];  
    $resultText = addText($letter,$name);

	$button = <<<EOBUTTON
	<form action='{$quizName}' method='post'>
		<input type='submit' value='Take the Quiz Again!' class='btn' />
	</form>
EOBUTTON;

    $content= <<<EOPAGE
    <div class='text-center'>
	    <img src='data:image/jpg;base64,$image' alt=$resultName height='250' width='250'/> <br>
	    <div class='center-block' style='width:300px'>
	    	$resultText
	    </div>
	    <br>
    	$button
    </div>
EOPAGE;
    
    $page = generatePage($content);
	echo $page;
    
    
    function addText($value, $name) {
        $txt = "<p class='result-paragraph'><strong>$name, <br></strong>";
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