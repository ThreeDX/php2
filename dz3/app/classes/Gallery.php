<?php

// Модель данных "Gallery"
class Gallery extends Model {
    // Галлерея с изображениями
    public static function get() {
        $res = DB::instance()->query("SELECT * FROM gallery");
        $images = array();

        if ($res->error === false) {
            while($row = $res->result->fetch()) {
                $images[$row['id']] = Image::create($row);
            }
        }

        return parent::create(array("images" => $images, "count" => $res->affected));
    }
}
