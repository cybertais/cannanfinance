<?php
   class Model{
        function __construct(){
            $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        }

        function isValidFormat($string) {
            return preg_match('/^\d{4}-\d{2}-\d{2}$/', $string) === 1;
        }

        // Accept Date As String in the format of 31/03/2025
        // Return Date in the Format of 2025-03-31 , if blank it returns null
       public  function formatdateInsertUpdateIntoMysql($datefromhtml){
            $datenewArray = isset($datefromhtml) ?  explode("/",$datefromhtml) : null;
            if(!empty($datenewArray[0])){
                return strval($datenewArray[2].'-'.$datenewArray[1]. '-'.$datenewArray[0]) ;
            }else{
                return null;
            }
        }

        
        function entryviatype(){
            /* `ffcsms`.`speciesentryvia` */
            return array(
                array('speciesentryviaIdPk' => 'ACQ','speciesentryviaCode' => 'ACQ','speciesentryviaName' => 'Acquisition'),
                array('speciesentryviaIdPk' => 'IUCN','speciesentryviaCode' => 'IUCN','speciesentryviaName' => 'IUCN Red List'),
            );
        }

        function acqstatustype(){
            /* `ffcsms`.`speciesentryvia` */
            return array(
                array('acqstatustypeIdPk' => 1,'acqstatustype_code' => 'Yes','acqstatustype_name' => 'Enable','descriptionacq' => 'Eligible to Participate in Acq',),
                array('acqstatustypeIdPk' => 0,'acqstatustype_code' => 'No','acqstatustype_name' => 'Disable','descriptionacq' => 'Not Eligible to Participate in Acq',),
            );
        }

        // acqstatustype

        function gendertype(){
            /* `ffcsms`.`speciesentryvia` */
            return array(
                array('gendercode' => 'Male','gendername' => 'Male'),
                array('gendercode' => 'Female','gendername' => 'Female'),
            );
        }



        // This is for Global Purpose: The function will be used frequent

        function get_employmentType(){
            return $this->db->select('SELECT * FROM `employmenttype`');
        }

        function get_plantTypes(){
            return $this->db->select('SELECT * FROM `planttypes`');
        }

        function get_plantTypeSizes(){
            return $this->db->select('SELECT * FROM `plantsizetype`');
        }

        function get_fetchAllKingdom(){
            return $this->db->select('SELECT * FROM `kingdom`');
        }

        function get_fetchAll_phylum($where = ''){
            return $this->db->select("SELECT * FROM `phylum` WHERE 1 {$where} ");
        }

        function get_fetchAll_subphylum(){
            return $this->db->select('SELECT * FROM `subphylum`');
        }

        function get_fetchAll_class(){
            return $this->db->select('SELECT * FROM `class`');
        }

        function get_fetchAll_ordertaxonomy(){
            return $this->db->select('SELECT * FROM `ordertaxonomy`');
        }

        function get_fetchAll_family(){
            return $this->db->select('SELECT * FROM `family`');
        }

        function get_fetchAll_genus(){
            return $this->db->select('SELECT * FROM `genus`');
        }

        function masterfetch_acquisitions($columns = '*', $condition = ''){

           /************* Development Bug - Start ******/
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
fwrite($myfile, (      'SELECT '.$columns.' FROM 
                (
                 SELECT 
                        acquisitionevents.acqeventIdPk,
                        acquisitionevents.witnessIdFk,
                        acquisitionevents.acquisitionbyidfk,
                        acquisitionevents.systemuser,
                        
                        DATE_FORMAT(acquisitionevents.datecreated, "%d %b %Y") AS acdatecreated,
                        DATE_FORMAT(acquisitionevents.acqdate, "%d %b %Y") AS acqdateforvisualonly,
                        acquisitionevents.datecreated,
                        acquisitionevents.acqdate,
                        
                        acquisitionevents.acqstatus,
                        acquisitionevents.acqcomment,
                        acquisitionevents.acqnumber as acqnumber,
                        witness.givenName as witgivname,
                        witness.surName as witsurname,
                        CONCAT(witness.givenName ," ",witness.surName ) as witnessfullname,

                        dispositioner.givenName as dispogivenName,
                        dispositioner.surName as disposurname,
                        CONCAT(dispositioner.givenName  ," ", dispositioner.surName ) as dispofullname,
                        count(mstspecies.tally) as spctotaltallycount,
                        sum(mstspecies.tally) as spctotaltallysum

                        FROM acquisitionevents
                        LEFT JOIN persons as witness ON witness.personIdPk = acquisitionevents.witnessIdFk
                        LEFT JOIN persons as dispositioner ON dispositioner.personIdPk = acquisitionevents.acquisitionbyidfk      
                        LEFT JOIN mstspecies ON acquisitionevents.acqeventIdPk = mstspecies.acqeventIdFk
                         GROUP BY acquisitionevents.acqeventIdPk
                )
                as datatable where 1 '  . $condition    )."\n");
fclose($myfile);
/************* Development Bug - End ******/


            return 'SELECT '.$columns.' FROM 
                (
                 SELECT 
                        acquisitionevents.acqeventIdPk,
                        acquisitionevents.witnessIdFk,
                        acquisitionevents.acquisitionbyidfk,
                        acquisitionevents.systemuser,
                        
                        DATE_FORMAT(acquisitionevents.acqdate, "%d %b %Y") AS acdatecreated,
                        DATE_FORMAT(acquisitionevents.acqdate, "%d %b %Y") AS acqdateforvisualonly,
                        acquisitionevents.datecreated,
                        acquisitionevents.acqdate,
                        acquisitionevents.isacqarchived,
                        acquisitionevents.acqstatus,
                        acquisitionevents.acqcomment,
                        acquisitionevents.acqnumber as acqnumber,
                        witness.givenName as witgivname,
                        witness.surName as witsurname,
                        CONCAT(witness.givenName ," ",witness.surName ) as witnessfullname,

                        dispositioner.givenName as dispogivenName,
                        dispositioner.surName as disposurname,
                        CONCAT(dispositioner.givenName  ," ", dispositioner.surName ) as dispofullname,
                        count(mstspecies.tally) as spctotaltallycount,
                        sum(mstspecies.tally) as spctotaltallysum

                        FROM acquisitionevents
                        LEFT JOIN persons as witness ON witness.personIdPk = acquisitionevents.witnessIdFk
                        LEFT JOIN persons as dispositioner ON dispositioner.personIdPk = acquisitionevents.acquisitionbyidfk      
                        LEFT JOIN mstspecies ON acquisitionevents.acqeventIdPk = mstspecies.acqeventIdFk
                         GROUP BY acquisitionevents.acqeventIdPk
                )
                as datatable where 1 '  . $condition;
        }
        function masterfetch_species($columns = '*', $condition = ''){
            return 'SELECT '.$columns.' FROM 
                (
                SELECT 
                *,
                DATE_FORMAT(acquisitionevents.datecreated, "%d %b %Y") AS acdatecreated

                FROM mstspecies
                LEFT JOIN speciestype ON speciestype.speciestypeIdPk = mstspecies.speciestypeIdFk
                LEFT JOIN genus ON genus.genusIdPk = mstspecies.genusIdFk
                INNER JOIN acquisitionevents ON acquisitionevents.acqeventIdPk = mstspecies.acqeventIdFk
                INNER JOIN acquisitiontype ON acquisitiontype.acquisitiontypeidpk = mstspecies.acquisitiontypeidfk
                INNER JOIN kingdom ON mstspecies.kindom_tempholderid = kingdom.kingdomIdPk
                LEFT JOIN planttypes ON mstspecies.planttypeidfk = planttypes.planttypeidpk
                LEFT JOIN plantsizetype ON mstspecies.plantsizetypeidfk = plantsizetype.plantsizetypeidpk
                                )
                                as datatable WHERE 1 '  . $condition;
        }

        function masterfetch_allpeople($columns = '*', $condition = ''){
                return "SELECT {$columns} FROM ( 
                      SELECT * FROM persons 
                        LEFT JOIN organization ON persons.organizationIdFk = organization.organizationIdPk 
                        LEFT JOIN organizationsector ON organizationsector.organizationsectoridpk  = organization.organizationsectoridfk
                        LEFT JOIN employmenttype ON employmenttype.employmenttypeidpk = persons.employmenttypeidfk
                        ) as datatable where 1 {$condition} ";
        }

        /*
        $obj - Obj in Array from Database
        Return Integer
        */
        function getCountOfObject($obj){
            $count=0;
            foreach($obj as $v){ $count=$count+1; }
            return $count;
        }

        function get_fetchAllSwitch(){
            return $this->db->select('SELECT * FROM `defaultswitch`');
        }

        function get_fetchAllorganizationsector(){
            return $this->db->select('SELECT * FROM `organizationsector`');
        }

        function masterfetch_allorganization($columns = '*', $condition = ''){
            return "SELECT {$columns} FROM ( 
            SELECT * FROM `organization`
LEFT JOIN organizationsector ON organizationsector.organizationsectoridpk = organization.organizationsectoridfk
             ) as datatable where 1 {$condition} ";
        }
    }

?>