<!DOCTYPE html>
<html lang="en">
<?php
    require 'conn.php';
    session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Dinder | Hond Registreren</title>
    <link rel="icon" type="image" href="./Assets/images/Dinder_small_logo.png">

    <script src="https://kit.fontawesome.com/1395c9ece5.js" crossorigin="anonymous"></script>
    <script src="./Assets/javascript/script.js"></script>
</head>

<body>
    <?php include './otherheader.php';?>

    <section class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 user_form">
                    <h3>Registreer hier uw hond</h3>
                    <form action="./dogs_register_query.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Naam" required>
                        </div>
                        <div class="form-group">
                            <input type="number" id="age" name="age" placeholder="Leeftijd" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="breed" name="breed" placeholder="Ras" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="register_dog" value="Registreer" class="form_button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <?php include 'footer.php';?>
</body>

</html>