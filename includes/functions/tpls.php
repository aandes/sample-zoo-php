<?php
    
    /**
     * Output's RAPID data-designmode tag along
     * with the given key if the app is in authoring
     * mode. Othewose an empty string is returned
     * 
     * @param string $key
     * @return string
     */
    function tpl_key ($key) {
    
        return AUTHORING ? "data-designmode=\"$key\"" : '';
    
    }
    
    /**
     * Includes, evaluates and outputs the a template.
     * 
     * @param string $path      The template path relative to the
     *                          template directory.
     * @param array [$content]  Contents to pass to the template.
     *                          This will be used in the $cVal and
     *                          $cOut function and also available
     *                          at the $content variable whithin
     *                          the template.
     * @param array [$data]     Data to pass to the template.
     *                          Keys of this array will be extracted
     *                          to variables in the template. Ensure
     *                          that all keys can be used as variable
     *                          name.
     */
    function tpl_include ($path, 
            array $content = array(), array $data = array()) {

        echo tpl_load($path, $content, $data);

    }
    
    /**
     * Includes, evaluates and returns a template's output.
     * 
     * @param string $path      The template path relative to the
     *                          template directory.
     * @param array $content    Contents to pass to the template.
     *                          This will be used in the $cVal and
     *                          $cOut function and also available
     *                          at the $content variable whithin
     *                          the template.
     * @param array $data       Data to pass to the template.
     *                          Keys of this array will be extracted
     *                          to variables in the template. Ensure
     *                          that all keys can be used as variable
     *                          name.
     * @return string
     */
    function tpl_load ($path, array $content, array $data) {
        
        // set up path
        $file = DIR_TPL . "/$path.php";
        
        if (!is_file($file)) {
            trigger_error("Unknown template '$path'!");
        }

        // create helpers
        $cKey=function($k){echo tpl_key($k);};
        $cVal=tpl_create_content_closure($content);
        $cOut=tpl_create_content_closure($content, /*output*/true);
        
        // create scoped varibles 
        extract($data);

        // process template
        ob_start();
        include $file;
        $output = ob_get_contents();
        ob_end_clean();
        
        // clean up
        unset($cOut, $cVal, $cKey);
        
        foreach ($data as $_k => $_v) {
            unset($$_k);
        }
        
        // done
        return $output;

    }
    
    /**
     * Creates a content helper backed by the 
     * values of the given array.
     * 
     * @param array $data
     * @param boolean $output Whether to print or return the content
     * @return callable
     */
    function tpl_create_content_closure (array $data, $output=false) {
        
        /**
         * A content helper.
         * 
         * @param mixed $key array of paths or string property path 
         *                   separated by a forward slash.
         * @param mixed $default a default value to use if no property 
         *                       was found at the path or the property
         *                       value is null or empty
         * 
         * @return mixed null if this closure was created with $output=true
         *                    or the value found at the given path
         *                    or the value of $default
         * 
         * @example
         * 
         * // string paths
         * $cOut('some/deep/property', 'Or a default value');
         * $var = $cVal('some/deep/property', 'Or a default value');
         * 
         * // array paths
         * $cOut(array('some', 'deep', 'property', 'Or a default value');
         * $var = * $cVal(array('some', 'deep', 'property', 'Or a default value');
         */
        return function ($key, $default=null) use ($data, $output) {

            $parts = is_array($key) ? $key : explode('/', $key);
            $content = array_nested_key_exists($parts, $data) ?
                array_nested_get($parts, $data) : 
                null;

            if ($default !== null && string_is_null_or_empty($content)) {
                $content = $default;
            }
            
            if (!$output) {
                return $content;
            }

            echo $content;

        };

    }