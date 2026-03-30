<?php
class Agentmanagement extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->control = get_class();
    }

    function masterFetchAgents(){
        echo json_encode($this->model->masterFetchAgents($_POST));
    }

    // ONLY Admin (1) can VIEW the index
    function index()
    {
        // Enforce strict Administrator-only access (Role ID 1)
        Session::init();
        $this->requireRole([Session::get('ACCESS_ROLEID')]); 
        
        $this->view->title = 'Agent Directory';
        // ... fetch data ...
        $this->view->render('agentmanagement/index');
    }

    // ONLY Admin (1) can ACCESS the create method
    function create()
    {
        // Enforce strict Administrator-only access
        $this->requireRole([1]); 
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ... insert logic ...
        }
    }

    // ONLY Admin (1) can ACCESS the delete method
    function delete($id)
    {
        // Enforce strict Administrator-only access
        $this->requireRole([1]); 
        
        // ... delete logic ...
    }
}
?>