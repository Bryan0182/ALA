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
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Dinder | Inbox</title>
    <link rel="icon" type="image" href="./Assets/images/Dinder_small_logo.png">

    <script src="https://kit.fontawesome.com/1395c9ece5.js" crossorigin="anonymous"></script>
    <script src="./Assets/javascript/script.js"></script>
    <script src="./Assets/javascript/jquery.js"></script>
</head>

<body>
    <?php include 'otherheader.php'; ?>

    <div class="holder">
        <label="welcomemsg">Welkom </label><label for="name"><?php echo $fetch['voornaam']; ?></label>
            <div class="style">
                <div class="alpha">
                    <b align="center">Bekijk hier uw chats:</b>
                    <input name="user" type="hidden" id="username" value="<?php echo $fetch['gebruikersnaam']; ?>" />
                    <div class="refresh"></div>
                    <br />
                    <form name="newMessage" class="newMessage" action="" onsubmit="return false">
                        <select name="recipient" id="recipient" style="width:270px;">
                            <option>--Verzend bericht naar--</option>
                            <?php 
                                $sql = "SELECT * FROM users WHERE user_ID !='$id' ORDER BY gebruikersnaam";
                                $qry = $conn->prepare($sql);
                                $qry->execute();
                                $fetch = $qry->fetchAll();
                                foreach ($fetch as $fe):
                                    $name = $fe['gebruikersnaam'];
								?>
                            <option title="<?php echo $name; ?>"><?php echo $fe['gebruikersnaam']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                        <textarea name="message" id="message">Bericht</textarea>
                        <input name="submit" type="submit" value="Verzend" id="send" />
                    </form>
                </div>
            </div>
            <script src="./Assets/javascript/sendchat.js" type="text/javascript"></script>
            <script src="./Assets/javascript/refresh.js" type="text/javascript"></script>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>