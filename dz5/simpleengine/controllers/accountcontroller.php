<?php

namespace simpleengine\controllers;


class AccountController extends AbstractController
{
    public function actionIndex()
    {
        if ($user = $this->getUserAndRedirect()) {
            echo $this->render("index", [
                "title" => "Account page",
                "user" => $user
            ]);
        }
    }
}