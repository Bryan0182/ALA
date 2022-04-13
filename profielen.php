<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();

	if(!ISSET($_SESSION['user'])){
		header('location:login.php');
	}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Dinder | Profielen</title>
    <link rel="icon" type="image" href="./Assets/images/Dinder_small_logo.png">

    <script src="https://kit.fontawesome.com/1395c9ece5.js" crossorigin="anonymous"></script>
    <script src="./Assets/javascript/script.js"></script>
</head>

<body>
    <?php $page = 'profielen'; include './otherheader.php';?>

    <section class="main">
        <div class="container">
            <?php
                $id = $_SESSION['user'];
                $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_ID != $id ORDER BY RAND() LIMIT 1");
                $stmt->execute();
                $fetch = $stmt->fetch();
                $user = $fetch['user_ID'];
            ?>

            <div class="col-md-6 offset-md-4">
                <div class="profile_view">
                    <div class="profile_image">
                        <?php echo "<img src='./assets/images/profielen/".$fetch['profielfoto']."' >"; ?>
                    </div>
                    <div class="profile_detials">
                        <h3><?php echo $fetch['voornaam'] . " " . $fetch['achternaam']?></h3>
                        <h5><?php echo $fetch['leeftijd']?></h5>
                    </div>
                    <?php
                    $sql = 'SELECT dogs_ID, hondenfoto, naam, leeftijd, ras FROM dogs WHERE `user_ID` = '. $user .'';

                    try{
                        $stmt = $conn->query($sql);
                        
                        if($stmt === false){
                        die("Error");
                        }
                        
                    }catch (PDOException $e){
                        echo $e->getMessage();
                    }
                ?>
                <table width="100%">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Naam</th>
                            <th>Leeftijd</th>
                            <th>Ras</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                            <tr>
                                <td><?php echo ("<img src='./assets/images/honden/".$row['hondenfoto']."' width='100px' >"); ?></td>
                                <td><?php echo ($row['naam']); ?></td>
                                <td><?php echo ($row['leeftijd']); ?></td>
                                <td><?php echo ($row['ras']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                    <div class="profile_buttons">
                        <div id="dislike"><a href="profielen.php" class="trigger"><i class="fa-solid fa-thumbs-down"></i></a></div>
                        <div id="like"><a href="inbox.php" class="trigger"><i class="fa-solid fa-thumbs-up"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="./Assets/javascript/script.js"></script>

    <?php include 'footer.php';?>
</body>

</html>