<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <link rel="stylesheet" type="text/css" href="public/css/search.css">
    <link rel="stylesheet" type="text/css" href="public/css/mainpage-style.css">
    <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>search</title>
</head>
<body>
<header>
    <div class="left-items">
        <ul>
            <li><class="logo"><a href="#">Hobby networks</a></class></li>
            <li><a href="#"><i class="fas fa-moon"></i></a></li>
        </ul>
    </div>
    <div class="search-container">
        <div class="search-bar"><input name="title" type="text" placeholder="search hobby..."></div>
    </div>
    <div class="right-items">
        <ul>
            <?php echo $_SESSION['user'];?>
            <li><a href="#"><i class="fas fa-user"></i></a></li>
            <a href="logout"><i class="fas fa-sign-out-alt"></i></a>
        </ul>
    </div>
</header>
<div class="main-container">
    <?php include('side.php')?>
        <main>
            <?php include('hobbycontainer.php') ?>
        </main>
</div>
</body>

<template id="hobby-template">
    <div id="<?= $hobby->getId() ?>">
        <div id="title">
            <div id="person">
                <?= $hobby->getUser() ?>
            </div>
            <div id="send-time">
                2 hours ago
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
                <div id="time">

                </div>
                <div id="ABOUT">
                    <a href="description"><button>ABOUT HOBBY...</button></a>
                </div>
                <div id="save-button">
                    <i class="far fa-save"></i>
                </div>
            </div>
        </div>
    </div>
</template>