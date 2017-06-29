<?php

namespace simpleengine\models\rep;

use simpleengine\models\User;

class UserRep extends AbstractRep
{
    protected $nestedClass = 'simpleengine\models\User';

    /**
     * @return User
     */
    public function getByLoginPass($login, $pass)
    {
        return $this->db->fetchObject(
            sprintf(
                "SELECT u.* FROM users u
                  WHERE login = '%s' AND password = '%s'", $login, md5($pass)
            ), [], $this->nestedClass
        );
    }

    /**
     * @return User
     */
    public function getById($id)
    {
        return $this->db->fetchObject(
            "SELECT u.* FROM users u WHERE u.id = ?", [$id],  $this->nestedClass
        );
    }
}