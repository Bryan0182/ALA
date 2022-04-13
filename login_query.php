<?php
	session_start();

	require_once 'conn.php';

	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
            $password = md5($_POST['password']);
			$sql = "SELECT * FROM `users` WHERE `gebruikersnaam`=? AND `wachtwoord`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username, $password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['user_ID'];
				header("location: ./profielen.php");
			} else{
				echo "
				<script>alert('Ongeldigde gebruikersnaam of wachtwoord')</script>
				<script>window.location = './login.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Vul alle velden in alsjeblieft')</script>
				<script>window.location = './login.php'</script>
			";
		}
	}
?>