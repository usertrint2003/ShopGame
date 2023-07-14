<?php
    namespace App;

    class Router{
        public static $routes = [];

        protected $request;

        public function __construct()
        {
            $this->request = new Request();
        }


        public static function get($path, $callback){
            static::$routes["get"][$path] = $callback;
        }

        public static function post($path, $callback){
            static::$routes["post"][$path] = $callback;
        }

        public function getPath(){
            $path = $_SERVER['REQUEST_URI'] ?? '/';
            $path = str_replace('/PHP2/Assignment/public/', '/', $path);
            $position = strpos($path,'?');

            if($position){
                $path = substr($path, 0,$position);
            }
            return $path;
        }

        public function getMethod(){
            return strtolower($_SERVER['REQUEST_METHOD']);
        }


        public function resolve(){
            $path = $this->getPath();
            $method = $this->getMethod();

            $callback = static::$routes[$method][$path] ?? false;

            if($callback == false){
                include_once __DIR__ . "/../resource/view/404.php";
                exit;
            }
            
            //If callback = function
            if(is_callable($callback)){
                return $callback();
            }

            //If callback = Array
            if(is_array($callback)){
                $class = new $callback[0];
                $action =  $callback[1];

                return call_user_func([$class,$action], $this->request);
            }

        }
    }
?>