<header>
    <div class="left-items">
        <ul>
            <li><class="logo"><a href="">Hobby networks</a></class></li>
        </ul>
    </div>
    <div class="add-bar">
        <a href="add"><button id="add-button"><i class="fas fa-plus-square"></i> add something interesting...</button></a>
    </div>
    <div class="right-items">
        <ul>
            <?php echo $_SESSION['user'];?>
            <li><a href="#"><i class="fas fa-user"></i></a></li>
            <a href="logout"><i class="fas fa-sign-out-alt"></i></a>
        </ul>
    </div>
</header>