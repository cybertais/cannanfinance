<?php
// use libs\Form\Postvalidator;
class Flora extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->control = get_class();
    } 

    function index(){
        // echo __DIR__;
        $users = array(
            array(
                array('user_id' => '1','username' => 'alice','password_hash' => 'hashed_password_1','email' => 'alice@example.com','created_at' => '2024-09-05 19:47:37'),
                array('user_id' => '2','username' => 'bob','password_hash' => 'hashed_password_2','email' => 'bob@example.com','created_at' => '2024-09-05 19:47:37')
                ),
                'value'=>'user_id',
                'optionLabel'=>'username'
            );
          $this->view->optionObj = $users;
        $this->view->title = "Flora";
        $this->view->render('flora/index'); 
    }

    function processform(){
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $validatepost->validateRequired('nameOfZooKeeper', 'Please Enter The Name of Zoo Keeper');
            // $validatepost->validateRequired('nameOfZooKeeper2', '2 Please Enter The Name of Zoo Keeper');
            // $validatepost->validateRequired('locationOfZoo', 'Please Enter the Location of the Zoo');
            // $validatepost->validateRequired('dateofentry', 'Please Enter the Date');
            $validatepost->validateFile_PDF(
                'myfile', 
                $_FILES , 
                'upload/certs/', 
                $_FILES['myfile']['size']
            );
            

        echo  json_encode(
            array(
                'data'=>$validatepost->getErrors(),
                'hasError'=>$validatepost->hasErrors()
            )
        ) ;
    }
}
}
?>