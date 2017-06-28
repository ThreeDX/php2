<?php
namespace simpleengine\core;

use simpleengine\core\exception\ApplicationException;

class Application {
    use Singleton;

    private $router;
    private $configuration = [];

    public function run(){
        $this->router = new Router();

        $class = "\\simpleengine\\" . $this->router->getPackage() . "\\" . $this->router->getController();
        $method = "action" . ucfirst($this->router->getAction());

        if(class_exists($class)){
            $controller = new $class;
            $controller->setRequestedAction($this->router->getAction());

            if(method_exists($controller, $method)){
                $controller->$method();
            }
            else{
                throw new ApplicationException("Method " . $class . " not found", 0503);
            }
        }
        else{
            throw new ApplicationException("Class " . $class . " not found", 0502);
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

        if(key_exists($parameterName, $this->configuration))
            $value = $this->configuration[$parameterName];

        return $value;
    }

    public function router(){
        return $this->router;
    }
}