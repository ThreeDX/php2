<?php
// Контроллер на случай вызова неизвестной страницы
class ControllerError extends Controller {
    public function Show($action = 'index', array $params = array()) {
        header("Location: index.php");
        return;
    }
}
?>