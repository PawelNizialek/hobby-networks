<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <script type="text/javascript" src="./public/js/registration.js" defer></script>
    <title>SIGN UP</title>
</head>
<body>
    <div class="container">
        <div class = "logo">
            Hobby networks
        </div>
        <div class="login-container">
            <form class="register" action="register" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="password">
                <input name="confirmedPassword" type="password" placeholder="confirm password">
                <input name="firstname" type="text" placeholder="First Name">
                <input name="lastname" type="text" placeholder="Last Name">
                <button type="submit">REGISTER</button>
            </form>
        </div>
    </div>
</body>