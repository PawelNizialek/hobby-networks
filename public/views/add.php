<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/add-hobby.css">
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
        <form action="addHobby" method="POST" ENCTYPE="multipart/form-data">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="title" type="text" placeholder="title">
            <textarea name="description" rows=5 placeholder="description"></textarea>

            <input type="file" name="file"/><br/>
            <button type="submit">send</button>
        </form>
    </main>
</div>
</body>
