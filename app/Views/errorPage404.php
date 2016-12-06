<?php
$this->title = 'Error 404(Not found)';
$this->metaDescription = 'Error 404(Not found)';
?>
    <div class="col-md-8 col-md-offset-4 col-xs-offset-1">
        <h2>404. That’s an error.</h2>
        <p>The requested URL <?=\App\Core\Request::uri()?> was not found on this server.</p>
        <p>That’s all we know.</p>
    </div>
