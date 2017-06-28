<?php
namespace simpleengine\core;

use simpleengine\core\exception\ApplicationException;

class Application {
    use Singleton;

    private $router;
    private $configuration = [];

    public function run(){
        $this->router = new Router();

        $class = "\\simpleengine\\" . $this->router->getPackage() . "\\" . $this->router->getController() . "Controller";
        $method = "action" . ucfirst($this->router->getAction());
        //var_dump($class);

        if(class_exists($class)){
            $controller = new $class;
            $controller->setRequestedAction($this->router->getAction());

            if(method_exists($controller, $method)){
                $controller->$method();
            }
            else{
                //throw new ApplicationException("Method " . $class . " not found", 0503);
                header("Location: /");
            }
        }
        else{
            //throw new ApplicationException("Class " . $class . " not found", 0502);
            header("Location: /");
        }


    }

    public function setConfiguration(array $configuration){
        if(empty($this->configuration))
            $this->configuration = $configuration;
        else
            throw new ApplicationException("Configuration has been already set up", 0501);
    }

    public function get($parameterName){
        $value = NULL;

        if(array_key_exists($parameterName, $this->configuration))
            $value = $this->configuration[$parameterName];

        return $value;
    }

    public function router(){
        return $this->router;
    }
}