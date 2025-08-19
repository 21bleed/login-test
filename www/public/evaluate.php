<!doctype html>
<html>
<head lang="sv"></head>
<body>
<h1>Logintest</h1>
<h2>Resultat</h2>
<?php
     	$ans1 = $_POST['q1'];
     	$ans2 = $_POST['q2'];
     	$points = 0;
     	
     	if($ans1 == "test")
           $points++;
     	if($ans2 == "test2")
           $points++;

		if($points == 2) {
			echo("<p>Du är Inlogad</p>");
		} else {
    echo("<p>Fel användernamn eller lösenord</p>");
}

?>
</body>
</html>