<?php
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\','/',$class_name);
    $class_name = '../'.$class_name;
    if(file_exists($class_name.'.php'))
        include $class_name . '.php';
    else
    {
        echo "Class $class_name tidak ditemukan";
        die();
    }
});

require '../library/functions.php';
require '../before-actions/index.php';

$rendered_file = '../actions/default.php';

if(isset($_GET['r']))
{
    $rendered_file = '';
    $file = '../actions/'.$_GET['r'];
    if(file_exists($file.'/index.php'))
        $rendered_file = $file.'/index.php';
    elseif(file_exists($file.'.php'))
        $rendered_file = $file.'.php';
}

if($rendered_file)
{
    $render = require $rendered_file;
    if(is_array($render) || is_object($render))
    {
        echo json_encode($render);
        die();
    }

    echo $render;
}
else
    echo "<h2>Page not found</h2>";

die();