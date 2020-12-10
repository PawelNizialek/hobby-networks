<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
<!--    <link rel="stylesheet" type="text/css" href="public/css/mainpage-style.css">-->
      <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <title>MAIN PAGE</title>
</head>
<body>
    <header>
        <div class="left-items">
            <ul>
                <li><a href="#">B</a> </li>
                <li><a href="#"><i class="fas fa-toggle-off"></i></a></li>
            </ul>
        </div>
        <div class="add-bar">
            <a href="add"><button id="add-button"><i class="fas fa-plus-square"></i> add something interesting...</button></a>
        </div>
        <div class="right-items">
            <ul>
                <li><a href="#"><i class="far fa-bell"></i></a> </li>
                <li><a href="#"><i class="fas fa-user"></i></a></li>
            </ul>
        </div>
    </header>
    <div class="main-container">
        <section>
            <div class="up-items">
                <ul>
                    <li>
                        <a href="mainpage"><i class="fas fa-columns"></i></a>
                    </li>
                    <li>
                        <a href="saved"><i class="far fa-save"></i></a>
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
                        <a href="groups"><i class="fas fa-user-friends"></i></a>
                    </li>
                    <li>
                        <a href="messenger"><i class="fab fa-facebook-messenger"></i></a>
                    </li>
                    <li>
                        <a href="settings"><i class="fas fa-cog"></i></a>
                    </li>
                </ul>
            </div>
        </section>
        <main>
            <section class="hobbies">
                <div id="hobby-1">
                    <div id="title">
                        <div id="person-image">

                        </div>
                        <div id="person">
                            Daniel
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
                        <div id="descritpion">
                            <?= $hobby->getDescription() ?>
                        </div>
                        <div id="stats">
                            <div id="stars">
                                301
                            </div>
                            <div id="comments">
                                45
                            </div>
                            <div id="time">
                                1:03:05
                            </div>
                            <dive id="save-button">
                                SAVE
                            </dive>
                        </div>
                    </div>

                </div>
                <div>hobby-2</div>
            </section>
        </main>
    </div>
</body>