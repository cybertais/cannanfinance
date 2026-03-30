<?php
class Onlineapp extends Controller{
    function __construct(){
        parent::__construct();
        // Auth::handleLogin('index');
        $this->view->control = get_class();
    } 
    function index(){
        $route = 'onlineapp/index';
        $this->view->title = "Online Application";
        $this->view->subjectObj = array(
            'topic'=> COMPANY_INITIAL . ' http://cannanfinance.com/',
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. $route , 'label'=>'Home'),
            )
        );
        $this->view->render($route);
    }

    
}
?>



