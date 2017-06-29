<?php
namespace simpleengine\models;

use simpleengine\core\Auth;
use simpleengine\models\rep\SessionsRep;
use simpleengine\models\rep\UserRep;

class User
{
    protected $id;
    protected $login;
    protected $password;

    public function getId(){
        return $this->id;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getCurrent()
    {
        $userId = $this->getUserId();
        if($userId){
            return (new UserRep())->getById($userId);
        }
        return null;
    }

    protected function getUserId()
    {
        $sid = (new Auth())->getSessionId();
        if(!is_null($sid)){
            return (new SessionsRep())->getUidBySid($sid);
        }
        return null;
    }
}