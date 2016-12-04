<?php
$this->title = 'Home page';
$this->metaDescription = 'The Crowdin home page.';
?>
<div class="col-md-8 col-md-offset-2">
    <div class="posts">
        <?php foreach ($posts as $post): ?>
            <h2><?= $post['title'] ?></h2>
            <p class="created-at"><?= \App\Core\Helper::convertDate($post['created_at']) ?></p>
            <p><?= $post['short_description'] ?></p>
            <p><a class="btn btn-default" href="post/<?= $post['id'] ?>" role="button">View more &raquo;</a></p>
        <?php endforeach; ?>
    </div>
</div>

<div class="col-md-2 col-md-offset-5 col-xs-offset-0 text-center">
    <div class="btn-group btn-group-lg">
        <button type="button" class="btn btn-primary" id="load_more">Load more</button>
    </div>
</div>