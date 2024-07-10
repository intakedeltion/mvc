<?php
function call($controller, $action){
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller){
        case 'pages':
            $controller = new PagesController();
        break;
        case 'posts':
            $controller = new PostsController();
        break;
        case 'users':
            $controller = new UserController();
        break;

    }

    $controller->{ $action}();
}

$controllers = array(
    'pages' => ['home', 'error'], 
    'posts' => ['index', 'show', 'delete','createpage','create','editpage', 'edit'],
    'users' => ['login','registreer','registreering','dologin', 'profile','edit','delete','logout']
);

if (array_key_exists($controller, $controllers)) {
    if(in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else{
        call('pages', 'error');
    }
   } else{
    call('pages', 'error');
    }

?>