<div>
<?php foreach (get_news() as $news) : ?>
    <div class="news-list">
        <a class="list-group-item" href="?page=the-group-news-single&amp;id=<?= $news['id'] ?>">
            <h3 class="news-title"><?= $news['title'] ?></h3>
            <div class="news-summary">
                <?= $news['summary'] ?>
            </div>
        </a>
    </div>
<?php endforeach; ?>

</div>
