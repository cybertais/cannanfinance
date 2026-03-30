<?php
   class Model{
        function __construct(){
            $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        }

        function masterfetch_acquisitions($columns = '*', $condition = ''){
            return 'SELECT '.$columns.' FROM 
                (
                    SELECT 
                    DATE_FORMAT(acquisitionevents.datecreated, "%d %b %Y") AS acdatecreated,
                    acquisitionevents.datecreated,
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
                    INNER JOIN persons as witness ON witness.personIdPk = acquisitionevents.witnessIdFk
                    INNER JOIN persons as dispositioner ON dispositioner.personIdPk = acquisitionevents.dispositioneridfk      
                    INNER JOIN mstspecies ON acquisitionevents.acqeventIdPk = mstspecies.acqeventIdFk
                    GROUP BY mstspecies.acqeventIdFk 
                )
                as datatable '  . $condition;
        }

        function masterfetch_species($columns = '*', $condition = ''){
            return 'SELECT '.$columns.' FROM 
                (
                    SELECT * FROM `mstspecies`
                    INNER JOIN speciestype ON speciestype.speciestypeIdPk = mstspecies.speciestypeIdFk
                    INNER JOIN dispositiontype ON dispositiontype.dispositiontypeIdPk = mstspecies.dispositiontypeIdFk
                    INNER JOIN genus ON genus.genusIdPk = mstspecies.genusIdFk
                    INNER JOIN acquisitionevents ON acquisitionevents.acqeventIdPk = mstspecies.acqeventIdFk
                )
                as datatable '  . $condition;
        }


        

        function masterfetch_allpeople($columns = '*', $condition = ''){
                return 'SELECT '.$columns.' FROM 
                    (
                        SELECT 
                            acquisitionevents.datecreated,
                            acquisitionevents.acqstatus,
                            acquisitionevents.acqcomment,
                            acquisitionevents.acqnumber as acqnumber, 
                            dispositioner.givenName as dispgivname, 
                            witness.givenName as witgivname 
                            FROM acquisitionevents
                            INNER JOIN persons as witness ON witness.personIdPk = acquisitionevents.witnessIdFk
                            INNER JOIN persons as dispositioner ON dispositioner.personIdPk = acquisitionevents.dispositionIdFk            
                        )
                    as datatable '  . $condition;
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
    }

?>