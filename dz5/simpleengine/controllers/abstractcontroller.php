<?php
/**
 * Created by PhpStorm.
 * User: Alex Pryakhin
 * Date: 18.04.2017
 * Time: 13:36
 */

namespace simpleengine\controllers;

use simpleengine\core\Application;
use simpleengine\core\exception\ApplicationException;
use simpleengine\models\user;

abstract class AbstractController
{
    protected $requestedAction = "index";

    abstract public function actionIndex();

    protected function render($template = "", array $variables = []){
        if($template == "")
            $template = $this->requestedAction;

        $dir = Application::instance()->get("DIR")["VIEWS"];
        $dir .= mb_strtolower(Application::instance()->router()->getController(), "UTF-8");

        try {
            $loader = new \Twig_Loader_Filesystem($dir);
            $twig = new \Twig_Environment($loader, []);
        }
        catch(\Exception $e){
            throw new ApplicationException("Template " . $dir . $template . " not found", 0504);
        }

        return $twig->render($template.".tmpl", $variables);
    }

    public function setRequestedAction($actionName){
        $this->requestedAction = $actionName;
    }

    // Для тех контроллеров, кому нужен авторизованный пользователь
    protected function getUserAndRedirect(){
        $user = (new User())->getCurrent();

        if (!$user) {
            Application::instance()->redirect('auth');
            return null;
        }

        return $user;
    }

}