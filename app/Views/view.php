<?php
$this->title = $post['title'];
$this->metaDescription = $post['description'];
?>
<div class="posts">
    <div class="col-md-8 col-md-offset-2">
        <h2><?=$post['title']?></h2>
        <p class="created-at"><?=\App\Core\Helper::convertDate($post['created_at'])?></p>
        <p><?=$post['description']?></p>
        <p><a class="btn btn-default" href="/" role="button">&laquo; Get back</a></p>
    </div>
</div>
