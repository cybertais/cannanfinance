<?php
class Agents extends Controller{
    function __construct(){
        parent::__construct();
        // Auth::handleLogin('index');
        $this->view->control = get_class();
         // 1. Start or resume the existing session
        Session::init();

        // 2. Wipe all existing session variables (effectively logging the user out)
        session_unset();
        session_destroy();
    }


    function getAllAgents(){}


    function index(){

        $route = 'agents/index';
        $this->view->getAllAgents = $this->model->getAllAgents();
        $this->view->title = "Cannan Finance Agnects";

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



