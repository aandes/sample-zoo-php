<!--<?php /* component animalcard */ ?>-->
<div <?php $cKey($key); ?>
    class="animal-card animal-card-app">

    <h3><?php $cOut('title', 'Insert animal name'); ?></h3>

    <img src="<?php echo CMS_ORIGIN . $cVal('image/filePath', CMS_IMG_PLACEHOLDER) .
                    // disable cache when editing
                    (AUTHORING ? "?_" . dechex(rand()) : ''); ?>" 
         alt="<?php $cOut('title'); ?>">

    <p><?php $cOut('description', 'Insert animal description'); ?></p>
    
</div>