<!-- species.php -->
<?php

class Species extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->control = get_class();
    } 

    function fetch_allAcq(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($this->model->fetch_allAcq($_POST));
        }else{
            echo json_encode(array('msg'=>'Invalid Request'));
        }
    }

    function get_fetchAll_familyTable(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $t = $this->model->get_fetchAll_familyTable($_POST);
            header('Content-Type: application/json');
            // echo json_encode($response);
            echo json_encode($t);
        }else{
            echo json_encode(array('msg'=>'Invalid Request'));
        }
    }


    function index(){
        $titlesubject = 'Flora and Fauna Management';
        $route = 'species/index';

        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index' , 'label'=>$titlesubject),
            )
        );
        $this->view->render($route);
    }

    function faunacategory(){
        $titlesubject = 'Fauna Management';
        $route = 'species/faunacategory';

        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index' , 'label'=>$titlesubject),
            )
        );
        $this->view->render($route);
    }

    function floracategory(){
        $titlesubject = 'Flora Management';
        $route = 'species/floracategory';

        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index' , 'label'=>$titlesubject),
            )
        );
        $this->view->render($route);
    }
}

?>