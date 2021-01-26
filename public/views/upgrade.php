<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/upgrade.css">
    <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>
<body>
<?php include('header.php')?>
<div class="main-container">
    <div class="main-container">
        <?php include('side.php')?>
    </div>
    <main>
        <div class="message">Click for upgrade!<br>It is free now!</div>
        <div class="features">
            Features:<br>
<!--            * Search Engine<br>-->
            * Unlimited saving
        </div>
        <a href="setRole"><button>Yes, I want to have more features!</button></a>

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
