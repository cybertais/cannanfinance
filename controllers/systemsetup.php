<?php
    class Systemsetup extends Controller{
        function __construct(){
            parent::__construct();
            // Auth::handleLogin('help');
            $this->view->control = get_class();
        }

        
        

        function audit(){
            $route = 'systemsetup/audit';
            $this->view->title = "Audit";
            $this->view->subjectObj = array(
                'topic'=>'Manage Audit Trail',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Setup'),
                    array('link'=> URL. $route , 'label'=>'Audit'),
                )
            );
            $this->view->render($route);
        }

        function setuporganization(){
            $route = 'systemsetup/setuporganization';
            $this->view->title = "setuporganization";
            $this->view->subjectObj = array(
                'topic'=>'Manage Organization',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Setup'),
                    array('link'=> URL. $route , 'label'=>'Setup Organization'),
                )
            );
            $this->view->render($route);
        }

        function rolesusers(){
            $route = 'systemsetup/rolesusers';
            $this->view->title = "rolesusers";
            $this->view->subjectObj = array(
                'topic'=>'Manage Roles and Users',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Setup'),
                    array('link'=> URL. $route , 'label'=>'rolesusers'),
                )
            );
            $this->view->render($route);
        }
    }
?>