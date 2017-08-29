<?php

	/**
     * Tells if a string is either NULL or equal to an empty string.
     *
	 * @param string $string    The source string
	 * @return boolean
	 */
	function string_is_null_or_empty ($string) {

		return $string === NULL || $string === '';

	}

	/**
	 * Tells if a string is either NULL, equal to an empty string,
	 * or contains nothing but white-spaces.
     * PHP's <code>trim</code> default white-space characters are used.
     *
	 * @param string $string    The source string
	 * @return boolean
	 */
	function string_is_null_or_whitespace ($string) {

		return $string === NULL || trim($string) === '';

	}

	/**
	 * Tells whether the string string begins with the
     * sub-string specified at the <code>$value</code> argument.
     
	 * @param string $value The value to look for
	 * @param string $string 	The source string
	 * @return boolean
	 */
	function string_starts_with ($value, $string) {

		return strpos($string, $value) === 0;

	}