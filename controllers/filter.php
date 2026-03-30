<?php
    class Filter extends Controller{
        function __construct(){
            parent::__construct();
            // Auth::handleLogin('help');
            $this->view->control = get_class();
        }

        function index(){
            $this->view->title = "Filter";
            $this->view->js = array(
                'views/filter/js/filterapp.js',
            );
            $this->view->render('filter/index');
        }

        function get_fetchTitle(){
          echo json_encode($_GET);
        }

        /* Accept String Parament @param $string
        * Return Float Value
        * Description: Except Only String Values from Inputs. The Input is govern by RegEx which strickly accepts Characters of [0-9],[<],[>],[=] only
        * Example: 
        * Input: ">=2024", ->String
         Outputs:  2024, Float Value
         */
        function leftTrimNonNumericValues($string){
            $count = 0;
            for($i=0; $i < strlen($string); $i++){
                if(!is_numeric($string[$i])){
                    $count++;
                }
            }
            return floatval(substr($string, $count));
        }

       
    }
?>