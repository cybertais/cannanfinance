<?php

class Test extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->control = get_class();
    } 

    function index(){
            
            
        $this->view->js = array(
          
            'views/test/js/app.js',

        );
        $titlesubject = 'Test Coding';
        $route = 'test/index';
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
        $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
        $this->view->get_fetchAllGender = $this->get_fetchAllGender();
        $this->view->render($route);
    }

    function vali(){
        $validatepost = new Postvalidator($_GET);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $domname = $_GET["nametag"];
            switch ($domname) {
                case "exampleDatepicker13":
                    $validatepost->validateRequired($domname, 'Required');
                    break;
                case "input2":
                    $validatepost->validateRequired($domname, 'Required');
                    $validatepost->validateMaxLength($domname,5, 'Too Long');
                    break;
                case "status":
                    $validatepost->validateRequired($domname, 'Required');
                    break;
            }


            $c = null;
            if (in_array($domname, $validatepost->getRequiredTag(), true)) {
                $c = array($domname);
            } else {
                $c = array();
            }
         
            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=>$validatepost->getRequiredTag(),
                    'validateTags'=>$validatepost->getValidateTags(),
                )
            );
        }
    }

    function processform(){
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('status', 'Required');
            $validatepost->validateRequired('exampleDatepicker13', 'Required');
            $validatepost->validateRequired('input2', 'Required');

        echo  json_encode(
            array(
                'data'=>$validatepost->getErrors(),
                'hasError'=>$validatepost->hasErrors(),
                'tagNames'=>$validatepost->getTagNames(),
                'requiredTag'=>$validatepost->getRequiredTag(),
                'validateTags'=>$validatepost->getValidateTags(),
            )
        );
    }
}
}

?>