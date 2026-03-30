<?php
class Pageerror extends Controller{

    function __construct(){
        parent::__construct();
        Auth::handleLogin('pageerror');
        Session::set('control', strtolower(get_class($this)));
        $this->view->control = get_class();
    }

    function index(){
        $this->view->title = "Error 404";
        $this->view->render("pageerror/index");
        $this->view->msg="this page does not exist";
    }
}
?>