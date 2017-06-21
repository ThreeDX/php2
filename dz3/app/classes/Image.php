<?php

// Модель данных "Image"
class Image extends Model
{
    public static function get($id) {
        $res = DB::instance()->select_all("SELECT * FROM gallery where id=:id", array("id" => $id));

        if (is_array($res))
            return parent::create($res[0]);

        return NULL;
    }

}