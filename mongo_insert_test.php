<?php
	
	mongodb_insert_test();

/////////////////////////////////////////////////////////////////////////////////////////
//      for MongoDB
/////////////////////////////////////////////////////////////////////////////////////////

	function mongodb_insert_test() {
		if (!extension_loaded('mongodb')) {
			echo "mongodb is not loaded !!";
			if (!dl('mongodb.dll')) {
				echo "mongodb can not be loaded !!";
				exit;
			}
		}
		echo "Module of mongodb is loaded !!";
		try {
			// $link_mongo = new Mongo();
			$db_connection = new MongoDB("mongodb://localhost:27017");
		} catch (MongoConnectionException $e) {
			echo "Exception Happening !!";
			return;
		}
		echo "mongodb is loaded !!";
		return;
		// Query Class

		$gender = 1;
		if ( $values['gender'] == "female" ) $gender = 0;
		$encryped_password = password_hash ($values['password'],PASSWORD_DEFAULT);
		$inserted_data = array();
		$inserted_data['firstname'] = $values['firstname'];
		$inserted_data['lastname'] = $values['lastname'];
		$inserted_data['email'] = $values['email'];
		$inserted_data['phone'] = $values['phone'];
		$inserted_data['password'] = $encryped_password;
		$inserted_data['gender'] = $gender;
		


		$query = new MongoDB\Driver\Query(array('age' => 30));
		
		// Output of the executeQuery will be object of MongoDB\Driver\Cursor class
		$cursor = $link_mongo->executeQuery('testDb.testColl', $query);
		
		// Convert cursor to Array and print result
		print_r($cursor->toArray());

		// $link_db = $link_mongo->testdb;
		// $collection_userinfo = $link_db->userinfo;
		// $collection_userinfo->insert($values,true);
	}
	function mongodb_get_test() {
		try {
			$link_mongo = new Mongo();
		} catch (MongoConnectionException $e) {

		}

		$link_db = $link_mongo->testdb;
		$collection_userinfo = $link_db->userinfo;
		$collection_userinfo->insert($values,true);
	}


?>
	
