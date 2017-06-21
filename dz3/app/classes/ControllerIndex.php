<?php
class ControllerIndex extends Controller {
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

        //Эти данные пойдут уже в представление
        $this->Output("index", $data);
    }

    protected function Index(array $data = array()) {
        return array('title' => 'Gallery', 'gallery' => Gallery::get());
    }
}
