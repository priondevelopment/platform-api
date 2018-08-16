<?php

/**
 * Check the PHP Version
 */
if ( ! function_exists('checkPhpVersion')) {
    function checkPhpVersion ()
    {
        $version = phpversion();
        if ($version < 7) {
            header('Content-type: application/json');
            header("HTTP/1.1 500 Internal Server Error");

            echo json_encode([
                'error' => 1,
                'message' => "Minimum PHP version is 7.0"]);
            die;
        }
    }
}
checkPhpVersion();