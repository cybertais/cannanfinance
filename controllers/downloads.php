<?php
class Downloads extends Controller{
    function __construct(){
        parent::__construct();
         // 1. Start or resume the existing session
        Session::init();

        // 2. Wipe all existing session variables (effectively logging the user out)
        session_unset();
        session_destroy();
        $this->view->control = get_class();

    } 
    function index(){
        $route = 'downloads/index';
        $this->view->title = "Home";
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



