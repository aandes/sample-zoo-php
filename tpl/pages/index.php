<div class="container">

    <h1 <?php $cKey("zoo-title"); ?>>
        <?php $cOut('zoo-title/jcr:title', 'Please provide a title'); ?>
    </h1>

    <p <?php $cKey("zoo-description"); ?>>
        <?php $cOut('zoo-description.text', 'Please provide a description'); ?>
    </p>

    <?php tpl_include('partials/components/_link-button',
        $cVal('see-aquatic-btn', array()), array('key'=>'see-aquatic-btn')); ?>

</div>