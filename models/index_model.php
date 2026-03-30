<?php
    class Index_Model extends Model{
        function __construct(){
            parent::__construct();
        }

        function get_fetchAllPeople(){
            return $this->db->select($this->masterfetch_allpeople());
        }

        function postspc($post){
            $postData = array(
                'isposted'=>	intval(1),
                'dateposted'=> date("Y-m-d H:i:s"),
            );
            return $this->db->update('mstspecies', $postData, "speciesIdPk = {$post['speciesIdPk']}");
        }
    


        function delspc($post){
            $this->db->delete('mstspecies', "speciesIdPk = {$post['speciesIdPk']}");
        }

        function pf($post){
            $data =  $this->db->insert('masterenquiry', array(
                'principal'=> isset($post['principal'])? $post['principal'] : null,
                'nofortnight'=> isset($post['nofortnight'])? $post['nofortnight'] : null,
                'firstname'=> isset($post['firstname'])? $post['firstname'] : null,
                'surname'=> isset($post['surname'])? $post['surname'] : null,
                'organization'=> isset($post['organization'])? $post['organization'] : null,
                'empfilenumber'=> isset($post['empfilenumber'])? $post['empfilenumber'] : null,
                'phone'=> isset($post['phone'])? $post['phone'] : null,
                'cemail'=> isset($post['cemail'])? $post['cemail'] : null,
                // Systematic Insertion
                'sysdata_percent'=> 0.35,
                'enquirydate'=> date("Y-m-d H:i:s"),
            ));

            return $data;
        }

        function processform_addplant($post, $acqeventidfk){
            return $this->db->insert('mstspecies', array(
                'acquisitiontypeidfk'=>	 isset($post['add_plant_acquisitiontype'])? $post['add_plant_acquisitiontype'] : null,
                'planttypeidfk' => isset($post['add_plant_planttype'])? $post['add_plant_planttype'] : null,
                'plantsizetypeidfk' => isset($post['add_plant_plantsize'])? $post['add_plant_plantsize'] : null,
                'speciescommonname'=> isset($post['add_plant_spccommonname'])? $post['add_plant_spccommonname'] : null,
                'tally'=>	!isset($post['add_plant_tally']) || $post['add_plant_tally'] == 0 ? null : intval($post['add_plant_tally']),
                'periodincaptive'=> !isset($post['add_plant_periodincaptive']) || $post['add_plant_periodincaptive'] == 0 ? null: $post['add_plant_periodincaptive'],
                'locationofspecies'=> isset($post['add_plant_locationofspecies'])? $post['add_plant_locationofspecies'] : null,
                'acqcost'=>	!isset($post['add_plant_cost']) || $post['add_plant_cost'] == 0 ? null : floatval($post['add_plant_cost']),
                'speciesholdertype'=> isset($post['add_plant_speciesholdertype'])? $post['add_plant_speciesholdertype'] : null,
                'spceciescomment'=> isset($post['add_plant_spceciescomment'])? $post['add_plant_spceciescomment'] : null,

                // Systematic Insertion
                'acqeventIdFk'=> intval($acqeventidfk), 
                'speciesentryvia'=> 'ACQ',
                'kindom_tempholderid'=>	 2,
                'isposted'=> intval(0),
                'speciesDateCreated'=> date("Y-m-d H:i:s"),
            ));
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
                'speciesDateModified'=>date("Y-m-d H:i:s"),
            );
                 
            return $this->db->update('mstspecies', $postData, "speciesIdPk = {$post['speciesIdPk']}");
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
                'speciesDateModified'=> date("Y-m-d H:i:s"),
            );
                
            return $this->db->update('mstspecies', $postData, "speciesIdPk = {$post['speciesIdPk']}");
        }

        function processform_createacq($post){
            // datepicker format for Database
            $datenewArray = explode("/",$post['acquisitionDate']) ;
            return $this->db->insert('acquisitionevents', array(
                 'acqnumber'=>	 isset($post['acqnumber'])? $post['acqnumber'] : null,
                 'witnessIdFk'=>	 isset($post['witnessby'])? $post['witnessby'] : null,
                 'acqstatus'=>	 'Pending',
                 'isacqarchived'=> intval(0), //
                 'acqcomment'=>	 isset($post['acqcomment'])? $post['acqcomment'] : null,
                 'acquisitionbyidfk'=>	 isset($post['acquisitionby'])? $post['acquisitionby'] : null,
                 'acqdate'=>	 isset($post['acquisitionDate'])? $datenewArray[2].'-'.$datenewArray[1]. '-'.$datenewArray[0] : date_format(date_create(), 'Y-m-d'),
            ));
        }

        function processform_editacq($post, $id){
            $datenewArray = explode("/",$post['edit_acquisitionDate']) ;
            $data = isset($post['edit_acqach'])? intval($post['edit_acqach']) : null;
         
            $postData = array(
                'isacqarchived'=>	$data,
                'acqnumber'=>	 isset($post['edit_acqnumber'])? $post['edit_acqnumber'] : null,
                'witnessIdFk'=>	 isset($post['edit_witnessby'])? $post['edit_witnessby'] : null,
                'acqcomment'=>	 isset($post['edit_acqcomment'])? $post['edit_acqcomment'] : null,
                'acquisitionbyidfk'=> isset($post['edit_acquisitionby'])? $post['edit_acquisitionby'] : null,
                 'acqdate'=>	 isset($post['edit_acquisitionDate'])? $datenewArray[2].'-'.$datenewArray[1]. '-'.$datenewArray[0] : date_format(date_create(), 'Y-m-d'),
            );
            return $this->db->update('acquisitionevents', $postData, "acqeventIdPk = {$id}");
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

        function fetch_allAch(): array{
            $obj = $this->db->select($this->masterfetch_acquisitions('*',' AND datatable.isacqarchived = 1 '));
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
            <a href="'.URL.'acquisition/addspiecesacq/'.$row['acqeventIdPk'].'" type="button"  class="btn btn-info btn-sm" data-mdb-ripple-init>  Manage <i class="fa fa-user-edit"></i></a>
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


        function fetch_allAcq(): array{
            $obj = $this->db->select($this->masterfetch_acquisitions('*',' AND datatable.isacqarchived = 0 '));
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
            <a href="'.URL.'acquisition/addspiecesacq/'.$row['acqeventIdPk'].'" type="button"  class="btn btn-info btn-sm" data-mdb-ripple-init>  Manage <i class="fa fa-user-edit"></i></a>
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

        function get_fetch_SingleRecordWitnessBy($id){
            $str = $this->masterfetch_allpeople('*', ' AND  datatable.personIdPk=' .$id . " LIMIT 1 ");
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
            $str = $this->masterfetch_allpeople('*', ' AND datatable.isdispositioner = 1 ');
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