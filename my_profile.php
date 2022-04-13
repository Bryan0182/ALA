<!DOCTYPE html>
<?php
    require 'conn.php';
    session_start();

    if(!ISSET($_SESSION['user'])){
		header('location:login.php');
	}

    $id = $_SESSION['user'];
    $sql = $conn->prepare("SELECT * FROM `users` WHERE `user_ID`='$id'");
    $sql->execute();
    $fetch = $sql->fetch();

    if(ISSET($_POST['user_update'])){
		if($_POST['residence'] != ""){
			try{
                $email = $_POST['email'];
                $age = $_POST['age'];
				$residence = $_POST['residence'];
				$hobbies = $_POST['hobbies'];
				$searching = $_POST['searching'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE users SET woonplaats='$residence', leeftijd='$age', hobbies='$hobbies', opzoek='$searching', email='$email' WHERE user_ID='$id'";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"Gebruiker succesvol geupdate!","alert"=>"info");
			$conn = null;
			header('location:my_profile.php');
            exit();
		}else{
			echo "
				<script>alert('Vul alle velden in!')</script>
				<script>window.location = 'my_profile.php'</script>
			";
		}
	}

    if(ISSET($_POST['dog_update'])){
		if($_POST['age'] != ""){
			try{
                $age = $_POST['age'];
                $dogs_ID = $_POST['dogs_ID'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE dogs SET leeftijd='$age' WHERE dogs_ID='$dogs_ID'";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"Hond succesvol geupdate!","alert"=>"info");
			$conn = null;
			header('location:my_profile.php');
			exit();
		}else{
			echo "
				<script>alert('Vul alle velden in!')</script>
				<script>window.location = 'my_profile.php'</script>
			";
		}
	}
    
    if(ISSET($_POST['dog_delete'])){
		try{
            $dogs_ID = $_POST['dogs_ID'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM dogs WHERE dogs_ID='$dogs_ID'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$_SESSION['message']=array("text"=>"Hond succesvol verwijderd!","alert"=>"info");
		$conn = null;
		header('location:my_profile.php');
        exit();
	}
?>
<?php error_reporting(0); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Dinder | Mijn Profiel</title>
    <link rel="icon" type="image" href="./Assets/images/Dinder_small_logo.png">

    <script src="https://kit.fontawesome.com/1395c9ece5.js" crossorigin="anonymous"></script>
    <script src="./Assets/javascript/script.js"></script>
</head>

<body>
    <?php include './otherheader.php';?>

    <?php
        $id = $_SESSION['user'];
        $sql = $conn->prepare("SELECT * FROM `users` WHERE `user_ID`='$id'");
        $sql->execute();
        $fetch = $sql->fetch();
    ?>

    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-2 offset-md-5 profile_picture">
                    <?php echo "<img src='./assets/images/profielen/".$fetch['profielfoto']."' >"; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h3 class="profile_name">
                        <strong><?php echo $fetch['voornaam'] . " " . $fetch['achternaam']?></strong></h3>
                </div>
            </div>
            <form method="POST" class="user_update_form">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table>
                            <tr>
                                <td style="width: 25%;">E-mailadres</td>
                                <td><input type="text" name="email" class="input-white"
                                        value=<?php echo $fetch['email']?>></td>
                            </tr>
                            <tr>
                                <td>Leeftijd</td>
                                <td><input type="number" name="age" class="input-purple"
                                        value=<?php echo $fetch['leeftijd']?>></td>
                            </tr>
                            <tr>
                                <td>Woonplaats</td>
                                <td><input type="text" name="residence" class="input-white"
                                        value=<?php echo $fetch['woonplaats']?>></td>
                            </tr>
                            <tr>
                                <td>Hobby's</td>
                                <td><textarea name="hobbies" class="input-purple" cols="10"
                                        rows="5"><?php echo $fetch['hobbies']?></textarea></td>
                            </tr>
                            <tr>
                                <td>Opzoek naar</td>
                                <td><textarea name="searching" class="input-white" cols="10"
                                        rows="5"><?php echo $fetch['opzoek']?></textarea></td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <input type="submit" name="user_update" value="Update" class="form_update_button">
                        </div>
                    </div>
                </div>
            </form>

            <?php
                $stmt = $conn->prepare("SELECT * FROM `dogs` WHERE `user_ID` = '$id'");
                $stmt->execute();
                $fetch = $stmt->fetch();
            ?>
            <?php
                    $sql = "SELECT dogs_ID, hondenfoto, naam, leeftijd, ras FROM dogs WHERE `user_ID` = '$id'";

                    try{
                        $stmt = $conn->query($sql);
                        
                        if($stmt === false){
                        die("Error");
                        }
                        
                    }catch (PDOException $e){
                        echo $e->getMessage();
                    }
                ?>
            <table>
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Naam</th>
                        <th>Leeftijd</th>
                        <th>Ras</th>
                        <th>Update</th>
                        <th>Verwijderen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo ("<img src='./assets/images/honden/".$row['hondenfoto']."' width='100px' >"); ?></td>
                        <td><?php echo ($row['naam']); ?></td>
                        <td><?php echo ($row['leeftijd']); ?></td>
                        <td><?php echo ($row['ras']); ?></td>
                        <td>
                            <form method="POST" class="dog-update-form">
                                <input type="number" name="age" class="dog-input-purple"
                                    value=<?php echo $row['leeftijd']?>>
                                <input type="submit" name="dog_update" value="Update" class="dog_update_button">
                                <input type="hidden" name="dogs_ID" class="dog-input-purple"
                                    value=<?php echo $row['dogs_ID']?>>
                            </form>
                        </td>
                        <td>
                            <form method="POST" class="dog-delete-form">
                                <input type="submit" name="dog_delete" value="Verwijderen" class="dog_delete_button">
                                <input type="hidden" name="dogs_ID" class="dog-input-purple"
                                    value=<?php echo $row['dogs_ID']?>>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>
</body>

</html>