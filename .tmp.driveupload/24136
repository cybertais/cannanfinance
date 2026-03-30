<?php
class Controller{

    public $queryStatus = false;

    public $sqlObjectArray = array();

    function __construct(){
        date_default_timezone_set("Pacific/Port_Moresby");
        setlocale(LC_MONETARY,"Pacific/Port_Moresby");
     
        $this->view = new View();
        
    }

    /**
     * RBAC Access Guard
     * @param array $allowedRoleIds Array of role IDs permitted to access the method
     */
    public function requireRole($allowedRoleIds = []) 
    {
        Session::init();
        
        // Check if the user is actually logged in
        if (!Session::get('loggedin')) {
            header('Location: ' . URL . 'login');
            exit;
        }

        // Get the current user's Role ID from the session
        $userRoleId = (int) Session::get('ACCESS_ROLEID');

        // If their role is not in the allowed array, block access
        if (!in_array($userRoleId, $allowedRoleIds)) {
            // You can route this to a dedicated 403 Forbidden page if you have one
            header('Location: ' . URL . 'dashboard?error=access_denied');
            exit;
        }
    }

    function vali(){
        $validatepost = new Postvalidator($_GET);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $domname = $_GET["nametag"];
            switch ($domname) {

                case "principal":
                    $validatepost->validateRequired('principal', 'Enter Pricipal');
                    break;

                    case "nofortnight":
                        $validatepost->validateRequired('nofortnight', 'Required. Enter No of Fortnight');
                        // $validatepost->checkMinMax('nofortnight',1,10,'Reset! Number of Fortnight is out of Range');
                        break;

                        case "firstname":
                            $validatepost->validateRequired('firstname', 'Enter First');
                            break;

                            case "surname":
                                $validatepost->validateRequired('surname', 'Required. Enter Surname');
                                break;

                                case "organization":
                                    $validatepost->validateRequired('organization', 'Required. Enter Organization');
                                    break;

                                    case "empfilenumber":
                                        $validatepost->validateRequired('empfilenumber', 'Required. Enter File Number');
                                        break;

                                        case "phone":
                                            $validatepost->validateRequired('phone', 'Required. Enter Phone Number');
                                            break;
                                            
                                            case "cemail":
                                                $validatepost->validateRequired('cemail', 'Required. Enter Email');
                                                break;


            }
            $c = null;
            if (in_array($domname, $validatepost->getRequiredTag(), true)) {
                $c = array($domname);
            } else {
                $c = array();
            }
         
            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=> $c,
                    'validateTags'=>$validatepost->getValidateTags(),
                )
            );
        }
    }

    function createSession(){
        $info = array(
            'Status'=> NULL,
            'Message'=> '',
            'Color'=> 'White',
        );
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $obj = array();

            // $logic stores <, >, =, <=, >= etc
            $logic = $this->leftTrimGetLogic($_GET['value']);

            // the $value Variable ommits logic chars and stores only value as Float
            $value = $this->leftTrimNonNumericValues($_GET['value']);



            if(preg_match('/^[a-zA-Z]+/', $value)){
                $obj[$_GET['key']] = $this->checkPrepareSqlStatement($logic, $_GET['key'], $value);
            }else if(preg_match('/^[0-9]+/', $value)){
                $obj[$_GET['key']] = $this->checkPrepareSqlStatement($logic, $_GET['key'], $value);
            }else{
                $obj[$_GET['key']] = $this->checkPrepareSqlStatement($logic, $_GET['key'], $value);
            }

            $this->queryStatus = $obj[$_GET['key']]['Status'];
            
            $info['Logic'] = $logic;
            $info['Value'] = $value;
            $info['queryStatus'] = $this->queryStatus;
            $info['Status'] = 1;
            $info['Message'] = 'HTTP Request Success';
            $this->sqlObjectArray[$_GET['key']] = $info;
            // Session::set('SqlQueryString',$this->sqlObjectArray['']);
        }else{
            $info['Status'] = 0;
            $info['Message'] = 'Bed HTTP Request';
        }
     
        echo json_encode(  $this->sqlObjectArray );
    }

        /*
     * @param $imagename: string in 64bit encoding
     */
    function get_idimageFromPublicResources($imagename)
    {
        if ($imagename == "") {
            $imagename = "placeholder_image.png";
        }
        $img = file_get_contents(
            FULLPATH . "public/images/resource/" . $imagename
        );

        $data = base64_encode($img);
        return $data;
    }


    // create a function that will check for >, < and = in 
    // its single character and by default it must issue a default 
    // Null Value
    function check_Character($char){
        $val = true;
        if(preg_match('/^[>]+/', $char) || preg_match('/^[<]+/', $char) || preg_match('/^[=]+/', $char) ){
            $val = false;
        }
        return $val;
    }

    // accepts $logic (>,=,<,>=,<=), $fields (Database column), $value (http value sent from request)
    // return array object
    function checkPrepareSqlStatement($logic, $field, $value){
       
        $value = ($value == NULL)? "NULL" : $value;
        $fieldName = $this->get_dbTableColumnName($field);
        $obj = array(
            'Status'=>NULL,
            'Message'=>'',
            'Field'=> '',
            'Logic'=> '',
            'WhereValue'=>'',
        );

        // Check if the First Character of the input field is NOT a <, >, or =
        if(!$this->check_Character($value)){
            $obj = array(
                'Status'=>0,
                'Message'=>'Invalid Parameter(s). Expression `' . $value . '` must be accompanied by its values. Eg; ,`' . $value . '2321`',
                'Field'=> '',
                'Logic'=> '',
                'WhereValue'=>'',
            );
        }else{
            if($logic === '>'){
                $obj = array(
                    'Status'=>1,
                    'Message'=>'More Message',
                    'Field'=> $fieldName,
                    'Logic'=> $logic,
                    'WhereValue'=>$value,
                );
    
            }elseif ($logic === '<') {
                $obj = array(
                    'Status'=>1,
                    'Message'=>'Less Message',
                    'Field'=> $fieldName,
                    'Logic'=> $logic,
                    'WhereValue'=>$value,
                );
            }elseif ($logic === '>=') {
                $obj = array(
                    'Status'=>1,
                    'Message'=>'More and Equal Message',
                    'Field'=> $fieldName,
                    'Logic'=> $logic,
                    'WhereValue'=>$value,
                );
            }elseif ($logic === '<=') {
                $obj = array(
                    'Status'=>1,
                    'Message'=>'Less and Equal Message',
                    'Field'=> $fieldName,
                    'Logic'=> $logic,
                    'WhereValue'=>$value,
                );
            }elseif ($logic === '<>') {
                $obj = array(
                    'Status'=>1,
                    'Message'=>'Not Equal',
                    'Field'=> $fieldName,
                    'Logic'=> $logic,
                    'WhereValue'=>$value,
                );
            }elseif ($logic === '' || $logic === '=' || empty($logic)) {
                $obj = array(
                    'Status'=>1,
                    'Message'=>'Equals Message',
                    'Field'=> $fieldName,
                    'Logic'=> $logic,
                    'WhereValue'=>$value,
                );
               
            }else{
                $obj = array(
                    'Status'=>0,
                    'Message'=>'Invalid Parameter',
                    'Field'=>'',
                    'Logic'=> '',
                    'WhereValue'=>'',
                );
            }
        }
        return $obj;
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
        $val = NULL;
        for($i=0; $i < strlen($string); $i++){
            if(!is_numeric($string[$i])){
                $count++;
            }
        }

        if(floatval(substr($string, $count) == 0)){
            $val = $string;
        }else{
            $val = floatval(substr($string, $count));
        }

        return $val;
    }

    /* Accept String Parament @param $string
    * Input: ">=2024", ->String
    Outputs:  >=, String Value
    */
    function leftTrimGetLogic($string){
        $count = 0;
        $val = "";
        if(!preg_match('/^[a-zA-Z]+/', $string)){
            for($i=0; $i < strlen($string); $i++){
                if(!is_numeric($string[$i])){
                    $count++;
                }
            }
        }
        

        if(strval(substr($string, 0, $count)) === ""){
            $val = "=";
        }else{
            $val = strval(substr($string, 0, $count));
        }
        return $val;
    }


    function get_fetchAllStatus(){
        return array(
                array('para' => 'Mr','txt' => 'Mr'),
                array('para' => 'Ms','txt' => 'Ms'),
                array('para' => 'Mrs','txt' => 'Mrs'),
                array('para' => 'Ps','txt' => 'Ps'),
                array('para' => 'Dr','txt' => 'Dr')
              );
    }

    function fetch_acqach(){
        return array(
            array('para' => '1','txt' => 'Yes'),
            array('para' => '0','txt' => 'No')
          );
    }


    function get_fetchAllGender(){
        return array(
            array(
                'para'=>'Male',
                'txt'=>'Male',
            ),
            array(
                'para'=>'Female',
                'txt'=>'Female',
            ),
           
        );
    }

    /*
    * @param $imagename: string in 64bit encoding
    */
    function get_idimage($imagename){
        if($imagename == ""){
            $imagename = 'placeholder_image.png';
        }
        $img = file_get_contents(FULLPATH . 'upload/idphotos/'.$imagename);
    
        $data = base64_encode($img);
        return $data;
    }


    /**
     * Description: This Function Search Through An Array Object to match the Value
     * @param mix - Value to Look for in Object
     * @param array $array - Array Object
     * Return Boolean Value
     */
    function findValueObject($id, $array){
        foreach ( $array as $element ) {
            if ( in_array($id, $element)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param string $name Name of the model
     * @param string $path . Location of the models
     */
    public function loadModel($name, $modelPath = 'models/'){
        $path = $modelPath . $name . '_model.php';
        if(file_exists($path)){
            require $path;
            $modelName = $name . '_Model';
            $this->model = new $modelName;
        }
    }

    /** 
     * @param string $originalfilename - This must include name and application path eg, /folder1/folder2/demo.pdf
     * @param string $doctype eg, Receipt, Invoice, Cheque
     * @param string $originalfilename - This string will be from Database
     * @param return array Object
     */
    public function getfile_pdf($docPath, $originalfilename, $doctype){
        $ar = array('status'=>0, 'message'=> $doctype . ' Not Available');
        if (file_exists(FULLPATH . $docPath . $originalfilename)){
            $file = file_get_contents(FULLPATH . $docPath . $originalfilename);
            $ar = array(
                'b64file'=>base64_encode($file),
                'docname'=>$originalfilename,
                'status' =>1,
                'message'=>$doctype . ' is Available'
            );
        }
        return $ar;
    }

    /** 
     * @param string $originalfilename - This must include name and application path eg, /folder1/folder2/demo.pdf
     * @param string $doctype eg, Receipt, Invoice, Cheque
     * @param string $originalfilename - This string will be from Database
     * @param return array Object
     */
    public function getFile_Image($docPath, $originalfilename, $doctype = 'Image'){
        if(empty($originalfilename)){
            $originalfilename = 'placeholder_image.png';
        }
        $ar = array('status'=>0, 'message'=> $doctype . ' Not Available');
        if (file_exists(FULLPATH . $docPath . $originalfilename)){
            $file = file_get_contents(FULLPATH . $docPath . $originalfilename);
            $ar = array(
                'b64file'=>base64_encode($file),
                'docname'=>$originalfilename,
                'status' =>1,
                'message'=>$doctype . ' is Available'
            );
        }
        return $ar;
    }
}
?>