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