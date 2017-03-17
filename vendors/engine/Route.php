<?php
class Route
{
    public static function start()
    {
        
        spl_autoload_register(function($model) {
            if(file_exists('app/models/'.$model.'.php')){
                include_once 'app/models/'.$model.'.php';
            }
        });

        $baseController = 'Index';
        $baseAction = 'index';
        $arguments = null;
        $routes = explode('/',$_SERVER['REQUEST_URI']);

        if(!empty($routes[1])){
            $baseController = $routes[1];
        }

        if(!empty($routes[2])){
            $baseAction = $routes[2];
        }

        if(!empty($routes[3])){
            $arguments = $routes[3];
        }
        //var_dump($routes);
        $baseController = strtolower($baseController);
        $baseController = ucfirst($baseController).'Controller';
        $controllerPath = 'app/controllers/'.$baseController.'.php';

        if(file_exists($controllerPath)){
            include_once $controllerPath;
        } else {
            Route::error404();
        }

        $controller = new $baseController;

        $baseAction = strtolower($baseAction).'Action';

        if(method_exists($controller,$baseAction)){
            $controller->$baseAction($arguments);
        } else {
            Route::error404();
        }

    }

    public static function error404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:'.$host.'error404');
    }
}