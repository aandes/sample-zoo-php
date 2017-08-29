<?php
    
	include_once 'strings.php';

	/**
	 * Tells if an element of an array that was expected to be a string
	 * is either not set, NULL or equal to an empty string.
	 * 
	 * @param mixed $key    The array key
	 * @param array $array  The array
	 * 
	 * @return boolean
	 */
	function key_is_null_or_empty ($key, $array){

        return !array_key_exists($key, $array) || 
            string_is_null_or_empty($array[$key]);

	}

	/**
	 * Tells if an element of an array that was expected to be a string
	 * is either not set, NULL, equal to an empty string,
	 * or contains nothing but white spaces.
	 * PHP's <code>trim</code> default white space characters are used.
	 * 
	 * @param mixed $key    The array key
	 * @param array $array  The array
	 * 
	 * @return boolean
	 */
	function key_is_null_or_whitespace ($key, $array) {

        return !array_key_exists($key, $array) || 
            string_is_null_or_whitespace($array[$key]);

	}
    
    /**
     * Tells whether a key exists in the provided multidimensional $array.
     * 
     * @param array $keys   An array of strings that represents the key sequence.
     * @param array $array  The array to look in.
     * 
     * @return boolean
     * 
     * @example
     * $multi   = array('a' => array('b' => array('c' => 10)));
     * array_nested_key_exists(array('a', 'b', 'c'), $multi);              // return TRUE
     */
    function array_nested_key_exists (array $keys, array $array) {
        
        $exists = FALSE;
            
        foreach ($keys as $key) {
            
            $exists = is_array($array) && array_key_exists($key, $array);
            
            if ($exists) {

                $array = $array[$key];

            }
            else {

                break;

            }

        }
        
        return $exists;
        
    }
    
    /**
     * Returns the value associated with a key  from the 
     * provided multidimensional $array. One MUST check
     * whether the key exists using {@link array_nested_key_exists}
     * prior to attemp to get its value.
     * 
     * @param array $keys   An array of strings that represents the key sequence.
     * @param array $array  The array to look in.
     * 
     * @return mixed
     * 
     * @example
     * $multi   = array('a' => array('b' => array('c' => 10)));
     * array_nested_get(array('a', 'b', 'c'), $multi);              // executes $multi['a']['b']['c'] and return 10
     */
    function array_nested_get (array $keys, array $array) {
        
        for ($i = 0, $count = count($keys); $i < $count; $i += 1) {
            
            $array = $array[$keys[$i]];
            
        }
        
        return $array;
        
    }

    /**
     * Returns the number of keys found in the
     * given array that matched the specified pattern
     *
     * @param array $pattern    A regexp pattern
     * @param array $array      The array to look in.
     *
     * @return int

     * @example
     * $arr   = array('a' => 1, 'b' => 2, 'c' => 3);
     * array_count_keys('/[ab]/', $arr);              // returns 2
     */
    function array_count_keys ($pattern, array $array) {

        $count = 0;
        
        foreach ($array as $k => $v) {

            if (preg_match($pattern, $k)) {

                ++$count;

            }

        }

        return $count;

    }