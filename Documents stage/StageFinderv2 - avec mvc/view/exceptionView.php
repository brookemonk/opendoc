<?php $title = "Exception"; ?>
<?php ob_start(); ?>

<div>Exception occured in the website</div>
<div>Message : <?= $e->getMessage(); ?></div>
<div>Code :    <?= $e->getCode(); ?>   </div>
<div>File :    <?= $e->getFile(); ?>   </div>
<div>Line :    <?= $e->getLine(); ?>   </div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php');   ?>