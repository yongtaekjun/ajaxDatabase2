<?php
	// created by Yongtaek Jun
	// mongodb_insert_test();
	mysql_insert_test();
	
	// var_dump($formdata);
	/////////////////////////////////////////////////////////////////////////////////////////////////
	function mysql_insert_test() {
	/////////////////////////////////////////////////////////////////////////////////////////////////
	    $formdata = explode('&', $_POST['sending']);
		parse_str( $_POST['sending'], $values);
	
		foreach ($values as $key => $value) {
			echo " " . $key. " is " .$value . ", ";
		}
			$server =  'localhost' ;
		$username = 'yongtaek';
		$password = 'iloves';
		$dbname = "signup";
		
		$connection = mysqli_connect($server,$username,$password,$dbname);
		// $connection = mysql_connect($server,$username,$password,	$dbname);
			
		if (!$connection) {
			echo "problem connecting";
			return;
		} 
		
		// if ( !mysql_select_db($dbname,$connection)) {
		// 	echo "DB: signup has problem";
		// 	return;
		// }
		
		$gender = 1;
		if ( $values['gender'] == "female" ) $gender = 0;
		$encryped_password = password_hash ($values['password'],PASSWORD_DEFAULT);

		// $sql = "select count(email) from userinfo ".
		// 		"where lastname like "."\"%" . $values['q_lastname'] ."%\"".
		// 			" and firstname like \"%". $values['q_firstname']. "%\"".
		// 			" and email like \"%". $values['email']. "%\";";
		// $sql = "select count(*) as 'total' from 'userinfo' where email like \"%". $values['email']. "%\";";
		$sql = "select count(*) from 'userinfo' where email like \"%". $values['email']. "%\";";
		
		$result = mysqli_query($connection, $sql);
		$count = 0;
		if ($result) {
			$count = mysqli_num_rows($result);
		}

		echo "\n 001 SQL: ".$sql;
		echo "\n 002 Result of select count is: ".$result;
		echo "\n 003 Count is: ".$count;
		
		if ($count != 0) {
			$sql = "update userinfo set ". 
							"firstname = '". $values['firstname']. "',".
							"lastname = '". $values['lastname']. "',".
							"email = '". $values['email']. "',".
							"password = '". $encryped_password. "',".
							"phone = '". $values['phone']. "',".
							"gender = ". $gender. " ".
						"where email is '". $values['email'] . "';";
			echo "\n 020".$count;
		}
		else {
			$sql = "Insert Into userinfo(firstname,lastname,email,password,phone,gender) VALUES ( ".
					"\"".$values['firstname']."\",". 
					"\"".$values['lastname'] ."\",". 
					"\"".$values['email']   . "\",". 
					"\"".$encryped_password ."\",".
					"\"".$values['phone'] ."\",".
					$gender . ");";
			echo "\n 010".$count;
					
		}
		echo "\n 020".$sql;

		$result = mysqli_query($connection, $sql);
		mysqli_close( $connection);
	}


?>
	
