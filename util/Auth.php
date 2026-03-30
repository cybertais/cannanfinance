<?php

class Auth{
/**
 * public static function so we dont have to instantiate it
 * 
 */
        public static function handleLogin($page){
            @session_start();
            $logged = Session::get('loggedIn');
            $role = Session::get('role');


            $rolePageAdmin  = array(
                'setup',
                'accounts',
                'dashboard', 
                'report',
                'applicant', 
                'acceptanceletter',
                'schoolfee',
                'transcript',
                'certificate',
                'report',
                'register',
                'idcard',
                'transcript',
                'studentportal',
            );
            $rolePageClient  = array('clientdashboard', 'clientsetup','client');
            $rolePageAdminClientJoin  = array( 
                'accounts',
                'setup',
                'dashboard', 
                'report', 
                'applicant', 
                'upload', 
                'acceptanceletter',
                'schoolfee',
                'register',
                'idcard',
                'transcript',
            );
            $publicPage = array('index', 'pageerror', 'help');
            

            if($logged == false && in_array($page, $rolePageAdminClientJoin)){
                Session::init();
                header('location:' . URL . 'login'); 
            }

            if( ($role == 'Client' || $role == 'Administrator') && $logged && in_array($page, $publicPage )){
                Session::init();
            }


            if($role == 'Administrator' && $logged && in_array($page, $rolePageClient )){
                    header('location:' . URL . 'pageerror'); 
            }


            if($role == 'Client' && $logged && in_array($page, $rolePageAdmin )){
                    header('location:' . URL . 'pageerror'); 
            }


            if($role == 'Administrator' && $logged && in_array($page, $rolePageAdmin )){
                Session::init();
            }

            if($role == 'Client' && $logged && in_array($page, $rolePageClient )){
                Session::init();
            }

        }
}

?>