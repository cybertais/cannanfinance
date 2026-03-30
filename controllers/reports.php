<?php

class Reports extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->control = get_class();
    } 

    function index(){

        $titlesubject = 'Reports';
        $route = 'reports/index';
        $this->view->css = array(
            'views/test/css/style.css',
        );
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index' , 'label'=>$titlesubject),
            )
        );
        $this->view->render($route);
    }

 
}

?>