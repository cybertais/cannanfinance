<?php
    class Help extends Controller{
        function __construct(){
            parent::__construct();
            Auth::handleLogin('help');
            $this->view->control = get_class();
        }

        function index(){
            $this->view->title = "Help";
            $this->view->render('help/index');
        }

        public function other($args = false){
            require 'models/help_model.php';
            $model = new Help_Model();
            $this->view->blah = $model->blah();
        }
    }
?>