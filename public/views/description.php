<?php //session_start(); ?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainpage-style.css">
    <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <script type="text/javascript" src="./public/js/saving.js" defer></script>
    <title>MAIN PAGE</title>
</head>
<body>
<header>
    <div class="left-items">
        <ul>
            <li><class="logo"><a href="#">Hobby networks</a></class></li>
            <li><a href="#"><i class="fas fa-moon"></i></a></li>
        </ul>
    </div>
    <div class="add-bar">
        <a href="add"><button id="add-button"><i class="fas fa-plus-square"></i> add something interesting...</button></a>
    </div>
    <div class="right-items">
        <ul>
            <!--                <li><a href="#"><i class="far fa-bell"></i></a> </li>-->
            <?php echo $_SESSION['user'];?>
            <li><a href="#"><i class="fas fa-user"></i></a></li>
            <a href="logout"><i class="fas fa-sign-out-alt"></i></a>
        </ul>
    </div>
</header>
<div class="main-container">
    <nav>
        <div class="up-items">
            <ul>
                <li>
                    <a href="hobbies"><i class="fas fa-columns"></i></a>
                </li>
                <li>
                    <a href="saved"><i class="fas fa-save"></i></a>
                </li>
            </ul>
        </div>
        <div class="down-items">
            <ul>
                <li>
                    <a href="upgrade"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li>
                    <a href=""><i class="fas fa-search"></i></a>
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
    <main>

    </main>
</div>
</body>