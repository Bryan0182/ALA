<!DOCTYPE html>
<?php
	require 'conn.php';
	session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <title>Dinder | Home</title>
    <link rel="icon" type="image" href="./Assets/images/Dinder_small_logo.png">

    <script src="https://kit.fontawesome.com/1395c9ece5.js" crossorigin="anonymous"></script>
    <script src="./Assets/javascript/script.js"></script>
</head>

<body>
    <?php $page = 'home'; include './header.php';?>

    <section class="main">
        <div class="container">
            <div class="row mobile-overview">
                <div class="col-md-5 main-info">
                    <h2>Waarom kiezen voor Dinder?</h2>
                    <p>Dinder is het meest gebruikte platform voor hondeneigenaar, want zeg nou zelf wat is er leuker
                        dan een date en tegelijkertijd met de hond te wandelen?</p>
                    <p>Dinder zorgt ervoor dat je heerlijk naar buiten gaat om te wandelen en tegelijkertijd zorgt voor
                        een fantastische date.</p>
                </div>
                <div class="col-md-5 offset-2 main-info">
                    <h2>Wat zijn de voordelen van Dinder?</h2>
                    <p>Dinder is een gratis datingplatform</p>
                    <p>Dinder bevat mensen die graag willen wandelen</p>
                    <p>Dinder bevat veel mensen met een hond</p>
                </div>
            </div>
        </div>

        <div class="divider">
            <div class="container">
                <div class="row divider-numbers">
                    <div class="col-md-4">
                        <p class="users">Dinder heeft al <span class="users-number"><?php $sql = "SELECT COUNT(*) FROM users";
                            $res = $conn->query($sql);
                            $count = $res->fetchColumn();

                            print $count; ?></span> gebruikers!
                        </p>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <p class="users">Dinder heeft al <span class="users-number"><?php $sql = "SELECT COUNT(*) FROM matches";
                            $res = $conn->query($sql);
                            $count = $res->fetchColumn();

                            print $count; ?></span> matches gemaakt!</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mobile-overview">
                <div class="col-md-5 main-info">
                    <h2>Tientallen mensen gingen u voor!</h2>
                    <p>Op Dinder zit altijd iemand die graag met u op date gaan of willen gaan wandelen.</p>
                </div>
                <div class="col-md-5 offset-2 main-info">
                    <h2>Wat maakt ons zo anders?</h2>
                    <p>Dinder is helemaal anders dan andere datingsites, beter en leukere mensen</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php';?>
</body>

</html>