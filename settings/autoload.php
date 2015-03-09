<?php

function __autoload($class){
    //echo 'autoload : '.$class .' <br>';
    $levels = ['','/','/../','/../../','/../../../'];
    $paths = ['','/','/controllers/','/classes/','/models/','/views/','/views/news/','/functions/','/settings/','/exceptions/'];

    foreach ($levels as $level):
        foreach ($paths as $path):
            //echo 'autoload : ' . $level . $path . $class .' <br>';
            if (file_exists(__DIR__ . $level . $path . $class .'.php')):
                //echo 'autoload : ' . $level . $path . $class .' <br>';
                require_once __DIR__ . $level . $path . $class.'.php';
                break 2;
            endif;
        endforeach;
    endforeach;
}