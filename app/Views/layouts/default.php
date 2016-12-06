<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $this->metaDescription ?>">
    <link rel="stylesheet" href="/public/css/main.css">
    <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/bootstrap/css/bootstrap-theme.min.css">
    <script src="/public/lib/jquery/1.12.4/jquery.min.js"></script>
    <script src="/public/lib/dateFormat/jquery-dateFormat.min.js"></script>
    <script src="/public/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/js/app.js"></script>
    <title><?= $this->title ?></title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Crowdin Space</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php if(\App\Core\Request::uri() == '') echo 'active';?>"><a href="/">Home</a></li>
                            <?php if(isset($_SESSION['admin'])){ ?>
                                <li class="<?php if(\App\Core\Request::uri() == 'create') echo 'active';?>"><a href="/create">Create post</a></li>
                            <?php }?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if(isset($_SESSION['admin'])){ ?>
                                <li><a href="/logout"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
                            <?php } else { ?>
                                <li class="<?php if(\App\Core\Request::uri() == 'login') echo 'active';?>"><a href="/login"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <?= $content ?>
        <div class="col-md-8 col-md-offset-2">
            <hr>
            <footer>
                <p>&copy; 2016 Bohdan Okhrimchuk</p>
            </footer>
        </div>
    </div>
</div>
</body>
</html>