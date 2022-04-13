<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Dinder | Login</title>
    <link rel="icon" type="image" href="./Assets/images/Dinder_small_logo.png">

    <script src="https://kit.fontawesome.com/1395c9ece5.js" crossorigin="anonymous"></script>
    <script src="./Assets/javascript/script.js"></script>
</head>

<body>
    <?php $page = 'login'; include './otherheader.php';?>

    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 user_form">
                    <h3>Inloggen Dinder</h3>
                    <?php if(isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg">
                        <?php echo $_SESSION['message']['text'] ?>
                    </div>
                    <script>
                        (function () {
                            setTimeout(function () {
                                document.querySelector('.msg').remove();
                            }, 3000)
                        })();
                    </script>
                    <?php 
                        endif;
                        // clearing the message
                        unset($_SESSION['message']);
                    ?>
                    <form action="login_query.php" method="POST">
                        <div class="form-group">
                            <input type="text" id="username" name="username" placeholder="Gebruikersnaam" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Wachtwoord" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" onclick="showPassword()">
                            <label for="showPassword"> Laat wachtwoord zien</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" value="Login" class="form_button">
                        </div>
                    </form>
                    <div class="row login_options">
                        <div class="col-sm-6 offset-md-3">
                            <p>Nog geen account? <a href="./registreer.php">Registreer hier!</a></p>
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