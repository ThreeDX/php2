<?php
namespace simpleengine\core;

use simpleengine\models\rep\SessionsRep;
use simpleengine\models\User;
use simpleengine\models\rep\UserRep;

class Auth
{
    protected $sessionKey = 'sid';

    public function logout() {
        $sid =  isset($_SESSION[$this->sessionKey]) ? $_SESSION[$this->sessionKey] : null;
        if(!is_null($sid)) {
            $model = new SessionsRep();
            $model->dropSession($sid);
            unset($_SESSION[$this->sessionKey]);
        }
    }

    public function login($login, $password)
    {
        $user = (new UserRep())->getByLoginPass($login, $password);
        if (!$user) {
            return false;
        }
        return $this->openSession($user);
    }

    public function getSessionId()
    {
        $sid =  isset($_SESSION[$this->sessionKey]) ? $_SESSION[$this->sessionKey] : null;
        if(!is_null($sid)){
            (new SessionsRep())->updateLastTime($sid);
        }        
        return $sid;
    }    
    
    protected function openSession(User $user)
    {
        $model = new SessionsRep();
        $sid = $this->generateStr();
        $model->createNew($user->getId(),$sid, date("Y-m-d H:i:s"));
        $_SESSION[$this->sessionKey] = $sid;
        return true;
    }    

    private function generateStr($length = 32)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;

        while (strlen($code) < $length)
            $code .= $chars[mt_rand(0, $clen)];

        return $code;
    }
}