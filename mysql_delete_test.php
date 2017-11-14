<?php
	
	// mongodb_insert_test();
	// mysql_insert_test();
	mysql_delete_test();
	
	/////////////////////////////////////////////////////////////////////////////////////////////////
	function mysql_delete_test() {
	/////////////////////////////////////////////////////////////////////////////////////////////////
	
		$formdata = explode('&', $_POST['condition']);
        parse_str( $_POST['condition'], $values);
        
		$server =  'localhost' ;
		$username = 'yongtaek';
		$password = 'iloves';
		$dbname = "signup";
		
		$connection = mysql_connect($server,$username,$password);
			
		if (!$connection) {
			echo "problem connecting \n";
			return;
		} 
		

		if ( !mysql_select_db($dbname,$connection)) {
			echo "DB: signup has problem";
			return;
		}
		$sql = "delete from userinfo ".
					 "where lastname like "."\"%" . $values['q_lastname'] ."%\"".
							" and firstname like \"%". $values['q_firstname']. "%\"".
							" and email like \"%". $values['q_email']. "%\";";
					// $sql = "select * from userinfo ;";
        
		$result = mysql_query( $sql);
        if (!$result) {
            mysql_free_result($result);
            mysql_close( $connection);
            return;
        }
        echo "Record Deleted: ".mysql_affected_rows();
		$sql = "select * from userinfo;";
        $result = mysql_query( $sql);
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
			
		mysql_free_result($result);
		mysql_close( $connection);
	}

