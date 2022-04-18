<?php

/**
 * Autoload classes within the namespace `Inpsyde`
 *
 */

spl_autoload_register(static function ($class) {

    $prefix = 'Inpsyde\\';
    $len = strlen($prefix);
// if the first {$len} characters don't match
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // base directory where our class files and folders live
    $base_dir = __DIR__ . '/src/';
    $class_name = str_replace($prefix, '', $class);
    $possible_file = strtolower($base_dir . str_replace('\\', '/', $class_name) . '.php');
// require the file if it exists
    if (file_exists($possible_file)) {
        require $possible_file;
    }
});
