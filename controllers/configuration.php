<?php
    class Configuration extends Controller{
        function __construct(){
            parent::__construct();
            // Auth::handleLogin('help');
            $this->view->control = get_class();
        }

        function alerts(){
            $route = 'configuration/alerts';
            $this->view->title = "Manage Alerts";
            $this->view->subjectObj = array(
                'topic'=>'Manage Alerts',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'Configure Parameters'),
                    array('link'=> URL. $route , 'label'=>'Manage Alerts'),
                )
            );
            $this->view->render($route);
        }

        function parameter(){
            $route = 'configuration/parameter';
            $this->view->title = "Configure Parameters";
            $this->view->subjectObj = array(
                'topic'=>'Configure Parameters',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'Configure Parameters'),
                    array('link'=> URL. $route , 'label'=>'parameter'),
                )
            );
            $this->view->render($route);
        }


   



    }
?>