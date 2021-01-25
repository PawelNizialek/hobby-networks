<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/upgrade.css">
    <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>
<body>
<?php include('navigation.php')?>
<div class="main-container">
    <div class="main-container">
        <nav>
            <div class="up-items">
                <ul>
                    <li>
                        <a href="hobbies"><i class="fas fa-columns"></i></a>
                    </li>
                    <li>
                        <a href="saved"><i class="fas fa-archive"></i></a>
                    </li>
                </ul>
            </div>
            <div class="down-items">
                <ul>
                    <li>
                        <a href="upgrade"><i class="fas fa-shopping-cart"></i></a>
                    </li>
                    <li>
                        <a href="search"><i class="fas fa-search"></i></a>
                    </li>
                    <li>
                        <i class="fas fa-user-friends"></i>
                    </li>
                    <li>
                        <i class="fab fa-facebook-messenger"></i>
                    </li>
                    <li>
                        <a href="settings"><i class="fas fa-cog"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <main>
        <div class="message">Click for upgrade!<br>It is free now!</div>
        <div class="features">
            Features:<br>
            * Search Engine<br>
            * Unlimited saving
        </div>
        <a href="setRole"><button>Yes, I want to have more possibilities!</button></a>

        <br>
        <div class="premium">
            <?php if(isset($message)){
                echo $message;
            }else{
            }
            ?>
        </div>
        <div>
            <?php
                echo "You are ".$_SESSION["user-role"]." now!";
            ?>
        </div>
    </main>
</div>
</body>
