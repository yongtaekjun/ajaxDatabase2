<!DOCTYPE html>
<html>
	<head>
		<script>var number = 0; </script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
		
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"> </script> -->
		<script src="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.js"></script>
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css"> </link> -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.4/foundation.min.css">		
		<script> 
			function js_clear_form(element) {
				switch (true) {
					case (element.id == "q_firstname") : {
						$('#q_lastname').val('');
						$('#q_email').val('');
						break;
					}
					case (element.id == "q_lastname") : {
						$('#q_firstname').val('');
						$('#q_email').val('');
						break;
					}
					case (element.id == "q_email") : {
						$('#q_firstname').val('');
						$('#q_lastname').val('');
						break;
					}
					default : break;
				}
				$('#firstname').val('');
				$('#lastname').val('');
				$('#password').val('');
				$('#email').val('');
				$('#phone').val('');
				$('#femaleRadio').prop('checked',false);
				$('#maleRadio').prop('checked',false);
				$('#chkProgramming').prop('checked',false);
				$('#chkFinance').prop('checked',false);
				$('#chkManagement').prop('checked',false);
			}
			function js_insert_userinfo() {
				var data1 = $('#signupForm').serialize();
				console.log(data1);
				$.ajax ({
					url:"mysql_insert_test.php",
					method: "POST",
					data: {"sending": data1 },
					success: function(response) {
						$("#ajaxDiv").html("Submitted succsfully!!");
					} 
				}); // end of ajax
			}
			function js_fetch_userinfo() {
				var data1 = $('#q_firstname').serialize()
							+ '&' + $('#q_lastname').serialize()
							+ '&' + $('#q_email').serialize();
				console.log(data1);
				$.ajax ( {
					url:"mysql_fetch_test.php",
					method: "POST",
					data: {"condition": data1 },
					success: function(response) {
						// $("#ajaxDiv").html("Fetching from database!!");
						$("#ajaxDiv").html(response);
					} 
				}); // end of ajax
			}
			function js_delete_userinfo() {
				var data1 = $('#q_firstname').serialize()
							+ '&' + $('#q_lastname').serialize()
							+ '&' + $('#q_email').serialize();
				console.log(data1);
				$.ajax ( {
					url:"mysql_delete_test.php",
					// url:"mongo_insert_test.php",
					method: "POST",
					data: {"condition": data1 },
					success: function(response) {
						// $("#ajaxDiv").html("Fetching from database!!");
						$("#ajaxDiv").html(response);
					} 
				}); // end of ajax
			}

		</script>
	</head>
	<body class="small-centered">
		<div class="column small-centered small-6" >
			<h1> Sign Up Form </h1>
			<form id = "signupForm" action ="#" method = "POST" onsubmit="return false;">
				<div >
					<div class = "column small-6">
						<label>Enter First Name 
							<input type="text" class="expanded" name="firstname" id="firstname" placeholder = "first name"> 
						</label>
					</div>
					<div class = "column small-6">
						<label>Enter Last Name 
							<input type="text" class="expanded" name="lastname" id="lastname" placeholder = "last name">
						</label>
					</div>
				</div>
				<div >
					<div class = "column small-12">
						<label>Enter eMail <input type="text" name="email" id="email" placeholder="email"></label>
						<label>Enter password <input type="password" name="password" id="password"></label>
					</div>
				</div>
				<div >
					<div class = "column small-12">
						<label>Enter Phone <input type="text" name="phone" id="phone" placeholder="phone"></label>
					</div>
				</div>
				<div >
					<div class = "column small-centered small-6">
						<label>Choose Gender <br /> </label>
						<input type="radio" name="gender" checked="checked" id="maleRadio" value="male"> 
							<label for "maleRadio">Male</label>
						</input>
						<input type="radio" name="gender" id="femaleRadio" value="female"> 
							<label for "femaleRadio">feMale</label>
						</input>
					</div>
				</div>
				<div >
					<div class = "column small-centered small-12">
						<label>Skill Set <br /> </label>
						<input type="checkbox" name="skills" id="chkFinance" value="1"> 
							<label for "chkFinance">Finance</label>
						</input>
						<input type="checkbox" name="skills" id="chkProgramming" value="2"> 
							<label for "chkProgramming">Programming</label>
						</input>
						<input type="checkbox" name="skills" id="chkManagement" value="3"> 
							<label for "chkManagement">Management</label>
						</input>
					</div>
				</div>
				<div class = "row small-centered small-12">
					<input class="button column small-10 centered" 
							type="button" name="register" id="register" value="register/update" onclick="js_insert_userinfo()"
					>
				</div>
				<div class = "row" id="name_condition">
					<div class = "column small-6">
						<label>Search by firstname 
							<input type="text" name="q_firstname" id="q_firstname" placeholder="firstname" onclick="js_clear_form(this);">
						</label>
					</div>
					<div class = "column small-6">
						<label>Search by lastname 
							<input type="text" name="q_lastname" id="q_lastname" placeholder="lastname" onclick="js_clear_form(this);">
						</label>
					</div>
				</div>
				<div class = "row" id="name_condition">
					<div class = "column small-12">
						<label>Search by email 
							<input type="text" name="q_email" id="q_email" placeholder="q_email" onclick="js_clear_form(this);">
						</label>
					</div>
				</div>
				<div class = "row small-centered small-12">
					<div class = "column small-12">
						<input class="button  column small-6 centered" 
								type="button" name="fetch" id="fetch" value="fetch" onclick="js_fetch_userinfo()"
						>
						<input class="button alert column small-6 centered" 
								type="button" name="delete" id="delete" value="delete" onclick="js_delete_userinfo()"
						>
					</div>
				</div>
				<p id = "ajaxDiv"> </p>			
				<?php
					if ($_POST) {
						$received_data = $_POST["sending"];
						// error_log("phoneNumber from server is : ".$phoneNumber);
						var_dump("SERVER: received data is : ".$received_data);
						// <script> console.log ($phoneNumber + we got it from ajax')</script";
					}
					else {
						var_dump("waiting data from server ..." );
					}

				?>
			</form>
		</div>
	</body>
</html>