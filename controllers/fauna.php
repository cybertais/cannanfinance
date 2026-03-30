<?php

class Fauna extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->control = get_class();
    } 

    function index(){
        $this->view->title = "Fauna";
        $this->view->render('fauna/index'); 
    }
}

?>