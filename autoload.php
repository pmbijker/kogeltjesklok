<?php
/**
 * Call autoload function
 *
 * Peter Bijker
 * Grafisch Lyceum Utrecht, the Netherlands
 * January 2017
 *
 */
// Call autoload function
function __autoload($classname) {
    $filename = 'classes/'. $classname .'.php';
    include_once($filename);
}

?>