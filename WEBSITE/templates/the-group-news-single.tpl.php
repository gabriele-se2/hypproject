<script>
addBackButton();
</script>

<?php $news = get_news_single(); ?>
<div class="news-single">
    <h3 class="news-title"><?= $news['title'] ?></h3>
    <div class="news-content">
        <?= $news['content'] ?>
    </div>
</div>

</div>
