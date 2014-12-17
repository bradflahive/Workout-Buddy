<?php
class Controller extends AppController {
    protected function init() {
        
        if (!UserLogin::isLogged()){
            header('Location: /profile');
            exit();
        }
    }
}

$controller = new Controller();

extract($controller->view->vars);
?>