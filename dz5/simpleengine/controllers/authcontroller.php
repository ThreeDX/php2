<?php

namespace simpleengine\controllers;

use simpleengine\core\Application;
use simpleengine\core\Auth;
use simpleengine\models\user;

class AuthController extends AbstractController
{
    public function actionIndex()
    {
        $user = (new User())->getCurrent();

        if ($user) {
            Application::instance()->redirect('account');
            return;
        }

        echo $this->render("login", [
            "title" => "Login page"
        ]);
    }

    public function actionLogin()
    {
        $user = (new User())->getCurrent();

        if ($user) {
            Application::instance()->redirect('account');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {

            if ((new Auth())->login($_POST['login'], $_POST['pass'])) {
                Application::instance()->redirect('account');
                return;
            }
        }
        Application::instance()->redirect('auth');
    }

    public function actionLogout() {
        $user = (new User())->getCurrent();

        if ($user) {
            (new Auth())->logout();
        }

        Application::instance()->redirect();
    }

}