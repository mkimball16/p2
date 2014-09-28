
 <!DOCTYPE html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>xkcd Password Generator</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">

</head>
<body>
		<h1>xkcd Password Generator</h1>

	<p class="intro">Howdy! Welcome to my random password generator. Let's face it, coming up 
	with a secure password is getting more and more difficult these day. But with so much
	of our personal information online, and some very intelligent hackers, ensuring your information
	is protected it of the utmost importance. So, I've built the random password generator below
	to help you come up safe, secure passwords. Just specify the number of words and whether or not
	you would like a number, special character, or the first word capitalized below and click the 
	"Give me a password" button. My fancy smanshy code will wrangle you a password based on
	your specifications. Don't like the random password generated? Simply click the button again 
	to lasso a new one.</p>
		
		<?php if (!isset($_POST['submit'])) {?>
		
		<form method="POST" action="index.php">
			<p>Number of words:<br />
			<select name="passwordlength">
					<option value="1">1</option>
					<option value="2">2</option>
			    	<option value="3">3</option>
					<option value="4">4</option>
			    	<option value="5">5</option>
			</select></p>
			<p>Would you like to make the first letter uppercase?<br />
			<input type="radio" name="case" value="1">Yes<br />
			<input type="radio" name="case" value="0" checked>No<br /></p>
			
			<p>Would you like the first word in all uppercase?<br />
			<input type="radio" name="caps" value="1">Yes<br />
			<input type="radio" name="caps" value="0" checked>No<br /></p>
			
			<p>Would you like to include a symbol?<br />
			<input type="radio" name="symbols" value="1">Yes<br />
			<input type="radio" name="symbols" value="0" checked>No<br /></p>
			<p>Would you like to include a number?<br />
			<input type="radio" name="numbers" value="1">Yes<br />
			<input type="radio" name="numbers" value="0" checked>No<br /></p>
			<input type="submit" name="submit" method="submit">
		</form>
		
		<?php } else {
		?>
		
		<p class="password">Password:
		
		<?php
			$s = $n = 1;
			$passwordlength = $_POST['passwordlength'];
			if(isset($_POST['symbols'])) {$s = $_POST['symbols'];}
			if(isset($_POST['numbers'])) {$n = $_POST['numbers'];}
			if(isset($_POST['case'])) {$c = $_POST['case'];}
			if(isset($_POST['caps'])) {$p = $_POST['caps'];}
			$data = file('common.ini');
			$dictionary = $data;
			$data = file('symbols.ini');
			$symbols = $data;
			$data = file('numbers.ini');
			$numbers = $data;
			
			for($i=0; $i<$passwordlength; $i++)
			{
				$r = rand(0,count($dictionary)-1);
				$passwordarray[$i] = $dictionary[$r];
				if($i==0 && $c){
				echo ucfirst($passwordarray[$i]);
				}
				elseif($i==0 && $p) {
				echo strtoupper($passwordarray[$i]);
				//may need a loop here to make all caps
				}
				else {
				echo ($passwordarray[$i]);}
			}
			
		
			if($s){
			$r = rand(0,count($symbols)-1);
			$passwordsymbol[0] = $symbols[$r];
			echo $passwordsymbol[0];
			}
			if($n){
			$r = rand(0,count($numbers)-1);
			$passwordnumber[0] = $numbers[$r];
			echo $passwordnumber[0];
			}
			?></p>
			
			<br>
			<form method="POST" action="index.php">
			<p>Number of words:<br />
			<select name="passwordlength">
					<option value="1">1</option>
					<option value="2">2</option>
			    	<option value="3">3</option>
					<option value="4">4</option>
			    	<option value="5">5</option>
			</select></p>
			<p>Would you like to make the first letter uppercase?<br />
			<input type="radio" name="case" value="1">Yes<br />
			<input type="radio" name="case" value="0" checked>No<br /></p>
			<p>Would you like the first word in all uppercase?<br />
			<input type="radio" name="caps" value="1">Yes<br />
			<input type="radio" name="caps" value="0" checked>No<br /></p>
			<p>Would you like to include a symbol?<br />
			<input type="radio" name="symbols" value="1">Yes<br />
			<input type="radio" name="symbols" value="0" checked>No<br /></p>
			<p>Would you like to include a number?<br />
			<input type="radio" name="numbers" value="1">Yes<br />
			<input type="radio" name="numbers" value="0" checked>No<br /></p>
			<input type="submit" name="submit" method="submit">
		</form>
			
			<?php
			}
			echo "<br><br>";
			?>
			
	<img id="password-gen" src="http://imgs.xkcd.com/comics/password_strength.png" align="center">		
</body>
</html>