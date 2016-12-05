<?php
$this->title = $post['title'];
$this->metaDescription = $post['description'];
?>
<div class="posts" id="post" post-id="<?= $post['id'] ?>">
    <div class="col-md-8 col-md-offset-2">
        <h2><?= $post['title'] ?></h2>
        <p class="created-at"><?= \App\Core\Helper::convertDate($post['created_at']) ?></p>
        <p><?= $post['description'] ?></p>
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <a class="btn btn-default" href="/" role="button">&laquo; Get back</a>
            </div>
            <div class="col-md-6 col-xs-6 text-right" id="download_btn">
                <a class="btn btn-primary" id="download_post"><span class="glyphicon glyphicon-save">Download</span></a>
            </div>
        </div>
    </div>
</div>
