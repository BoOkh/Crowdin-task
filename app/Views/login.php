<?php
$this->title = $data['title'];
$this->metaDescription = $data['description'];
?>
<div class="col-md-8 col-md-offset-2">
    <h3>Login</h3>
    <?php if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger" role="alert">
            <strong>Oops! </strong><?=$_SESSION['error']; unset($_SESSION['error'])?>
        </div>
    <?php endif;?>
    <form action="/makeLogin" method="post">
        <div class="form-group">
            <label for="login">Your login:</label>
            <input type="text" class="form-control" name="login" id="login" placeholder="Enter your login" required>
        </div>
        <div class="form-group ">
            <label for="password">Your password:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
