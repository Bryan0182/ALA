<?php
	require_once 'conn.php';
	session_start();

	if(ISSET($_POST['register_dog'])){
		if($_POST['name'] != ""){
			try{
				$id = $_SESSION['user'];
				$sql = $conn->prepare("SELECT * FROM `users` WHERE `user_ID`='$id'");
				$sql->execute();
				$fetch = $sql->fetch();
				$image = $_FILES['image']['name'];
				$target = "images/".basename($image);
				$name = $_POST['name'];
				$age = $_POST['age'];
				$breed = $_POST['breed'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `dogs` (user_ID, hondenfoto, naam, leeftijd, ras) VALUES ('$id', '$image', '$name', '$age', '$breed')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"Hond succesvol toegevoegd!","alert"=>"info");
			$conn = null;
			header('location:my_profile.php');
		}else{
			echo "
				<script>alert('Vul alle velden in!')</script>
				<script>window.location = 'honden_registratie.php'</script>
			";
		}
	}
?>