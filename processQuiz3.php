<?php
    require_once("support1.php");
    require_once("databaseAccess.php");
    require_once("dbLogin.php");

    $quizName = "quiz3.html";
    $letter = $_POST["result"];
    $name = $_POST["name"];
    $retrieval = getNameAndImage("3", $letter, $host, $user, $password, $database);
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
	    <img src='data:image/jpg;base64,$image' alt=$resultName height='250' width='250'/> <br><br>
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
                $txt .= "You got Sublime Text! You're the most popular editor here and devs love you! You're very flexible to meet everyone's demands and have a ton of features. Plus you're a snappy dresser.";
                break;
            case "B":
                $txt .= "You got Komodo Edit! You're simple and clean. You may not be as poweful as the other editors or even your big brother KomodoIDE, but you still got some tricks up your sleeve. And don't forget you're Nelson approved! ";
                break;
            case "C":
                $txt .= "You got Webstorm! You're the new kid on the block but you have a lot of things going for you. You've got the full package and you're very powerful. Others should be scared!";
                break;
            case "D":
                $txt .= "You got Notepad! You like things the old-fashioned way and don't need any fancy bells or whistles to get the job done. Autocompletion?! Who needs that? Most of your friends probably think you're some sort of masochist who enjoys pain, but really you just like sticking with your guns. ";
                break;
        }
        $txt .= "</p>";
        return $txt;
    }
?>