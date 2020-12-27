<?php
session_start();
	$servername = "localhost";
	$usernamedb = "u688718069_admin";
	$passworddb = "Km^JwSwSX+5";
	$dbname = "u688718069_encreators";


	 // Create connection
	$connection = new mysqli($servername, $usernamedb, $passworddb, $dbname);
   	
    
	if (isset($_POST['regSubmit'])){

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$pincode = $_POST['pincode'];
		$state = $_POST['state'];
		$nation = $_POST['nation'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		
		if(preg_match("/^[0-9]{10}$/", $phone)) {
		// $phone is valid

		
		$_SESSION['phone'] = $phone;
		
		if($password !== $repassword) {
			$msgg = "Password Error";
			header('Location: /register.html?password=failed');
		}
		// password is valid
	$query = "INSERT INTO register (fname,lname,email,phone,pincode,state,nation,password)
					VALUES ('$fname','$lname','$email','$phone','$pincode','$state','$nation','$password')";

 
	
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		

		if ($result){
			header('Location: /profile.php?status=success');
		}else{
			header('Location: /profile.php?status=failed');
		}
	
		}else{
			$msgg = "Enter Valid Mobile No:";
			header('Location: /register.html?mobile_no=failed');
			
		}
		
	}

	
?>