<?php //session_start(); ?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainpage-style.css">
    <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <script type="text/javascript" src="./public/js/saving.js" defer></script>
    <script type="text/javascript" src="./public/js/description.js" defer></script>

    <title>MAIN PAGE</title>
</head>
<body>
    <?php include('navigation.php')?>
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
        <main>
            <div class="hobbies">
                <?php foreach ($hobbies as $hobby): ?>
                <div id="<?= $hobby->getId() ?>">
                    <div id="title">
                        <div id="person">
                            <?= $hobby->getUser() ?>
                        </div>
                        <div id="send-time">
                            <?= $hobby->getDate() ?>
                        </div>

                    </div>
                    <div id="hobby-image">
                        <img src="public/upload/<?=$hobby->getImage()?>">
                    </div>
                    <div id="description">
                        <div id="name">
                            <?= $hobby->getTitle() ?>
                        </div>
                        <div id="hobby-description">
                            <?= $hobby->getDescription() ?>
                        </div>
                        <div id="stats">
                            <div id="stars">
                                <i class="far fa-star"><?= $hobby->getStars(); ?></i>
                            </div>
                            <div id="ABOUT">
                                <button>ABOUT HOBBY...</button>
                            </div>
                            <div id="save-button">
                                <i class="far fa-save"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>