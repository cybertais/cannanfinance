<?php
    class Sysadmin_Model extends Model{
        function __construct(){
            parent::__construct();
        }

        function pf_add_class($post){
            $data =  $this->db->insert('class', array(
                'className' => isset($post['add_className'])? $post['add_className'] : null,
                'classCode'=> isset($post['add_classCode'])? $post['add_classCode'] : null,
                'phylumidfk'=> isset($post['add_phylumidfk'])? $post['add_phylumidfk'] : null,
                // Systematic Insertion
                'classDateCreated'=> time(),
            ));

            return $data;
        }

        function pf_add_phylum($post){
            $data =  $this->db->insert('phylum', array(
                'kingdomIdFk' => isset($post['add_kingdomIdFk'])? $post['add_kingdomIdFk'] : null,
                'phylumName'=> isset($post['add_phylumName'])? $post['add_phylumName'] : null,
                'phylumCode'=> isset($post['add_phylumCode'])? $post['add_phylumCode'] : null,
                // Systematic Insertion
                'phylumDateCreate'=> time(),
            ));

            return $data;
        }
        function pf_edit_phylum($post){
          
            $postData = array(
                'kingdomIdFk' => isset($post['edit_kingdomIdFk'])? $post['edit_kingdomIdFk'] : null,
                'phylumName'=> isset($post['edit_phylumName'])? $post['edit_phylumName'] : null,
                'phylumCode'=> isset($post['edit_phylumCode'])? $post['edit_phylumCode'] : null,
            );
            return $this->db->update('phylum', $postData, "phylumIdPk = {$post['phylumIdPk']}");


        }

        function get_fetchAll_kingdom($post){
            $obj = $this->db->select("SELECT * FROM `kingdom`");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['kingdomName'];
                $sub_array[] = $row['kingdomCode'];
                $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#edit_kingdom\"
                                >
                                    EDIT
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function get_fetchAll_phylumTable($post){
            $obj = $this->db->select("SELECT * FROM `phylum` INNER JOIN kingdom ON phylum.kingdomIdFk = kingdom.kingdomIdPk");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['phylumName'];
                $sub_array[] = $row['phylumCode'];
                $sub_array[] = $row['kingdomName'];
                $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#edit_phylum\"
                                >
                                    EDIT
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

   

        function get_fetchAll_classTable($post){
            $obj = $this->db->select("SELECT * FROM class LEFT JOIN phylum ON class.phylumidfk = phylum.phylumIdPk LEFT JOIN kingdom ON phylum.kingdomIdFk = kingdom.kingdomIdPk");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['className'];
                $sub_array[] = $row['classCode'];
                $sub_array[] = $row['phylumName'];
                $sub_array[] = $row['kingdomName'];
                $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#edit_class\"
                                >
                                    EDIT
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function get_fetchAll_taxanomy($post){
            $obj = $this->db->select("
                SELECT * FROM ordertaxonomy
                LEFT JOIN class ON ordertaxonomy.classIdFk = class.classIdPk
                LEFT JOIN phylum ON class.phylumidfk = phylum.phylumIdPk 
                LEFT JOIN kingdom ON phylum.kingdomIdFk = kingdom.kingdomIdPk
            ");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['orderTaxonomyName'];
                $sub_array[] = $row['orderTaxonomyCode'];
                $sub_array[] = $row['className'];
                $sub_array[] = $row['phylumName'];
                $sub_array[] = $row['kingdomName'];
                $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#edit_ordertaxonomy\"
                                >
                                    EDIT
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function get_fetchAll_familyTable($post){
            $obj = $this->db->select("
                SELECT * FROM family
                LEFT JOIN ordertaxonomy ON family.orderIdFk = ordertaxonomy.ordertaxonomyIdPk
                LEFT JOIN class ON class.classIdPk = ordertaxonomy.classIdFk
                LEFT JOIN phylum ON phylum.phylumIdPk = class.phylumidfk
                LEFT JOIN kingdom ON kingdom.kingdomIdPk = phylum.kingdomIdFk
            ");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['familyName'];
                $sub_array[] = $row['familyCode'];
                $sub_array[] = $row['orderTaxonomyName'];
                $sub_array[] = $row['className'];
                $sub_array[] = $row['phylumName'];
                $sub_array[] = $row['kingdomName'];
                $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#edit_family\"
                                >
                                    EDIT
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function get_fetchAll_genusTable($post){
            $obj = $this->db->select("
                SELECT * FROM genus
                LEFT JOIN family ON genus.familyIdFk = family.familyIdPk
                LEFT JOIN ordertaxonomy ON family.orderIdFk = ordertaxonomy.ordertaxonomyIdPk
                LEFT JOIN class ON class.classIdPk = ordertaxonomy.classIdFk
                LEFT JOIN phylum ON phylum.phylumIdPk = class.phylumidfk
                LEFT JOIN kingdom ON kingdom.kingdomIdPk = phylum.kingdomIdFk
            ");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['genusName'];
                $sub_array[] = $row['genusCode'];
                $sub_array[] = $row['familyName'];
                $sub_array[] = $row['orderTaxonomyName'];
                $sub_array[] = $row['className'];
                $sub_array[] = $row['phylumName'];
                $sub_array[] = $row['kingdomName'];
                $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#edit_genus\"
                                >
                                    EDIT
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function get_fetchAll_species($post){
            $obj = $this->db->select("
                SELECT * FROM speciestaxanomy
                LEFT JOIN genus ON genus.genusIdPk = speciestaxanomy.genusIdfk
                LEFT JOIN family ON genus.familyIdFk = family.familyIdPk
                LEFT JOIN ordertaxonomy ON family.orderIdFk = ordertaxonomy.ordertaxonomyIdPk
                LEFT JOIN class ON class.classIdPk = ordertaxonomy.classIdFk
                LEFT JOIN phylum ON phylum.phylumIdPk = class.phylumidfk
                LEFT JOIN kingdom ON kingdom.kingdomIdPk = phylum.kingdomIdFk
            ");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['speciesscientificname'];
                $sub_array[] = $row['speciesscientificode'];
                $sub_array[] = $row['genusName'];
                $sub_array[] = $row['familyName'];
                $sub_array[] = $row['orderTaxonomyName'];
                $sub_array[] = $row['className'];
                $sub_array[] = $row['phylumName'];
                $sub_array[] = $row['kingdomName'];
                $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#edit_species\"
                                >
                                    EDIT
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }



        function get_fetchAllOrganization(){
            return $this->db->select($this->masterfetch_allorganization('*',''));
        }

        function fetch_allOrganization(){
            $obj = $this->db->select($this->masterfetch_allorganization('*',''));
           
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            foreach($obj as $row) {
            $r = json_encode($row);
            $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
            $sub_array = array();
            $sub_array[] = $row['organizationName'];
            $sub_array[] = $row['organizationCode'];
            $sub_array[] = $row['organizationLocation'];
            $sub_array[] = $row['organizationPOAddress'];
            $sub_array[] = $row['organizationEmail'];
            $sub_array[] = $row['organizationLL'];
            $sub_array[] = $row['organizationPh'];
            $sub_array[] = $row['organizationsectorname'];
                $sub_array[] = "
                <div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                <button 
                    type=\"button\" 
                    data-mdb-json = \"$jsonR\"
                    class=\"btn btn-warning\" 
                    data-mdb-ripple-init 
                    data-mdb-modal-init 
                    data-mdb-target=\"#edit_org\"
                >
                    EDIT
                </button>
            </div>
            ";
            $data[] = $sub_array;
            } //end foreach loop
            $output = array(
                "draw" => 1,
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function pf_pers_cr($post){

            $w = $this->formatdateInsertUpdateIntoMysql($post['add_person_dob']);
        
            return  $this->db->insert('persons', array(
                'surName' =>        isset($post['add_person_surName'])? $post['add_person_surName'] : null,
                'middleName' =>     isset($post['add_person_middleName'])? $post['add_person_middleName'] : null,
                'givenName' =>      isset($post['add_person_givenName'])? $post['add_person_givenName'] : null,
                'dob' => $w,
                'gender' =>         isset($post['add_person_gender'])? $post['add_person_gender'] : null,

                'employmenttypeidfk' => isset($post['add_person_emptype'])? intval($post['add_person_emptype']) : NULL,
                'phone1' =>         isset($post['add_person_phone1'])? $post['add_person_phone1'] : null,
                'phone2' =>         isset($post['add_person_phone2'])? $post['add_person_phone2'] : null,
                'email' =>          isset($post['add_person_email'])? $post['add_person_email'] : null,
                'postalAddress' =>  isset($post['add_person_postalAddress'])? $post['add_person_postalAddress'] : null,

                'fileNumber' =>     isset($post['add_person_fileNumber'])? $post['add_person_fileNumber'] : null,
                
                'designation' =>    isset($post['add_person_designation'])? $post['add_person_designation'] : null,
                'organizationIdFk' => isset($post['add_person_organizationIdFk'])? $post['add_person_organizationIdFk'] : null,
                'workPhone' =>      isset($post['add_person_workPhone'])? $post['add_person_workPhone'] : null,
                'workemail' =>      isset($post['add_person_workemail'])? $post['add_person_workemail'] : null,
                'isdispositioner' =>      isset($post['add_person_acqstatus'])? $post['add_person_acqstatus'] : intval(0),
               
                
                // Systematic Insertion
                'status' => 'Active',
                'createdStamp'=> date("Y-m-d H:i:s"),
            ));
        }

        function pf_pers_ed($post){
            $w = $this->formatdateInsertUpdateIntoMysql($post['edit_person_dob']);

            $postData = array(
                'surName' =>        isset($post['edit_person_surName'])? $post['edit_person_surName'] : null,
                'middleName' =>     isset($post['edit_person_middleName'])? $post['edit_person_middleName'] : null,
                'givenName' =>      isset($post['edit_person_givenName'])? $post['edit_person_givenName'] : null,
                'dob' => $w,
                'gender' =>         isset($post['edit_person_gender'])? $post['edit_person_gender'] : null,

                'employmenttypeidfk' => isset($post['edit_person_emptype'])? intval($post['edit_person_emptype']) : NULL,
                'phone1' =>         isset($post['edit_person_phone1'])? $post['edit_person_phone1'] : null,
                'phone2' =>         isset($post['edit_person_phone2'])? $post['edit_person_phone2'] : null,
                'email' =>          isset($post['edit_person_email'])? $post['edit_person_email'] : null,
                'postalAddress' =>  isset($post['edit_person_postalAddress'])? $post['edit_person_postalAddress'] : null,

                'fileNumber' =>     isset($post['edit_person_fileNumber'])? $post['edit_person_fileNumber'] : null,
                
                'designation' =>    isset($post['edit_person_designation'])? $post['edit_person_designation'] : null,
                'organizationIdFk' => isset($post['edit_person_organizationIdFk'])? $post['edit_person_organizationIdFk'] : null,
                'workPhone' =>      isset($post['edit_person_workPhone'])? $post['edit_person_workPhone'] : null,
                'workemail' =>      isset($post['edit_person_workemail'])? $post['edit_person_workemail'] : null,
                'isdispositioner' =>      isset($post['edit_person_acqstatus'])? $post['edit_person_acqstatus'] : intval(0),
                // // Systematic Insertion
                'modStamp'=> date("Y-m-d H:i:s"),
            );
                
            $this->db->update('persons', $postData, "personIdPk = {$post['personIdPk']}");
        }


        function pf_org_cr($post){
            return $this->db->insert('organization', array(
                'organizationsectoridfk'=> isset($post['add_org_orgtype'])? $post['add_org_orgtype'] : null,
                'organizationName'=>	 isset($post['add_org_organizationName'])? $post['add_org_organizationName'] : null,
                'organizationCode' => isset($post['add_org_organizationCode'])? $post['add_org_organizationCode'] : null,
                'organizationLocation' => isset($post['add_org_organizationLocation'])? $post['add_org_organizationLocation'] : null,
                'organizationPOAddress'=> isset($post['add_org_organizationPOAddress'])? $post['add_org_organizationPOAddress'] : null,
                'organizationEmail'=>  isset($post['add_org_organizationEmail'])? $post['add_org_organizationEmail'] : null,
                'organizationLL'=> !isset($post['add_org_organizationLL']) || $post['add_org_organizationLL'] == 0 ? null : intval($post['add_org_organizationLL']),
                'organizationPh'=>	!isset($post['add_org_organizationPh']) || $post['add_org_organizationPh'] == 0 ? null : intval($post['add_org_organizationPh']),
                

                // // Systematic Insertion
                'datecreated'=> date("Y-m-d H:i:s"),
            ));
        }

        function pf_org_ed($post){
            $postData = array(
                'organizationsectoridfk'=> isset($post['edit_org_orgtype'])? $post['edit_org_orgtype'] : null,
                'organizationName'=>	 isset($post['edit_org_organizationName'])? $post['edit_org_organizationName'] : null,
                'organizationCode' => isset($post['edit_org_organizationCode'])? $post['edit_org_organizationCode'] : null,
                'organizationLocation' => isset($post['edit_org_organizationLocation'])? $post['edit_org_organizationLocation'] : null,
                'organizationPOAddress'=> isset($post['edit_org_organizationPOAddress'])? $post['edit_org_organizationPOAddress'] : null,
                'organizationEmail'=>  isset($post['edit_org_organizationEmail'])? $post['edit_org_organizationEmail'] : null,
                'organizationLL'=> !isset($post['edit_org_organizationLL']) || $post['edit_org_organizationLL'] == 0 ? null : intval($post['edit_org_organizationLL']),
                'organizationPh'=>	!isset($post['edit_org_organizationPh']) || $post['edit_org_organizationPh'] == 0 ? null : intval($post['edit_org_organizationPh']),
                // // Systematic Insertion
                'datemodified'=> date("Y-m-d H:i:s"),
            );
                
            $this->db->update('organization', $postData, "organizationIdPk = {$post['organizationIdPk']}");
        }

        function fetch_Allpeople($post): array{
            $obj = $this->db->select($this->masterfetch_allpeople('*',''));
           
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
                $sub_array = array();
                $sub_array[] = $row['status'];
                $sub_array[] = $row['surName'];
                $sub_array[] = $row['middleName'];
                $sub_array[] = $row['givenName'];
                $sub_array[] = $row['phone1'];
                $sub_array[] = $row['email'];
                $sub_array[] = $row['designation'];
                $sub_array[] = $row['organizationName'];

                $sub_array[] = "
                <div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                    <button 
                        type=\"button\" 
                        data-mdb-json = \"$jsonR\"
                        class=\"btn btn-warning\" 
                        data-mdb-ripple-init 
                        data-mdb-modal-init 
                        data-mdb-target=\"#edit_person\"
                    >
                        EDIT
                    </button>
                </div>
                ";
            $data[] = $sub_array;
            } //end foreach loop
            $output = array(
                "draw" => 1,
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function fetch_allAcq($post): array{
            $obj = $this->db->select($this->masterfetch_acquisitions('*',''));
         
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            foreach($obj as $row) {
            $sub_array = array();
            $sub_array[] = $row['acqnumber'];
            $sub_array[] = $row['witnessfullname'];
            $sub_array[] = $row['dispofullname'];
            $sub_array[] = '<span class="badge rounded-pill badge-warning">'.$row['acqstatus'].'</span>';
            
            $sub_array[] = !empty($row['spctotaltallysum'])?$row['spctotaltallysum'] . ' x Qty' : '0 x Qty'; 
            $sub_array[] = $row['spctotaltallycount'] . ' Species';
            $sub_array[] = $row['acqcomment'];
            $sub_array[] = $row['acqdateforvisualonly'];
            
            $sub_array[] = '
            <a href="'.URL.'acquisition/editacq/'.$row['acqeventIdPk'].'" class="btn btn-sm btn-warning"><i class="fa fa-edit"> Edit</i></a>
            ';
            $data[] = $sub_array;
            } //end foreach loop
            $output = array(
                "draw" => 1,
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function postspc($post){
            $postData = array(
                'isposted'=>	intval(1),
                'dateposted'=> date("Y-m-d H:i:s"),
            );
            $this->db->update('mstspecies', $postData, "speciesIdPk = {$post['speciesIdPk']}");
        }
    


        function delspc($post){
            $this->db->delete('mstspecies', "speciesIdPk = {$post['speciesIdPk']}");
        }

        function processform_addanimal($post, $acqeventidfk){
            $data =  $this->db->insert('mstspecies', array(
                'speciestypeIdFk' => isset($post['add_animal_speciestype'])? $post['add_animal_speciestype'] : null,
                'acqeventIdFk'=> intval($acqeventidfk), 
                'acquisitiontypeidfk'=>	 isset($post['add_animal_acquisitiontype'])? $post['add_animal_acquisitiontype'] : null,
                'speciescommonname'=> isset($post['add_animal_spccommonname'])? $post['add_animal_spccommonname'] : null,
                'tally'=>	!isset($post['add_animal_tally']) || $post['add_animal_tally'] == 0 ? null : intval($post['add_animal_tally']),
                'periodincaptive'=> !isset($post['add_animal_periodincaptive']) || $post['add_animal_periodincaptive'] == 0 ? null: $post['add_animal_periodincaptive'],
                'locationofspecies'=> isset($post['add_animal_locationofspecies'])? $post['add_animal_locationofspecies'] : null,
                'acqcost'=>	!isset($post['add_animal_cost']) || $post['add_animal_cost'] == 0 ? null : floatval($post['add_animal_cost']),
                'speciesholdertype'=> isset($post['add_animal_speciesholdertype'])? $post['add_animal_speciesholdertype'] : null,
                'spceciescomment'=> isset($post['add_animal_spceciescomment'])? $post['add_animal_spceciescomment'] : null,
                'speciesentryvia'=> 'ACQ',
                'isposted'=> intval(0),
                // Systematic Insertion
                'kindom_tempholderid'=>	 1,
                'speciesDateCreated'=> time(),
            ));

            return $data;
        }

     

        function processform_editanimal($post){
            $postData = array(
                'acquisitiontypeidfk'=>	 isset($post['edit_animal_acquisitiontype'])? $post['edit_animal_acquisitiontype'] : null,
                'planttypeidfk' => isset($post['edit_animal_planttype'])? $post['edit_animal_planttype'] : null,
                'plantsizetypeidfk' => isset($post['edit_animal_plantsize'])? $post['edit_animal_plantsize'] : null,
                'speciescommonname'=> isset($post['edit_animal_spccommonname'])? $post['edit_animal_spccommonname'] : null,
                'tally'=> isset($post['edit_animal_tally'])? $post['edit_animal_tally'] : null,
                'periodincaptive'=> !isset($post['edit_animal_periodincaptive']) || $post['edit_animal_periodincaptive'] == 0 ? null: $post['edit_animal_periodincaptive'],
                'locationofspecies'=> isset($post['edit_animal_locationofspecies'])? $post['edit_animal_locationofspecies'] : null,
                'acqcost'=>	!isset($post['edit_animal_cost']) || $post['edit_animal_cost'] == 0 ? null : floatval($post['edit_animal_cost']),
                'speciesholdertype'=> isset($post['edit_animal_speciesholdertype'])? $post['edit_animal_speciesholdertype'] : null,
                'spceciescomment'=> isset($post['edit_animal_spceciescomment'])? $post['edit_animal_spceciescomment'] : null,

                // Systematic Insertion
                'speciesDateModified'=> time(),
            );
                 
            $this->db->update('mstspecies', $postData, "speciesIdPk = {$post['speciesIdPk']}");
        }

        function processform_editplant($post){

            $postData = array(
                'acquisitiontypeidfk'=>	 isset($post['edit_plant_acquisitiontype'])? $post['edit_plant_acquisitiontype'] : null,
                'planttypeidfk' => isset($post['edit_plant_planttype'])? $post['edit_plant_planttype'] : null,
                'plantsizetypeidfk' => isset($post['edit_plant_plantsize'])? $post['edit_plant_plantsize'] : null,
                'speciescommonname'=> isset($post['edit_plant_spccommonname'])? $post['edit_plant_spccommonname'] : null,
                'tally'=> !isset($post['edit_plant_tally']) || $post['edit_plant_tally'] == 0 ? null: $post['edit_plant_tally'],
                'periodincaptive'=> !isset($post['edit_plant_periodincaptive']) || $post['edit_plant_periodincaptive'] == 0 ? null: $post['edit_plant_periodincaptive'],
                'locationofspecies'=> isset($post['edit_plant_locationofspecies'])? $post['edit_plant_locationofspecies'] : null,
                'acqcost'=>	!isset($post['edit_plant_cost']) || $post['edit_plant_cost'] == 0 ? null : floatval($post['edit_plant_cost']),
                'speciesholdertype'=> isset($post['edit_plant_speciesholdertype'])? $post['edit_plant_speciesholdertype'] : null,
                // edit_plant_spceciescomment
                'spceciescomment'=> isset($post['edit_plant_spceciescomment'])? $post['edit_plant_spceciescomment'] : null,

                // Systematic Insertion
                'speciesentryvia'=> 'ACQ',
                'kindom_tempholderid'=>	 2,
                'isposted'=> intval(0),
                'speciesDateModified'=> time(),
            );
                
            $this->db->update('mstspecies', $postData, "speciesIdPk = {$post['speciesIdPk']}");
        }

        function processform_createacq($post){
            // datepicker format for Database
            $datenewArray = explode("/",$post['acquisitionDate']) ;
            return $this->db->insert('acquisitionevents', array(
                 'acqnumber'=>	 isset($post['acqnumber'])? $post['acqnumber'] : null,
                 'witnessIdFk'=>	 isset($post['witnessby'])? $post['witnessby'] : null,
                 'acqstatus'=>	 'Pending',
                 'acqcomment'=>	 isset($post['acqcomment'])? $post['acqcomment'] : null,
                 'acquisitionbyidfk'=>	 isset($post['acquisitionby'])? $post['acquisitionby'] : null,
                 'acqdate'=>	 isset($post['acquisitionDate'])? $datenewArray[2].'-'.$datenewArray[1]. '-'.$datenewArray[0] : date_format(date_create(), 'Y-m-d'),
            ));
        }

        function processform_editacq($post, $id){
            $datenewArray = explode("/",$post['edit_acquisitionDate']) ;
            $postData = array(
                'acqnumber'=>	 isset($post['edit_acqnumber'])? $post['edit_acqnumber'] : null,
                'witnessIdFk'=>	 isset($post['edit_witnessby'])? $post['edit_witnessby'] : null,
                'acqcomment'=>	 isset($post['edit_acqcomment'])? $post['edit_acqcomment'] : null,
                'acquisitionbyidfk'=> isset($post['edit_acquisitionby'])? $post['edit_acquisitionby'] : null,
                 'acqdate'=>	 isset($post['edit_acquisitionDate'])? $datenewArray[2].'-'.$datenewArray[1]. '-'.$datenewArray[0] : date_format(date_create(), 'Y-m-d'),
            );
            $this->db->update('acquisitionevents', $postData, "acqeventIdPk = {$id}");
        }

        function getcountry(){
            return  $this->db->select("SELECT * FROM `country`");
        }

        function fetch_alldispositiontypes(){
            return  $this->db->select("SELECT * FROM `dispositiontype`");
        }

        function fetch_allacquisitiontypes(){
            return  $this->db->select("SELECT * FROM `acquisitiontype`");
        }

        function x($a, $id){
            // $c = ' where true';
            return $this->db->select($this->masterfetch_acquisitions("*", ' AND datatable.acqeventIdPk = '.$id));
        }

        function pastNumbersrecentAcqNumber(){
            return $this->db->select("SELECT acquisitionevents.acqnumber FROM acquisitionevents ORDER BY acquisitionevents.acqnumber DESC LIMIT 1");
        }

        function checkacnumber($acqnumber){
            $acqnumber = intval($acqnumber);
            return $this->db->select("SELECT * FROM `acquisitionevents` where acquisitionevents.acqnumber = $acqnumber limit 1");
        }

        function thisacquisition($id){
            return $this->db->select($this->masterfetch_acquisitions('*','AND  datatable.acqeventIdPk='.$id));
        }


       

        function acqspecies($post){
            $obj = $this->db->select($this->masterfetch_species('*', " AND datatable.speciesentryvia = 'ACQ' 
            AND 
            datatable.isposted = 0 
            AND
            datatable.acqeventIdFk = ".$post['acqeventIdPk']."
            "));
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
                $r = json_encode($row);
                $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
            $sub_array = array();
            $btn_edit = $row['kingdomIdPk'] == 1? 'edit_animal':'edit_plant';
            $btn_view = $row['kingdomIdPk'] == 1? 'view_animal':'view_plant';
            $btn_post = $row['kingdomIdPk'] == 1? 'post_animal':'post_plant';
            $sub_array[] = $row['kingdomName'];
            $sub_array[] = $row['kingdomIdPk'] == 1 ?$row['speciestypename'] : $row['plantname'];
            $sub_array[] = $row['acquisitiontypename'];
            $sub_array[] = $row['speciescommonname'];
            $sub_array[] = $row['tally'];
            $sub_array[] = $row['periodincaptive'];
            $sub_array[] = $row['locationofspecies'];
            $sub_array[] = "<div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Action Items\">
                                <button 
                                    type=\"button\" 
                                    class=\"btn btn-primary\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-json = \"$jsonR\"
                                    data-mdb-target=\"#$btn_view\"
                                >
                                    VIEW
                                </button>

                                <button 
                                    type=\"button\" 
                                    data-mdb-json = \"$jsonR\"
                                    class=\"btn btn-warning\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init 
                                    data-mdb-target=\"#$btn_edit\"
                                >
                                    EDIT
                                </button>


                                <button 
                                    type=\"button\" 
                                    class=\"btn btn-success\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init
                                    data-mdb-json = \"$jsonR\" 
                                    data-mdb-target=\"#$btn_post\"
                                >
                                    POST
                                </button>

                                <button 
                                    type=\"button\" 
                                    class=\"btn btn-primary btn-danger\" 
                                    data-mdb-ripple-init 
                                    data-mdb-modal-init
                                    data-mdb-json = \"$jsonR\" 
                                    data-mdb-target=\"#remove_species\"
                                >
                                    REMOVE
                                </button>
                            </div>";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function acqspeciesRev($post){
            $obj = $this->db->select($this->masterfetch_species('*', " AND datatable.speciesentryvia = 'ACQ' 
            AND 
            datatable.isposted = 1 
            AND
            datatable.acqeventIdFk = ".$post['acqeventIdPk']."
            "));

            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            $c = 1;
            foreach($obj as $row) {
            $r = json_encode($row);
            $sub_array = array();
            $btn_mng = $row['kingdomIdPk'] == 1? 'manage_animal':'manage_plant';
            $btn_acpt = $row['kingdomIdPk'] == 1? 'accept_animal':'accept_plant';
            $sub_array[] = $row['kingdomName'];
            $sub_array[] = $row['speciestypename'];
            $sub_array[] = $row['acquisitiontypename'];
            $sub_array[] = $row['speciescommonname'];
            $sub_array[] = $row['tally'];
            $sub_array[] = $row['periodincaptive'];
            $sub_array[] = $row['locationofspecies'];
            $jsonR = htmlspecialchars(json_encode($r), ENT_QUOTES, 'UTF-8');
            $sub_array[] = "
            <div class=\"btn-group btn-group-sm\" role=\"group\" aria-label=\"Review\">
            <button type=\"button\" class=\"btn btn-success\" data-mdb-ripple-init data-mdb-modal-init data-mdb-json=\"$jsonR\" data-mdb-target=\"#$btn_acpt\">Accept</button>
            <button type=\"button\" class=\"btn btn-danger\" data-mdb-ripple-init data-mdb-modal-init data-mdb-json=\"$jsonR\" data-mdb-target=\"#remove_species\">Reject</button>
            <button type=\"button\" class=\"btn btn-warning\" data-mdb-ripple-init data-mdb-modal-init data-mdb-json=\"$jsonR\" data-mdb-target=\"#$btn_mng\">Manage</button>
            </div>
            ";
            $data[] = $sub_array;
            $c++;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }


        public function domaincontrol(){

        }

        function fetch_allAcqRev($post): array{
            $obj = $this->db->select($this->masterfetch_acquisitions('*',''));
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            foreach($obj as $row) {
            $sub_array = array();
            $sub_array[] = $row['acqnumber'];
            $sub_array[] = $row['witnessfullname'];
            $sub_array[] = $row['dispofullname'];
            $sub_array[] = '<span class="badge rounded-pill badge-warning">'.$row['acqstatus'].'</span>';
            
            $sub_array[] = $row['spctotaltallysum'] . ' x Qty';
            $sub_array[] = $row['spctotaltallycount'] . ' Species';
            $sub_array[] = $row['acqcomment'];
            $sub_array[] = $row['acqdateforvisualonly'];
            $sub_array[] = '
            <a href="'.URL.'acquisition/reviewspcsacq/'.$row['acqeventIdPk'].'" type="button" class="btn btn-info btn-sm" data-mdb-ripple-init>  Manage <i class="fa fa-user-edit"></i></a>';
            $data[] = $sub_array;
            } //end foreach loop
            $output = array(
                "draw" => 1,
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function fetch_alldispositioner(){
            $str = $this->masterfetch_allpeople('*', 'where datatable.isdispositioner=1');
            return $this->db->select($str);
        }

        function fetch_allorgs(){
            return  $this->db->select("SELECT * FROM `organization` WHERE organization.organizationIdPk <>1");
        }

        function fetch_allpomnpstaff(){
            $str = $this->masterfetch_allpeople('*', ' AND datatable.organizationIdFk = 1 AND datatable.status="Active" ');
            return $this->db->select($str);
        }

        function fetch_acquisitionby(){
            $str = $this->masterfetch_allpeople('*', ' AND datatable.organizationIdFk <> 1 ');
            return $this->db->select($str);
        }

        
        
        function mstacq($post){
            $obj = $this->db->select("SELECT * FROM `country`");
            $data = array();
            $countRow=0;
            foreach($obj as $v){ $countRow=$countRow+1; }
            foreach($obj as $row) {
            $sub_array = array();
            $sub_array[] = $row['countryName'];
            $sub_array[] = $row['countryCode'];
            $sub_array[] = $row['isoCode'];
            $sub_array[] = '<a href="#">Edit</a>';
            $data[] = $sub_array;
            } //end foreach loop
            $output = array(
                "draw" => intval($post["draw"]),
                "recordsTotal"  =>  $countRow,
                "recordsFiltered" => $this->getCountOfObject($obj),
                "data" => $data
            );
            return $output;
        }

        function fetch_allSpeciesTypes(){
            return $this->db->select('SELECT * FROM `speciestype`');
        }
    }
?>