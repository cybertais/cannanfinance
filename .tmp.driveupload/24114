<?php



class Bootstrap{

    private $_url = null;

    private $_controller = null;

    private $_controllerPath = 'controllers/'; //Always include trailing slash

    private $_modelPath = 'models/'; //Always include trailing slash

    private $_errorFile = 'error.php';

    private $_defaultFile = 'index.php';

  

    /**

    * Fetches the $_GET from 'url'

    */

    private function _getUrl(){

        $geturl = isset($_GET['url'])? $_GET['url'] : null; 

        $geturl = rtrim($geturl,'/');

        $geturl = filter_var($geturl, FILTER_SANITIZE_URL);

        $this->_url = explode('/',$geturl);

    }



    /**

    * This loads if there is no $_GET parameter passed

    */

    private function _loadDefaultController(){

        require $this->_controllerPath . $this->_defaultFile;

        $this->_controller = new Index();

        $this->_controller->index();

    }



    /**

    * Load an existing controller if there is a $_GET parameter passed

    * @return boolean|string

    */

    private function _loadExistingController(){

        $file = $this->_controllerPath . $this->_url[0].".php";
        if(file_exists($file)){
            require $file;
            $this->_controller = new $this->_url[0]; //Class name being instantiated
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        }else{

            $this->_mvcerror();

            return false;

        }

    }



    /**

    * If a method is passed in the $_GET parameter

    */

    private function _callControllerMethod(){



        $length = count($this->_url);

        if($length == 5){

                    

        }



        switch($length){

            case 5:

                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);

                break;



            case 4:

                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);

                break;

                        

            case 3:

                $this->_controller->{$this->_url[1]}($this->_url[2]);

                break;

                        

            case 2:

                $this->_controller->{$this->_url[1]}();

                break;

                        

            default:

                $this->_controller->index();

                break;

        }

    }

        /**

         * Display an error page if nothing Happens

         * @return boolean

         */

    private function _mvcerror(){

        require $this->_controllerPath . $this->_errorFile;

        $this->_controller  = new MvcError();

        $this->_controller -> index();

        exit;

    }



    public function init(){

        //sets the protected $_url

        $this->_getUrl();

        //Load the default controller is no URL is set

        if(empty($this->_url[0]))

        {

            $this->_loadDefaultController();

            return false;

        }

        $this->_loadExistingController();

        $this->_callControllerMethod();

    }

      

    /**

    * set a custom path to the controllers

    * @return string $path

    */

    public function setControllerPath($path){

        $this->_controllerPath = rtrim($path, '/'). '/';

    }

    

    /**

    * set a custom path to the error file

    * @return string $path . Use the file name of your controller, eg: error.php

    */

    public function setErrorFile($path){

        $this->_errorFile = rtrim($path, '/'). '/';

    }    

        

    /**

    * set a custom path to the error file

    * @return string $path . Use the file name of your controller, eg: index.php

    */

    public function setDefaultFile($path){

        $this->_defaultFile = rtrim($path, '/'). '/';

    }

    /**

    * set a custom path to the models

    * @return string $path

    */

    public function setModelPath($path){

        $this->_modelPath = rtrim($path, '/'). '/';

    }

} //end line 32 class bootstrap

?>