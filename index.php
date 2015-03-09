<?php

require_once __DIR__ . '/settings/autoload.php';

$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$act = isset($_GET['act']) ? $_GET['act'] : 'All';

$controllerClassName = $ctrl . 'Controller';

try{
    $controller = new $controllerClassName;

    $method = 'action'.$act;
    $controller->$method();
}
catch(Exception $e){

    $view = new View;
    $view->error = $e;

    ModelException::logg($e);
    $view->display('/../admin/error.php');
}