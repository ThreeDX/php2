<?php
/**
 * Created by PhpStorm.
 * User: Alex Pryakhin
 * Date: 18.04.2017
 * Time: 16:30
 */

namespace simpleengine\controllers;

use simpleengine\models\DefaultModel;
use simpleengine\models\user;

class DefaultController extends AbstractController
{
    public function actionIndex()
    {
        $model = new DefaultModel();

        echo $this->render("index", [
            "title" => "Main page",
            "hello" => "geekbrains",
            "info" => $model->testMethod(),
            "user" => (new User())->getCurrent()
        ]);
    }
}