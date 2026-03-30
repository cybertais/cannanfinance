<?php

class Report extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->control = get_class();
    } 

    function index(){
        $this->view->title = "Report";
        $this->view->render('report/index'); 
    }
}

?>