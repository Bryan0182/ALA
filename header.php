<div class="mobile_menu">
    <div class="topnav">
        <img src=" ./Assets/images/Dinder.png" alt="" class="mobile-menu-logo">
        <div id="myLinks">
            <a class="<?php if($page== 'home'){echo 'mobile_active';} ?>" href="index.php"><i
                    class="fa-solid fa-house"></i> Home</a>
            <a class="<?php if($page== 'profielen'){echo 'mobile_active';} ?>" href="profielen.php"><i
                    class="fa-solid fa-users"></i> Profielen</a>
            <a class="<?php if($page== 'experience'){echo 'mobile_active';} ?>" href="experience.php"><i
                    class="fa-solid fa-heart"></i> The experience</a>
            <a class="<?php if($page== 'contact'){echo 'mobile_active';} ?>" href="contact.php"><i
                    class="fa-solid fa-envelope"></i> Contact</a>
            <a class="<?php if($page== 'login'){echo 'active';} ?>" href="signin.php"><i
                    class="fa-solid fa-lock-open"></i> Login</a>
            <a class="<?php if($page== 'registreer'){echo 'active';} ?>" href="registreer.php"><i
                    class="fa-solid fa-key"></i> Registreer</a>
            <a class="<?php if($page== 'uitloggen'){echo 'active';} ?>" href="logout.php"><i
                    class="fa-solid fa-lock"></i> Uitloggen</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="mobileMenu()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</div>
<header>
    <div class="desktop_menu">
        <img src="./Assets/images/banner.jpg" alt="Dogs walking" class="dog-banner">
        <div class="logo">
            <a href="index.php"><img src="./Assets/images/Dinder.png" alt="" class="menu-logo"></a>
        </div>
        <div class="menu">
            <ul>
                <li><a class="<?php if($page== 'home'){echo 'active';} ?>" href="index.php"><i
                            class="fa-solid fa-house"></i> Home</a></li>
                <li><a class="<?php if($page== 'profielen'){echo 'active';} ?>" href="profielen.php"><i
                            class="fa-solid fa-users"></i> Profielen</a></li>
            </ul>
        </div>
        <div class="right_menu">
            <ul>
                <?php if (isset($_SESSION['user']) === true) : ?>
                <?php
                    $id = $_SESSION['user'];
                    $sql = $conn->prepare("SELECT * FROM `users` WHERE `user_ID`='$id'");
                    $sql->execute();
                    $fetch = $sql->fetch();
                ?>
                <div class="dropdown">
                    <li><button class="dropbtn"><i class="fa-solid fa-user"></i>
                            <?php echo "Welkom " . $fetch['voornaam']?>
                            <i class="fa fa-caret-down"></i></button>
                        <div class="dropdown-content">
                            <a href="my_profile.php">Mijn profiel</a>
                            <a href="inbox.php">Inbox</a>
                            <a href="honden_registratie.php">Hond toevoegen</a>
                            <a href="logout.php">Uitloggen</a>
                        </div>
                    </li>
                </div>
                    <?php else : ?>
                    <li><a class="<?php if($page== 'login'){echo 'active';} ?>" href="<?= ('login.php') ?>"><i
                                class="fa-solid fa-lock-open"></i> Login</a></li>
                    <li><a class="<?php if($page== 'registreer'){echo 'active';} ?>" href="<?= ('registreer.php') ?>"><i
                                class="fa-solid fa-key"></i> Registreer</a></li>
                    <?php endif; ?>
            </ul>
        </div>

        <div class="banner">
            <h1>Dinder</h1>
            <h3>De dating app voor mensen met een hond!</h3>
            <a href="./registreer.php"><button class="home-button">Aanmelden</button></a>
        </div>
    </div>

</header>