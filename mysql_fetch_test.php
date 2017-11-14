<?php
	
	// mongodb_insert_test();
	// mysql_insert_test();
	mysql_fetch_test();
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	function mysql_fetch_test() {
	/////////////////////////////////////////////////////////////////////////////////////////////////
	
		$formdata = explode('&', $_POST['condition']);
        parse_str( $_POST['condition'], $values);
        
        // if (isset($_POST['condition']) {}

        // ))

		// $condition = $_POST['condition'];

        // echo "Parsed: ". $condition . " \n";
        
		// foreach ($values as $key => $value) {
		// 	echo " " . $key. " is " .$value . ", \n";
		// }
		$server =  'localhost' ;
		$username = 'yongtaek';
		$password = 'iloves';
		$dbname = "signup";
		
		$connection = mysql_connect($server,$username,$password);
		// $connection = mysql_connect($server,$username,$password,	$dbname);
			
		if (!$connection) {
			echo "problem connecting \n";
			return;
		} 
		
		// echo "MySQL connected successfully \n";

		if ( !mysql_select_db($dbname,$connection)) {
			echo "DB: signup has problem";
			return;
		}
		// echo "DB connected successfully \n";
		// echo "-------110--------------";
		
		// $encryped_password = password_hash ($values['password'],PASSWORD_DEFAULT);

		// $sql = "select * from userinfo where lastname ="."\"".$values['condition']."\";";
		// $sql = "select * from userinfo where lastname ="."\"" . $condition ."\";";
		$sql = "select * from userinfo ".
					 "where lastname like "."\"%" . $values['q_lastname'] ."%\"".
							" and firstname like \"%". $values['q_firstname']. "%\"".
							" and email like \"%". $values['q_email']. "%\";";
					// $sql = "select * from userinfo ;";
        
		$result = mysql_query( $sql);

		// echo "-------200--------------\n";
		// $values = array();
		if ( $result ) {
			printf ("<table>
						<thead>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Password</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Gender</th>
						</thead>"
					);
			while($row = mysql_fetch_assoc($result)) {
				
				printf("<tr>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							<td>%s</td>
							</tr>", 
							$row['firstname'],
							$row['lastname'],
							$row['password'],
							$row['email'],
							$row['phone'],
							($row['gender'] == 1)? "male":"Female"
					);
			}
			echo "</table>";
		}
		echo $sql."\n";
		// echo $values['firstname']."\n";
		// foreach ($values as $key=>$value) {
		// 	echo $key." : ".$value."\n";
			
		// }
		// $('#lastname').val($values['lastname']);
		mysql_free_result($result);
		mysql_close( $connection);
	}

