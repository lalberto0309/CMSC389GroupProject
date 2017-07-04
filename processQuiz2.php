<?php
    require_once("support1.php");
    require_once("databaseAccess.php");
    require_once("dbLogin.php");

    $quizName = "quiz2.html";
    $letter = $_POST["result"];
    $name = $_POST["name"];
    $retrieval = getNameAndImage("2", $letter, $host, $user, $password, $database);
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
                $txt .= "You're a GAMER! Shooter, Fighting, RPG...You just love the competitive nature that comes from playing video games either alone or online. Sure, you enjoy the social life and are easy to get along with but you can't pass up playing games with friends instead.";
                break;
            case "B":
                $txt .= "You're the CLASSIC NERD! When people think of a nerd...that's you! Doesn't mean you dress weird or have the stereotypical nerdy glasses. But you do love knowing a lot about everything! Whether its academics, games, or those guilty pleasure shows, you are fine with being your TRUE Nerdy self!";
                break;
            case "C":
                $txt .= "You're the COMPUTER/TECH NERD! Well, this is a Computer Science Class, so that isn't too much of a shocker! But, you love having all the new techs and apps out there. I'm pretty sure you can code up just about anything!";
                break;
            case "D":
                $txt .= "You're the MOVIE/COMIC BUFF! You're the friend people NEED to take to trivia night! Movies, comics, books need to be studied more. You need to dive into the universe of each story to satisfy your curiousity! You are either Movie Remakes biggest fan or biggest critic!";
                break;
        }
        $txt .= "</p>";
        return $txt;
    }
?>