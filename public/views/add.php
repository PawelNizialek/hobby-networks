<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/navigation.css">
    <script src="https://kit.fontawesome.com/c648cced1d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="public/css/add-hobby.css">
    <title>MAIN PAGE</title>
</head>
<body>
<?php include('header.php')?>
<div class="main-container">
    <?php include('side.php')?>
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
