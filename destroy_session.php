<?php
/**
 * Destroy session
 * Peter Bijker
 * Grafisch Lyceum Utrecht, the Netherlands
 * January 2017
 * 
 * Destroy session for testing purposes
 */
session_start();
session_destroy();
header('location: index.php');
?>