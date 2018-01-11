<?php

    // compile-time configurations

        // whether the apps is in authoring mode
        const AUTHORING = true;
        
        // the target app name in the CMS
        const CMS_MIRROR = 'sample-zoo-php';
        
        // the CMS origin
        const CMS_ORIGIN = 'http://localhost:4502';
        
        // the CMS use credentials
        const CMS_CREDS = 'admin:admin';
        
        // a dummy placeholder image
        const CMS_IMG_PLACEHOLDER  = '/libs/cq/ui/widgets/themes/default/placeholders/img.png';
        
        // RAPID's origin (usually same as the CMS')
        const RAPID_ORIGIN = CMS_ORIGIN;
        
        // optional and specific to this app:
        // whether tpp allow content authors to add new components to pages
        const ALLOW_COMPONENTS_INSERTION = true;
    

    // run-time configurations

        // templates dir
        define('DIR_TPL', ROOT . '/tpl');
        
        // resolves the CMS origin (whether to add credentials or not)
        define('CMS_CONTENT_ORIGIN', empty(CMS_CREDS) ? CMS_ORIGIN : preg_replace(
            '/^(https?:\/\/)(.*)/', '$1' . CMS_CREDS . '@$2' , CMS_ORIGIN));
        
        // templated string to resolve content paths
        define('CMS_CONTENT_FORMAT', CMS_CONTENT_ORIGIN . '/content/' . CMS_MIRROR . 
            '/%s/jcr:content/%s.infinity.json?wcmmode=disabled');