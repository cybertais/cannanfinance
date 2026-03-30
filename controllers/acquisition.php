<?php

class Acquisition extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->control = get_class();
       
    }

    function acqachieve(){
        $titlesubject = 'Achieves Acquisition';
        $route = 'acquisition/acqachieve';

        $this->view->js = array(
            'views/acquisition/js/datepicker.js',
        );
      
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. strtolower(get_class($this)) . '/acqdesk'  , 'label'=>'Acquisition Main Desk'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }


  

    function postspc(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($this->model->postspc($_POST)){
            // if(isset($_POST)){
                echo  json_encode($this->postmail($_POST));
            }else{
                return array(
                    'hasError'=>false,
                    'message'=>'Could Not Post The Species',
                );
            }
        }
    }

    function generateTableFromPost($post) {
        $html = '';
        if (empty($post)) {
            return '<p>No data received.</p>';
        }

        $witnessbyArObj = $this->model->get_fetch_SingleRecordWitnessBy($post['witnessIdFk']);
        $acqbyArObj = $this->model->get_fetch_SingleRecordWitnessBy($post['acquisitionbyidfk']);

        if($post['kindom_tempholderid']==1){
            // Mapping the keys to new names
            $mappedArray = [
                "Acq Number" =>($post['acqnumber'] !== "null")? $post["acqnumber"] : '',
                "Acq Date Registered" =>($post['acdatecreated'] !== "null")? $post["acdatecreated"] : '',
                
                "Acq Type" => ($post['acquisitiontypename'] !== "null")?$post["acquisitiontypename"]: '',
                "Animal Type" => ($post['speciestypename'] !== "null")?$post["speciestypename"]: '',
                "Kingdom Name" =>($post['kingdomName'] !== "null")? $post["kingdomName"]: '',
                "Animal Common Name" => ($post['speciescommonname'] !== "null")?$post["speciescommonname"]: '',
                "Tally" => ($_POST['tally'] !== "null") ? $post["tally"]: '',
                "Cost (Kina)" => ($_POST['acqcost'] !== "null") ? "K".$post["acqcost"]: '',
                "Animal Place Holder" => ($post['speciesholdertype'] !== "null")?$post["speciesholdertype"]: '',
                "Location" => ($post['locationofspecies'] !== "null")?$post["locationofspecies"]: '',
                "Witness By" => $witnessbyArObj[0]['givenName'] . " " . $witnessbyArObj[0]['surName'] ,
                "Acquisition By" => $acqbyArObj[0]['givenName'] . " " . $acqbyArObj[0]['surName'] . " (" . $acqbyArObj[0]['organizationName']. ")", 
                "Period in Captive" =>($post['periodincaptive'] !== "null")?$post["periodincaptive"] . " Day(s)": '',
                "Animal Comment" => ($post['spceciescomment'] !== "null")?$post["spceciescomment"]: '',
            ];
        
            $html .= '<table style="width: 50%; border-collapse: collapse; margin: 20px;" >';
            foreach ($mappedArray as $key => $value) {
                $html .= '<tr>';
                $html .= '<th style=" text-align: left; background-color: #f4f4f4; width: 50%;  padding: 2px; border: 1px solid #000; "><b>' . (htmlspecialchars($key)) . '</b></th>';
                $html .= '<td style=" text-align: left; width: 50%; padding: 2px; border: 1px solid #000; ">' . htmlspecialchars($value) . '</td>';
                $html .= '</tr>';
            }
            $html .= '</table >';
        }else if($post['kindom_tempholderid']==2){
        // Mapping the keys to new names
        $mappedArray = [
            "Acq Number" =>($post['acqnumber'] !== "null")? $post["acqnumber"] : '',
            "Acq Date Registered" =>($post['acdatecreated'] !== "null")? $post["acdatecreated"] : '',
            "Acq Type" => ($post['acquisitiontypename'] !== "null")?$post["acquisitiontypename"]: '',

            "Plant Type" => ($post['plantname'] !== "null")?$post["plantname"]: '',
            "Plant Size" => ($post['plantsizetypename'] !== "null")?$post["plantsizetypename"]: '',
            
            "Kingdom Name" =>($post['kingdomName'] !== "null")? $post["kingdomName"]: '',
            "Plant Common Name" => ($post['speciescommonname'] !== "null")?$post["speciescommonname"]: '',
            "Tally" => ($_POST['tally'] !== "null") ? $post["tally"]: '',
            "Cost (Kina)" => ($_POST['acqcost'] !== "null") ? "K".$post["acqcost"]: '',
            "Plant Place Holder" => ($post['speciesholdertype'] !== "null")?$post["speciesholdertype"]: '',
            "Location" => ($post['locationofspecies'] !== "null")?$post["locationofspecies"]: '',
            "Witness By" => $witnessbyArObj[0]['givenName'] . " " . $witnessbyArObj[0]['surName'] ,
            "Acquisition By" => $acqbyArObj[0]['givenName'] . " " . $acqbyArObj[0]['surName'] . " (" . $acqbyArObj[0]['organizationName']. ")", 
            "Exposure Duration (Days)" =>($post['periodincaptive'] !== "null")?$post["periodincaptive"] . " Day(s)": '',
            "Plant Comment" => ($post['spceciescomment'] !== "null")?$post["spceciescomment"]: '',
            ];

            $html .= '<table style="width: 50%; border-collapse: collapse; margin: 20px;" >';
            foreach ($mappedArray as $key => $value) {
                $html .= '<tr>';
                $html .= '<th style=" text-align: left; background-color: #f4f4f4; width: 50%;  padding: 2px; border: 1px solid #000; "><b>' . (htmlspecialchars($key)) . '</b></th>';
                $html .= '<td style=" text-align: left; width: 50%; padding: 2px; border: 1px solid #000; ">' . htmlspecialchars($value) . '</td>';
                $html .= '</tr>';
            }
            $html .= '</table >';
        }else{
            return '<p>Invalid Kingdom.</p>';
        }
        return $html;
    }
    

    // Return Object Array
    function postmail($post) {

        $val = false;
        $mail = new PHPMailer(true);
        try {
            // SMTP Server configuration
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;          // Set the SMTP server to send through
            $mail->SMTPAuth = true;                     // Enable SMTP authentication
            $mail->Username = MAIL_USERNAME ; //'your-email@example.com'; // SMTP username
            $mail->Password = MAIL_PASSWORD;    // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port = MAIL_PORT;                          // TCP port to connect to

            // Email sender & recipient details
            $mail->setFrom(MAIL_USERNAME, 'POMNP ');
            $mail->addAddress('malgajona@gmail.com', 'GR');
            // $mail->addCC("jonathan@cybertais.com", "JP");
            // $mail->addCC("palisahpaliame@gmail.com", "Paliame");
            // $mail->addCC("conservation@portmoresbynaturepark.com.pg", "Francis");
    
            // Email content
            $mail->isHTML(true);
            $specieskingdom = $post['kindom_tempholderid']==1 ? "Animal": "Plant";
            $mail->Subject = $specieskingdom . ' Posted For Review - Acq No: ' .$post['acqnumber']; 
            $mail->Body = "
                <html>
                <body>
                    <h3>Hello Team</h3>
                    Species Posted to Conservation Department
                    <br> 
                       ".$this->generateTableFromPost($post)."
                    <p>Regards,</p>
                    <p>Guest Relation</p>
                </body>
                </html>
            ";
            if($mail->send()){
                return array(
                    'hasError'=>true,
                    'message'=>'Email Successfully Sent',
                );
            }
        } catch (Exception $e) {
            return array(
                'hasError'=>false,
                'message'=>"Error: Mail could not be sent. Mailer Error: {$mail->ErrorInfo}",
            );
        }
    }

    function delspc(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               $insertmsg =  $this->model->delspc($_POST);
            echo  json_encode(
                array( 'data'=> true)
            );
        }
    }

    



    function processform_addplant($id){
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('add_plant_acquisitiontype', 'Required');
            $validatepost->validateRequired('add_plant_planttype', 'Required');
            $validatepost->validateRequired('add_plant_plantsize', 'Required');
            $validatepost->validateRequired('add_plant_spccommonname', 'Required');
            
            $insertmsg = null;
            if(!$validatepost->getErrors()){
               $insertmsg =  $this->model->processform_addplant($_POST, $id);
            }
            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=> $validatepost->getRequiredTag(),
                    'validateTags'=>$validatepost->getValidateTags(),
                    'insertmsg'=>$insertmsg,
                )
            );
        }
    }

    function processform_addanimal($id){
        $validatepost = new Postvalidator($_POST);
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('add_animal_speciestype', 'Required');
            $validatepost->validateRequired('add_animal_acquisitiontype', 'Required');
            $validatepost->validateRequired('add_animal_spccommonname', 'Required');
            
            $insertmsg = null;
            if(!$validatepost->getErrors()){
             
               $insertmsg =  $this->model->processform_addanimal($_POST, $id);
            }
            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=> $validatepost->getRequiredTag(),
                    'validateTags'=>$validatepost->getValidateTags(),
                    'insertmsg'=>$insertmsg,
                )
            );
        }
    }

    function processform_editanimal(){
        $validatepost = new Postvalidator($_POST);
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('edit_animal_speciestype', 'Required');
            $validatepost->validateRequired('edit_animal_acquisitiontype', 'Required');
            $validatepost->validateRequired('edit_animal_spccommonname', 'Required');
            
            $insertmsg = null;
            if(!$validatepost->getErrors()){
             
               $insertmsg =  $this->model->processform_editanimal($_POST);
            }
            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=> $validatepost->getRequiredTag(),
                    'validateTags'=>$validatepost->getValidateTags(),
                    'insertmsg'=>$insertmsg,
                )
            );
        }
    }

    function processform_editplant(){
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('edit_plant_acquisitiontype', 'Required');
            $validatepost->validateRequired('edit_plant_planttype', 'Required');
            $validatepost->validateRequired('edit_plant_plantsize', 'Required');
            $validatepost->validateRequired('edit_plant_spccommonname', 'Required');
            
            $insertmsg = null;
            if(!$validatepost->getErrors()){
               $insertmsg =  $this->model->processform_editplant($_POST);
            }
            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=> $validatepost->getRequiredTag(),
                    'validateTags'=>$validatepost->getValidateTags(),
                    'insertmsg'=>$insertmsg,
                )
            );
        }
    }



    function registeracq(){
        $titlesubject = 'Register Acquisition';
        $route = 'acquisition/registeracq';
        $this->view->newacqnum = $this->genAcquisitionNumber();
        $this->view->fetch_alldispositioner = $this->model->fetch_alldispositioner();
        $this->view->fetch_allpomnpstaff = $this->model->fetch_allpomnpstaff();

        $this->view->js = array(
            'views/acquisition/js/datepicker.js',
        );
      
        // fetch all organization and exclude POMNP in the Listing to avoid conflict. But ask someone from the park if an employer can also be part of it
        $this->view->fetch_allorganization = $this->model->fetch_allorgs();
        $this->view->fetch_allgender = $this->get_fetchAllGender();
        $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
        $this->view->fetch_acquisitionby = $this->model->fetch_acquisitionby();
        
        $this->view->getcountry = $this->model->getcountry();
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. strtolower(get_class($this)) . '/acqdesk'  , 'label'=>'Acquisition Main Desk'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }

    // Return Datatype: String
    // All Digits
    function genAcquisitionNumber() {
        $ar = $this->model->pastNumbersrecentAcqNumber();
        $arnumber = $ar[0]['acqnumber'];
        $newacqNumber = null;
        $arnumbertrim = trim(strval($arnumber)); // 25001
        $arnumbertrim_len = strlen($arnumbertrim); //5 Integer Datatype
        $ar_year = substr($arnumbertrim, 0, 2); // 25 String Datatype
        $current_year_system = str_pad(date('y'), 2, '0', STR_PAD_LEFT);  // 25 Integer Value
        $ar_stringNoLeadingYear = substr($arnumbertrim, (2-$arnumbertrim_len)); //002 String Datatype
        $ar_intNoLeadingYear = intval($ar_stringNoLeadingYear); // 2 Integer Datatype
        if($current_year_system == $ar_year){
            $ar_intNoLeadingYear ++;
            if(strlen($ar_intNoLeadingYear) <= 3){
                $newacqNumber =  strval($current_year_system) . sprintf('%03d', $ar_intNoLeadingYear);
            }else{
               $newacqNumber =  strval($current_year_system) . $ar_intNoLeadingYear++;
            }
        }else{
            $newacqNumber =  strval($current_year_system) .   sprintf('%03d', 1);
        }
            return strval($newacqNumber);
    }

    function editacq($id){
        $titlesubject = 'Edit Acquisition';
        $route = 'acquisition/editacq';
        $this->view->js = array(
            'views/acquisition/js/edit_editacq.js',
        );

        $this->view->fetch_alldispositioner = $this->model->fetch_alldispositioner();
        $this->view->fetch_allpomnpstaff = $this->model->fetch_allpomnpstaff();
      
        // fetch all organization and exclude POMNP in the Listing to avoid conflict. But ask someone from the park if an employer can also be part of it
        $this->view->fetch_allorganization = $this->model->fetch_allorgs();
        $this->view->fetch_allgender = $this->get_fetchAllGender();
        $this->view->fetch_acqach = $this->fetch_acqach();
        $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
        $this->view->fetch_acquisitionby = $this->model->fetch_acquisitionby();

        $this->view->thisacquisition = $this->model->thisacquisition($id);
        $this->view->acqeventidnumber=$id;
        $this->view->getcountry = $this->model->getcountry();
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. strtolower(get_class($this)) . '/acqdesk'  , 'label'=>'Acquisition Main Desk'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }

    function addspiecesacq($id){
        Session::set('acqeventIdFk',$id);
        $titlesubject = 'Acquisition - Add Species';
        $route = 'acquisition/addspiecesacq';
        $this->view->get_plantTypes = $this->model->get_plantTypes();
        $this->view->get_plantTypeSizes = $this->model->get_plantTypeSizes();
        $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
        $this->view->fetch_allSpeciesTypes = $this->model->fetch_allSpeciesTypes();
        $this->view->fetch_allacquisitiontypes = $this->model->fetch_allacquisitiontypes();
        $this->view->xx = $this->model->x('*',$id);
        $this->view->js = array(
            'views/acquisition/js/add_animal.js',
            'views/acquisition/js/add_plant.js',
            'views/acquisition/js/edit_animal.js',
            'views/acquisition/js/edit_plant.js',

            'views/acquisition/js/post_plant.js',
            'views/acquisition/js/post_animal.js',
            'views/acquisition/js/view_plant.js',
            'views/acquisition/js/view_animal.js',
            'views/acquisition/js/remove.js',

            'views/acquisition/js/app.js',
            'views/acquisition/js/editspecies.js',
            'views/acquisition/js/accept.js',
        );

       
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. strtolower(get_class($this)) . '/acqdesk'  , 'label'=>'Acquisition Main Desk'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }

    function fetch_allAch(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($this->model->fetch_allAch($_POST));
        }else{
            echo json_encode(array('msg'=>'Invalid Request'));
        }
    }

    function fetch_allAcq(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($this->model->fetch_allAcq($_POST));
        }else{
            echo json_encode(array('msg'=>'Invalid Request'));
        }
    }

    function acqspecies(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($this->model->acqspecies($_POST));
        }else{
            echo json_encode(array('msg'=>'Invalid Request'));
        }
    }

    function reviewacqdesk(){
        // echo $this->genAcquisitionNumber();
        $titlesubject = $this->genAcquisitionNumber();
        $route = 'acquisition/reviewacqdesk';
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. strtolower(get_class($this)) . '/reviewacqdesk'  , 'label'=>'Acquisition Review Desk'),
                // array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }


    function reviewspcsacq($id){
        $this->view->xx = $this->model->x('*',$id);
        $d = $this->model->x('*',$id);
        $titlesubject = 'Acquisition - Add Species of Acq No: '. $d[0]['acqnumber'];
        // $titlesubject = 'Acquisition - Review Species';
        $route = 'acquisition/reviewspcsacq';
       
    //       /**
    //  * @param string $originalfilename - This must include name and application path eg, /folder1/folder2/demo.pdf
    //  * @param string $doctype eg, Receipt, Invoice, Cheque
    //  * @param string $originalfilename - This string will be from Database
    //  * @param return array Object
    //  */
    // public function getfile_pdf($docPath, $originalfilename, $doctype)
    // {
    //     $ar = ["status" => 0, "message" => $doctype . " Not Available"];
    //     if (file_exists(FULLPATH . $docPath . $originalfilename)) {
    //         $file = file_get_contents(FULLPATH . $docPath . $originalfilename);
    //         $ar = [
    //             "b64file" => base64_encode($file),
    //             "docname" => $originalfilename,
    //             "status" => 1,
    //             "message" => $doctype . " is Available",
    //         ];
    //     }
    //     return $ar;
    // }
    
    
        

        $this->view->js = array(
            'views/acquisition/js/add_animal.js',
            'views/acquisition/js/add_plant.js',
            'views/acquisition/js/remove.js',
            
            'views/acquisition/js/app.js',
            'views/acquisition/js/editspecies.js',
            'views/acquisition/js/accept.js',
        );

        $this->view->get_plantTypes = $this->model->get_plantTypes();
        $this->view->entryviatype = $this->model->entryviatype();
        $this->view->get_plantTypeSizes = $this->model->get_plantTypeSizes();
        $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
        $this->view->fetch_allSpeciesTypes = $this->model->fetch_allSpeciesTypes();
        $this->view->fetch_allacquisitiontypes = $this->model->fetch_allacquisitiontypes();
        
        
        $this->view->get_fetchAllKingdom = $this->model->get_fetchAllKingdom();
        $this->view->get_fetchAll_phylum = $this->model->get_fetchAll_phylum();
        $this->view->get_fetchAll_subphylum = $this->model->get_fetchAll_subphylum();
        $this->view->get_fetchAll_class = $this->model->get_fetchAll_class();
        $this->view->get_fetchAll_ordertaxonomy = $this->model->get_fetchAll_ordertaxonomy();
        $this->view->get_fetchAll_family = $this->model->get_fetchAll_family();
        $this->view->get_fetchAll_genus = $this->model->get_fetchAll_genus();
        
        // fetch_alldispositiontypes
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. strtolower(get_class($this)) . '/acqdesk'  , 'label'=>'Acquisition Review Desk'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }

    function fetch_allAcqRev(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($this->model->fetch_allAcqRev($_POST));
        }else{
            echo json_encode(array('msg'=>'Invalid Request'));
        }
    }

    function acqspeciesRev(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode($this->model->acqspeciesRev($_POST));
        }else{
            echo json_encode(array('msg'=>'Invalid Request'));
        }
    }

    function mstacq(){
            echo json_encode($this->model->mstacq($_POST));
    }

    function getcountry(){
        echo json_encode($this->model->getcountry());
    }

    function create(){
        $titlesubject = 'Register New Acquisition';
        $route = 'acquisition/create';

        $this->view->getcountry = $this->model->getcountry();
        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. strtolower(get_class($this)) . '/acqdesk'  , 'label'=>'Acquisition Main Desk'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }

    function acqdesk(){
        $titlesubject = 'Acquisition Main Desk';
        $route = 'acquisition/acqdesk';

        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index'  , 'label'=>'Acquisition Management'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        // Session::init();
        // echo json_encode($_SESSION);
        $this->view->render($route);
    }

    function vali(){

        $validatepost = new Postvalidator($_GET);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $domname = $_GET["nametag"];
            switch ($domname) {

                case "add_plant_acquisitiontype":
                    $validatepost->validateRequired('add_plant_acquisitiontype', 'Required Field');
                    break;

                case "edit_plant_planttype":
                    $validatepost->validateRequired('edit_plant_planttype', 'Required Field');
                    break;

                case "edit_plant_plantsize":
                    $validatepost->validateRequired('edit_plant_plantsize', 'Required Field');
                    break;

                case "edit_plant_spccommonname":
                    $validatepost->validateRequired('edit_plant_spccommonname', 'Required Field');
                    break;

                    

                case "edit_plant_acquisitiontype":
                    $validatepost->validateRequired('edit_plant_acquisitiontype', 'Required Field');
                    break;

                case "add_plant_planttype":
                    $validatepost->validateRequired('add_plant_planttype', 'Required Field');
                    break;

                case "add_plant_plantsize":
                    $validatepost->validateRequired('add_plant_plantsize', 'Required Field');
                    break;

                case "add_plant_spccommonname":
                    $validatepost->validateRequired('add_plant_spccommonname', 'Required Field');
                    break;

                case "edit_plant_acquisitiontype":
                    $validatepost->validateRequired('add_plant_acquisitiontype', 'Required Field');
                    break;

                case "edit_plant_planttype":
                    $validatepost->validateRequired('add_plant_planttype', 'Required Field');
                    break;

                case "edit_plant_plantsize":
                    $validatepost->validateRequired('add_plant_plantsize', 'Required Field');
                    break;

                case "edit_plant_spccommonname":
                    $validatepost->validateRequired('add_plant_spccommonname', 'Required Field');
                    break;

                case "add_animal_speciestype":
                    $validatepost->validateRequired('add_animal_speciestype', 'Required Field');
                    break;
                    
                case "add_animal_acquisitiontype":
                    $validatepost->validateRequired('add_animal_acquisitiontype', 'Required Field');
                    break;

                case "add_animal_spccommonname":
                    $validatepost->validateRequired('add_animal_spccommonname', 'Required Field');
                    break;

                case "acqnumber":
                    $validatepost->validateRequired('acqnumber', 'Required. Acq Cannot be empty');
                    $validatepost->checkacnumber(
                        'acqnumber', 
                        $this->model->checkacnumber($_GET['acqnumber']),
                        "Acq Number ".$_GET['acqnumber']." already exist"
                    );
                    break;

                case "edit_acqnumber":
                    $validatepost->validateRequired('edit_acqnumber', 'Required. Acq Cannot be empty');
                    $validatepost->checkacnumber(
                        'edit_acqnumber', 
                        $this->model->checkacnumber($_GET['edit_acqnumber']),
                        "Acq Number ".$_GET['edit_acqnumber']." already exist"
                    );
                    break;

                case "acqstatus":
                    $validatepost->validateRequired('acqstatus', 'Required Field');
                    break;

                case "witnessby":
                    $validatepost->validateRequired('witnessby', 'Acq Witness By');
                    break;

                case "edit_witnessby":
                    $validatepost->validateRequired('edit_witnessby', 'Acq Witness By');
                    break;

                case "acquisitionby":
                    $validatepost->validateRequired('acquisitionby', 'Acq By');
                    break;

                    case "edit_acquisitionby":
                        $validatepost->validateRequired('edit_acquisitionby', 'Acq By');
                        break;

                case "acqcomment":
                    $validatepost->validateRequired('acqcomment', 'Required Field');
                    break;

                case "dispositioneridfk":
                    $validatepost->validateRequired('dispositioneridfk', 'Required Field');
                    break;

                case "acquisitionDate":
                    $validatepost->validateRequired('acquisitionDate', 'Date is Required');
                    break;

                case "edit_acquisitionDate":
                    $validatepost->validateRequired('edit_acquisitionDate', 'Date is Required');
                    break;

                case "datemodified":
                    $validatepost->validateRequired('datemodified', 'Required Field');
                    break;

                case "systemuser":
                    $validatepost->validateRequired('systemuser', 'Required Field');
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

    function processform_createacq(){
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('acqnumber', 'Required');
            $validatepost->validateRequired('acquisitionDate', 'Required');
            $validatepost->validateRequired('witnessby', 'Required');
            $validatepost->validateRequired('acquisitionby', 'Required');
            $insertmsg = null;
            if(!$validatepost->getErrors()){
               $insertmsg =  $this->model->processform_createacq($_POST);
            }

            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=> $validatepost->getRequiredTag(),
                    'validateTags'=>$validatepost->getValidateTags(),
                    'insertmsg'=>$insertmsg,
                )
            );
        }
    }

    function processform_editacq($id){
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('edit_acqnumber', 'Required');
            $validatepost->validateRequired('edit_acquisitionDate', 'Required');
            $validatepost->validateRequired('edit_witnessby', 'Required');
            $validatepost->validateRequired('edit_acquisitionby', 'Required');
            $insertmsg = null;
            if(!$validatepost->getErrors()){
               $insertmsg =  $this->model->processform_editacq($_POST, $id);
            }
            echo  json_encode(
                array(
                    'data'=>$validatepost->getErrors(),
                    'hasError'=>$validatepost->hasErrors(),
                    'tagNames'=>$validatepost->getTagNames(),
                    'requiredTag'=> $validatepost->getRequiredTag(),
                    'validateTags'=>$validatepost->getValidateTags(),
                    'insertmsg'=>$insertmsg,
                )
            );
        }
    }

    function processform(){
        $validatepost = new Postvalidator($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validatepost->validateRequired('acqnumber', 'Invalid');
            
            // $validatepost->validateRequired('acqstatus', 'Please enter the username');
            // $validatepost->validateRequired('witnessby', 'Please enter the username');
            // $validatepost->validateRequired('acqcomment', 'Please enter the username');
            // $validatepost->validateRequired('dispositioneridfk', 'Please enter the username');
            // $validatepost->validateRequired('datecreated', 'Please enter the username');
            // $validatepost->validateRequired('datemodified', 'Please enter the username');
            // $validatepost->validateRequired('systemuser', 'Please enter the username');
            // $validatepost->validateRequired('acdatecreated','Date Required');
            
            // // $validatepost->validateMaxLength('username', 10, "Username must be below 10 Character");
            // $validatepost->validateRequired('gender', 'Please enter the gender');
            // $validatepost->validateRequired('status', 'Please select the drop down list');
            // $validatepost->validateMaxLength('username', 5, "Characters must be 5 and below");
            // $validatepost->validateRequired('locationOfZoo', 'Please Enter the Location of the Zoo');
            // $validatepost->validateRequired('dateofentry', 'Please Enter the Date');
            // $validatepost->validateFile_PDF(
            //     'myfile', 
            //     $_FILES , 
            //     'upload/certs/', 
            //     $_FILES['myfile']['size']
            // );
        echo  json_encode(
            array(
                'data' => $validatepost->getErrors(),
                'hasError' => $validatepost->hasErrors(),
                'tagNames' => $validatepost->getTagNames(),
                'requiredTag' => $validatepost->getRequiredTag(),
            )
        );
    }
}

    function review(){
        $titlesubject = 'Acquisition Review';
        $route = 'acquisition/review';
        // $this->view->getprovince = $this->model->getprovince();

        $this->view->title = $titlesubject;
        $this->view->subjectObj = array(
            'topic'=>$titlesubject,
            'crumb' => array(
                array('link'=> URL, 'label'=>'Home'),
                array('link'=> URL. strtolower(get_class($this)) . '/index' , 'label'=>'Acquisition Management'),
                array('link'=> URL. $route , 'label'=> $titlesubject),
            )
        );
        $this->view->render($route);
    }

    function index(){
        $titlesubject = 'Acquisition Management';
        $route = 'acquisition/index';
        $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
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