<?php
	session_start();
	require_once 'conn.php';

	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" || $_POST['email'] != "" || $_POST['username'] != "" || $_POST['password'] != ""){
			try{
				$ran_id = rand(time(), 100000000);
				$image = $_FILES['image']['name'];
				$target = "images/".basename($image);
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$residence = $_POST['residence'];
				$age = $_POST['age'];
				$hobbies = $_POST['hobbies'];
				$searching = $_POST['searching'];
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = md5($_POST['password']);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `users` VALUES ('', '$ran_id', '$image', '$firstname', '$lastname', '$residence', '$age', '$hobbies', '$searching', '$username', '$email', '$password')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"Gebruiker succesvol aangemaakt!","alert"=>"info");
			$conn = null;
			header('location:login.php');
		}else{
			echo "
				<script>alert('Vul alle velden in!')</script>
				<script>window.location = 'registreer.php'</script>
			";
		}
	}
?>