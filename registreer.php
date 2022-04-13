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
				$sql = "INSERT INTO `users` VALUES ('', '$image', '$firstname', '$lastname', '$residence', '$age', '$hobbies', '$searching', '$username', '$email', '$password')";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Dinder | Registreren</title>
    <link rel="icon" type="image" href="./Assets/images/Dinder_small_logo.png">

    <script src="https://kit.fontawesome.com/1395c9ece5.js" crossorigin="anonymous"></script>
    <script src="./Assets/javascript/script.js"></script>
</head>

<body>
    <?php $page = 'registreer'; include './otherheader.php';?>

    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 user_form">
                    <h3>Registreren Dinder</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <input type="text" id="firstname" name="firstname" placeholder="Voornaam" required>
                            <input type="text" id="lastname" name="lastname" placeholder="Achternaam" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="residence" name="residence" placeholder="Woonplaats" required>
                            <input type="number" id="age" name="age" placeholder="Leeftijd" required>
                        </div>
                        <div class="form-group">
                            <textarea name="hobbies" class="register-textarea" id="hobbies" cols="22" rows="6" placeholder="Vul hier je hobby's in." required></textarea>
                            <textarea name="searching" class="register-textarea" id="searching" cols="22" rows="6" placeholder="Naar wat voor persoon ben je opzoek?" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
                            <input type="email" id="email" name="email" placeholder="E-mailadres" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" onclick="showPassword()">
                            <label for="showPassword"> Laat wachtwoord zien</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register" value="Registreer" class="form_button">
                        </div>
                    </form>
                    <div class="row login_options">
                        <div class="col-sm-6 offset-md-3">
                            <p>Heb je al een account? <a href="./login.php">Login hier!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <?php include 'footer.php';?>
</body>

</html>