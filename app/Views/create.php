<?php
$this->title = $data['title'];
$this->metaDescription = $data['description'];
?>
<?php if(isset($_SESSION['success'])):?>
<div class="col-md-8 col-md-offset-2">
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['success']; unset($_SESSION['success']);?>
    </div>
</div>
<?php else: ?>
    <div class="col-md-4 col-md-offset-5">
        <h3>Create new Post</h3>
    </div>
    <div class="col-md-4 col-md-offset-2">
        <h3>Enter post</h3>
        <form action="/makeCreate" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="short_description">Short description</label>
                <textarea name="short_description" id="short_description" class="form-control" rows="3" placeholder="Enter short description" required></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="7" placeholder="Enter description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <h3>Upload post</h3>
        <form action="/makeCreateUpload" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="btn btn-default btn-file">
                    Browse <input type="file" name="post" style="display: none;" required>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <?php if(isset($_SESSION['error']) && $_SESSION['error']):?>
            <div class="alert alert-danger" role="alert" style="margin-top: 15px">
                <strong>Oops! </strong><?=$_SESSION['error']; unset($_SESSION['error'])?>
            </div>
        <?php endif;?>
    </div>
<?php endif;?>
