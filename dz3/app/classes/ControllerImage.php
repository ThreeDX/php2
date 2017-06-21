<?php
class ControllerImage extends Controller {
    public function Show($action = 'index', array $params = array()) {
        //В зависимости от $action, выполняем нужные действия
        switch($action) {
            case 'index':
                $data = $this->Index($params);
                break;
            default:
                $data = $this->Index($params);
                break;
        }

        if (is_null($data['image'])) {
            header("Location: index.php");
            return;
        }

        //Эти данные пойдут уже в представление
        $this->Output("image", $data);
    }

    protected function Index(array $data = array()) {
        return array('title' => 'Image', 'image' => Image::get($data['id']));
    }
}
