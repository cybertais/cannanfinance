<?php
    class Sysadmin extends Controller{
        function __construct(){
            parent::__construct();
            // Auth::handleLogin('help');
            $this->view->control = get_class();
        }

        function pf_add_class(){
            $validatepost = new Postvalidator($_POST);
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validatepost->validateRequired('add_kingdom_class', 'Required');
                $validatepost->validateRequired('add_phylumidfk', 'Required');
                $validatepost->validateRequired('add_className', 'Required');
                $validatepost->validateRequired('add_classCode', 'Required');
                
                $insertmsg = null;
                if(!$validatepost->getErrors()){
                 
                   $insertmsg =  $this->model->pf_add_class($_POST);
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

        function pf_edit_class(){

        }

        function pf_rqsGet_fetchFilter_phylum(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    echo json_encode($this->model->get_fetchAll_phylum(" AND kingdomIdFk= ".$_GET['add_kingdom_class']));
            }
        }

        function pf_add_phylum(){
            $validatepost = new Postvalidator($_POST);
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validatepost->validateRequired('add_phylumName', 'Required');
                $validatepost->validateRequired('add_phylumCode', 'Required');
                $validatepost->validateRequired('add_kingdomIdFk', 'Required');
                
                $insertmsg = null;
                if(!$validatepost->getErrors()){
                 
                   $insertmsg =  $this->model->pf_edit_class($_POST);
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
    
        function pf_edit_phylum(){
            $validatepost = new Postvalidator($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validatepost->validateRequired('edit_phylumName', 'Required');
                $validatepost->validateRequired('edit_phylumCode', 'Required');
                $validatepost->validateRequired('edit_kingdomIdFk', 'Required');
                
                $insertmsg = null;
                if(!$validatepost->getErrors()){
                 
                   $insertmsg =  $this->model->pf_edit_phylum($_POST);
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



  

        function get_fetchAll_kingdom(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->get_fetchAll_kingdom($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }

        function get_fetchAll_phylumTable(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->get_fetchAll_phylumTable($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }

     

        function get_fetchAll_classTable(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->get_fetchAll_classTable($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }

        function get_fetchAll_taxanomy(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->get_fetchAll_taxanomy($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }

        function get_fetchAll_familyTable(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->get_fetchAll_familyTable($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }

        function get_fetchAll_genusTable(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->get_fetchAll_genusTable($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }

        function get_fetchAll_species(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->get_fetchAll_species($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }








        function fetch_allOrganization(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo json_encode($this->model->fetch_allOrganization($_POST));
            }else{
                echo json_encode(array('msg'=>'Invalid Request'));
            }
        }

        function pf_org_ed(){
            $validatepost = new Postvalidator($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validatepost->validateRequired('edit_org_organizationName', 'Required');
                $validatepost->validateRequired('edit_org_orgtype', 'Required');

                $insertmsg = null;
                if(!$validatepost->getErrors()){
                   $insertmsg =  $this->model->pf_org_ed($_POST);
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

        function pf_org_cr(){
            $validatepost = new Postvalidator($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validatepost->validateRequired('add_org_organizationName', 'Required');
                $validatepost->validateRequired('add_org_orgtype', 'Required');

                $insertmsg = null;
                if(!$validatepost->getErrors()){
                   $insertmsg =  $this->model->pf_org_cr($_POST);
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
        
        function pf_pers_ed(){
            $validatepost = new Postvalidator($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validatepost->validateRequired('edit_person_givenName', 'Required');
                $validatepost->validateRequired('edit_person_surName', 'Required');
                $validatepost->validateRequired('edit_person_gender', 'Required');

                $insertmsg = null;
                if(!$validatepost->getErrors()){
                   $insertmsg =  $this->model->pf_pers_ed($_POST);
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

        function pf_pers_cr(){
            $validatepost = new Postvalidator($_POST);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $validatepost->validateRequired('add_person_givenName', 'Required');
                $validatepost->validateRequired('add_person_surName', 'Required');
                $validatepost->validateRequired('add_person_gender', 'Required');

                $insertmsg = null;
                if(!$validatepost->getErrors()){
                   $insertmsg =  $this->model->pf_pers_cr($_POST);
                   
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
      
        function vali(){
            $validatepost = new Postvalidator($_GET);
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $domname = $_GET["nametag"];
                switch ($domname) {

                    case "add_kingdom_class":
                        $validatepost->validateRequired('add_kingdom_class', 'Required Field');
                        break;

                    case "add_phylumidfk":
                        $validatepost->validateRequired('add_phylumidfk', 'Required Field');
                        break;

                    case "add_className":
                        $validatepost->validateRequired('add_className', 'Required Field');
                        break;

                    case "add_classCode":
                        $validatepost->validateRequired('add_classCode', 'Required Field');
                        break;

                    case "edit_kingdom_class":
                        $validatepost->validateRequired('edit_kingdom_class', 'Required Field');
                        break;

                    case "edit_phylumidfk":
                        $validatepost->validateRequired('edit_phylumidfk', 'Required Field');
                        break;

                    case "edit_className":
                        $validatepost->validateRequired('edit_className', 'Required Field');
                        break;

                    case "edit_classCode":
                        $validatepost->validateRequired('edit_classCode', 'Required Field');
                        break;
                                   
                    case "edit_person_givenName":
                        $validatepost->validateRequired('edit_person_givenName', 'Required Field');
                        break;
                    case "edit_person_surName":
                        $validatepost->validateRequired('edit_person_surName', 'Required Field');
                        break;
                    case "edit_person_gender":
                        $validatepost->validateRequired('edit_person_gender', 'Required Field');
                        break;
                    case "add_person_givenName":
                        $validatepost->validateRequired('add_person_givenName', 'Required Field');
                        break;
                    case "add_person_surName":
                        $validatepost->validateRequired('add_person_surName', 'Required Field');
                        break;
                    case "add_person_gender":
                        $validatepost->validateRequired('add_person_gender', 'Required Field');
                        break;
                        
                    case "add_org_organizationName":
                        $validatepost->validateRequired('add_org_organizationName', 'Required Field');
                        break;
                    case "add_org_orgtype":
                        $validatepost->validateRequired('add_org_orgtype', 'Required Field');
                        break;
                    case "edit_org_organizationName":
                        $validatepost->validateRequired('edit_org_organizationName', 'Required Field');
                        break;
                    case "edit_org_orgtype":
                        $validatepost->validateRequired('edit_org_orgtype', 'Required Field');
                        break;

                    case "add_phylumName":
                        $validatepost->validateRequired('add_phylumName', 'Required Field');
                        break;
    
                    case "add_phylumCode":
                        $validatepost->validateRequired('add_phylumCode', 'Required Field');
                        break;
    
                    case "add_kingdomIdFk":
                        $validatepost->validateRequired('add_kingdomIdFk', 'Required Field');
                        break;
    
                    case "edit_phylumName":
                        $validatepost->validateRequired('add_phylumName', 'Required Field');
                        break;
    
                    case "edit_phylumCode":
                        $validatepost->validateRequired('add_phylumCode', 'Required Field');
                        break;
    
                    case "edit_kingdomIdFk":
                        $validatepost->validateRequired('add_kingdomIdFk', 'Required Field');
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
        function fetch_Allpeople(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo json_encode($this->model->fetch_Allpeople($_POST));
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


        function audit(){
            $route = 'sysadmin/audit';
            $this->view->title = "Audit";
            $this->view->subjectObj = array(
                'topic'=>'Manage Audit Trail',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Setup'),
                    array('link'=> URL. $route , 'label'=>'Audit'),
                )
            );
            $this->view->render($route);
        }

        function setuporganization(){
            $route = 'sysadmin/setuporganization';
            $this->view->title = "Setup Organization";
            $this->view->subjectObj = array(
                'topic'=>'Manage Organization',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Setup'),
                    array('link'=> URL. $route , 'label'=>'Setup Organization'),
                )
            );
            $this->view->render($route);
        }

        function rolesusers(){
            $route = 'sysadmin/rolesusers';
            $this->view->title = "rolesusers";
            $this->view->subjectObj = array(
                'topic'=>'Manage Roles and Users',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Setup'),
                    array('link'=> URL. $route , 'label'=>'rolesusers'),
                )
            );
            $this->view->render($route);
        }

        function systsetup(){


            $this->view->get_plantTypes = $this->model->get_plantTypes();
            $this->view->entryviatype = $this->model->entryviatype();
            $this->view->gendertype = $this->model->gendertype();
            $this->view->get_employmentType = $this->model->get_employmentType();
            $this->view->masterfetch_allorganization = $this->model->get_fetchAllOrganization();

            $this->view->get_plantTypeSizes = $this->model->get_plantTypeSizes();
            $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
            $this->view->get_fetchAllorganizationsector = $this->model->get_fetchAllorganizationsector();
            $this->view->fetch_allacquisitiontypes = $this->model->fetch_allacquisitiontypes();

            $this->view->get_fetchAllKingdom = $this->model->get_fetchAllKingdom();
            $this->view->get_fetchAll_phylum = $this->model->get_fetchAll_phylum();
            $this->view->get_fetchAll_class = $this->model->get_fetchAll_class();
            $this->view->get_fetchAll_ordertaxonomy = $this->model->get_fetchAll_ordertaxonomy();
            $this->view->get_fetchAll_family = $this->model->get_fetchAll_family();
            $this->view->get_fetchAll_genus = $this->model->get_fetchAll_genus();

            $this->view->acqstatustype = $this->model->acqstatustype();

            
            
        $this->view->js = array(
            'views/sysadmin/js/edit_org.js',
            'views/sysadmin/js/edit_person.js',
            
            'views/sysadmin/js/kingdom_app.js',
            'views/sysadmin/js/phylum_app.js',
            'views/sysadmin/js/class_app.js',
            'views/sysadmin/js/ordertaxonomy_app.js',
            'views/sysadmin/js/family_app.js',
            'views/sysadmin/js/genus_app.js',
            'views/sysadmin/js/mstspecies_app.js',

        );
            
           

            

            
            $route = 'sysadmin/systsetup';
            $this->view->title = "System Setup";
            $this->view->subjectObj = array(
                'topic'=>'Manage System Setup',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Administrator'),
                    array('link'=> URL. $route , 'label'=>'System Setup'),
                )
            );
            $this->view->render($route);
        }

        function security(){
            $route = 'sysadmin/security';
            $this->view->title = "Security";
            $this->view->subjectObj = array(
                'topic'=>'Manage Security',
                'crumb' => array(
                    array('link'=> URL, 'label'=>'Home'),
                    array('link'=> '#' , 'label'=>'System Administrator'),
                    array('link'=> URL. $route , 'label'=>'Security'),
                )
            );
            $this->view->render($route);
        }

   



    }
?>