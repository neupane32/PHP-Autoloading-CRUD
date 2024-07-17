<?php
spl_autoload_register(function ($class_name) {
    $paths = [
        __DIR__ . '/classes/',
        __DIR__ . '/Validation/'
    ];

    $found = false;
    foreach ($paths as $path) {
        $file = $path . $class_name . '.php';
        if (file_exists($file)) {
            include $file;
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "Error: The class file for {$class_name} was not found.";
    }
});

require_once './Config/config.php';
?>
