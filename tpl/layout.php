<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?php $cOut('jcr:title', 'Insert a title'); ?></title>
        <meta name="description" content="<?php $cOut('jcr:description', 'Insert a description'); ?>">
        <?php include 'includes/rapid.php'; ?>
        <?php include 'includes/assets.php'; ?>
    </head>
    
    <body class="<?php echo content_page(); ?>"><?php
        
        tpl_include($template, $content);

    ?></body>
</html>