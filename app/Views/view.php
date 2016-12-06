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
                <?php if(isset($_SESSION['admin'])): ?>
                    <a href="/delete/<?= $post['id'] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-trash">Delete</span></a>
                    <a href="/edit/<?= $post['id'] ?>" class="btn btn-info"><span class="glyphicon glyphicon-edit">Edit</span></a>
                    <a class="btn btn-primary" id="download_post"><span class="glyphicon glyphicon-save">Download</span></a>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
