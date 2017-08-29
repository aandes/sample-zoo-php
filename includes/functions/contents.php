<?php
    
    /**
     * Fetches and returns content from the CMS.
     * 
     * @param string [$page=null]   The current page is used of not provided.
     * @param string [$key=null]    The content for the entire page is fetched
     *                              if not provided.
     * 
     * @return array
     */
    function content_get ($page = null, $key = null) {
        
        $content = @file_get_contents(sprintf(CMS_CONTENT_FORMAT, 
            empty($page) ? content_page() : $page, 
            empty($key) ? '' : $key));

        return empty($content) ? array() : json_decode($content, /*assoc*/true);

    }

    /**
     * Resolves and returns the current page name.
     * Simple but sufficient for this vanilla site.
     * 
     * @return string
     */
    function content_page () {
        
        return basename($_SERVER['PHP_SELF'], '.php');

    }