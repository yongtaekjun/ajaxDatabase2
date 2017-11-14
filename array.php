<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<div>
			<p> Hello this is HTML inside of a PHP file</p>
			
			<?php
				 // echo "<h1> TESTING ARRAYS </H1>";	

				 $name[0] = "John";
				 $name[1] = "Melissa";
				 $name[2] = "Paul";
				 $name[3] = "Kristin";
				 $name[4] = "Jim";

				 // $name2 = { "John2","Melissa2","Paul2","Kristin2","Jim2"}; // error


				 for ($i=0; $i < count($name) ; $i++) { 

				 	echo "<br />" . $name[$i];
				 	$name[$i] = $name[$i]." ". $i;
				 }

				 for ($i=0; $i < count($name) ; $i++) { 

				 	echo "<br />" . $name[$i];
				 }

				 for ($i=0; $i < count($name) ; $i++) { 
				 	$name[$i] = "default " . $i;
				 }

				  for ($i=0; $i < count($name) ; $i++) { 
				 	echo "<br />" . $name[$i];
				 }
				 echo "<h3> Testing for each loop</h3>";

				 foreach ($name as $key => $value) {
				 	echo "<br />" .  $key . " " . $value ;
				 }

				 $string = "OpRAh Winfrey opRAh oprAh";
				 // $string = "OpRAh Winfrey";
				 // echo "<h2> testing regular expressions</h2>";
				 // echo preg_match_all("/op/", $string) . "<br />";
				 // echo preg_match("/^Oprah/i", $string) . "<br />";
				 // echo preg_match("/Winfrey$/", $string) . "<br />";

				 // echo "<br />";

				 // $string2 = "JohnJohnJohn";
				 // echo preg_match("/(John){2}/i", $string2)

				 // // phone numbers
				 // $phoneNumber1 = "4167771234";
				 // echo preg_match("/[0-9]{10}/", $phoneNumber1) . "<br />"; // 10 number needed

				 // $phoneNumber2 = "(416)777-1234";
				 // echo preg_match("/[(][0-9]{3}[)][0-9]{3}[-][0-9]{4}$/", $phoneNumber2) . "<br />";

				 // $phoneNumber3 = "(416)777-1234x1234";
				 // // ? extention == 4 digit
				 // echo preg_match("/[(][0-9]{3}[)][0-9]{3}-[0-9]{4}[x][0-9]{4}$/", $phoneNumber3) . "<br />";
				 // // ? 2 <= extention <= 5
				 // echo preg_match("/[(][0-9]{3}[)][0-9]{3}-[0-9]{4}[x][0-9]{2,5}$/", $phoneNumber3) . "<br />"; 


				 // emails
				 // ^ = find from first string only
				 // $ = find from last string only
				 // i = Insensitive or ignore case sensitive
				 // ? = 0 or 1 happenning
				 // {3} = exact 3 times {3,} = minimum 3 times, {3,6} =3,4,5,6 times
				 // $email1 = "james.bond@triosstudent.com";
				 // echo preg_match("/^[a-zA-Z]+[.][a-zA-Z]+@triosstudent.com/i", $email1) . "<br />"; 

				 // $email2 = "james.bond@triosstudent.com";
				 // echo preg_match("/^[a-zA-Z]+[.][a-zA-Z]+[@][a-zA-Z0-9].[a-zA-Z]{2,}/i", $email2) . "<br />"; 

				 // $email3 = "alex_james@triosstudent.com";
				 // echo preg_match("/^[a-zA-Z0-9]+[.]?[-]?[_]?[a-zA-Z]+[@][a-zA-Z0-9]+.[a-zA-Z]{2,}/i", $email3) . "<br />"; 
				 // $email4 = "1234_abc@jazzfm91.fm";
				 // echo preg_match("/^[a-zA-Z0-9]+[.]?[-]?[_]?[a-zA-Z]+[@][a-zA-Z0-9]+.[a-zA-Z]{2,}/i", $email4) . "<br />";				 
				 // area codes
				 $postalCode = "m5p     3a3";
				 // echo preg_match("/^[a-zA-Z][0-9][a-zA-Z]-*[ ]*[0-9][a-zA-Z][0-9]/i", $postalCode);

				 $zipCode = "12345";
				 // echo preg_match("/^[0-9]{5}$/", $zipCode);
			 ?>
		</div>
	</body>
</html>