<?php
class Agentmanagement extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->control = get_class();
    }

    // --- Toggle Agent Status Action ---
    function toggle_active()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Optional: Protect this action so only Admins can toggle status
            // Session::init();
            // $this->requireRole([1]); 
            
            $result = $this->model->toggle_active($_POST);
            echo json_encode($result);
            exit;
        }
    }

    // Fetch all agents for the DataTable
    function masterFetchAgents(){
        echo json_encode($this->model->masterFetchAgents($_POST));
    }

    // Create a new agent via AJAX
    function create_agent()
    {
        // Add Role protection if needed (e.g., $this->requireRole([1]); )
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->model->create_agent($_POST);
            echo json_encode($result);
            exit; // Stop further script execution
        }
    }

    // Fetch specific agent details to populate the Edit Modal via AJAX
    function fetch_agent_by_id()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo json_encode($this->model->fetch_agent_by_id($_POST));
            exit;
        }
    }

    // Update an existing agent via AJAX
    function edit_agent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->model->edit_agent($_POST);
            echo json_encode($result);
            exit;
        }
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

    // ONLY Admin (1) can ACCESS the create method (Fallback for standard form submit)
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