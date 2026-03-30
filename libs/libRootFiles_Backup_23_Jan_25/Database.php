<?php
class Database extends PDO{
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
        parent::__construct($DB_TYPE.':host='.$DB_HOST.'; dbname='. $DB_NAME, $DB_USER, $DB_PASS);
    }

    public function auto_register_student_transcript($int_range, $ext_range, $ucidfk, $regidfk){
        try{
            $sql = 'CALL `auto_register_student_transcript`(:int_range, :ext_range, :ucidfk, :regidfk);';
            $sth = $this->prepare($sql);
            $sth->bindParam(':int_range', $int_range, PDO::PARAM_INT);
            $sth->bindParam(':ext_range', $ext_range, PDO::PARAM_INT);
            $sth->bindParam(':ucidfk', $ucidfk, PDO::PARAM_INT);
            $sth->bindParam(':regidfk', $regidfk, PDO::PARAM_INT);
            $val = $sth->execute();
            return $val;
        }catch(Exception $e){
            $myfile = fopen("Database_auto_register_student_transcript_Error_Log.txt", "w") or die("Unable to open file!");
            fwrite($myfile, json_encode($e)); 
            fclose($myfile);
        }


    }

    
public function callsp(){
    $sql = 'CALL `get_country`(:id);';
    $sth = $this->prepare($sql);
    $years = [];
    $id= 120;
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $b = $sth->execute();
    return $sth->fetchAll(PDO::FETCH_ASSOC);
}

    /**
     * insert
     * @param string $table - A name of table to insert into
     * @param string $data - An associate of Array
     */
    public function insert($table, $data){
        try{
            ksort($data);
            $fieldNames = implode('`, `' , array_keys($data));
            $fieldValues = ':' . implode(', :', array_keys($data));
            $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
            foreach($data as $key => $value){
                $sth->bindValue(":$key", $value);
            }
            return $sth->execute();
        }catch(Exception $e){
            $myfile = fopen("Database_Insert_Error_Log.txt", "w") or die("Unable to open file!");
            fwrite($myfile, json_encode($e)); 
            fclose($myfile);
        }
    }



    /**
     * insert
     * @param string $sql - An sql string
     * @param constant fetchMode - A PDO fetch mode
     * @param array $array - array parameters to bind
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
        $sth = $this->prepare($sql);
        foreach($array as $key => $value){
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

     /**
     * update
     * @param string $table - A name of table to insert into
     * @param string $data - An associate of Array
     * @param string $where - An associate of Array
     */
    public function update($table, $data, $where){
        try{
            ksort($data);
            $fieldDetails = null;
            foreach($data as $key => $value){
                $fieldDetails .= "`$key` =:$key,";
            }      
            $fieldDetails = rtrim($fieldDetails, ',');
            $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
            foreach($data as $key => $value){
                $sth->bindValue(":$key", $value);
            }
            $sth->execute();
        }catch(Exception $e){
            /*************Development Bug - Start */
            $obj['boolean'] = false;
            $obj['message'] = 'Cannot Update this Record';
            $myfile = fopen("Database_Update_Error_Log.txt", "a") or die("Unable to open file!");
            fwrite($myfile, json_encode( $obj )."\n");
            fwrite($myfile, json_encode('PDO Error Message for Update: ' . $e )."\n");
            fclose($myfile);
            /*************Development Bug - Start */
        }
    }

    /**
     * delete
     * @param string $table - A name of table to insert into
     * @param string $data - An associate of Array
     * @param string $limit - An associate of Array
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit=1){
        $obj = array('boolean' => true, 'message' => '' );
        try{
            if($this->exec("DELETE FROM $table WHERE $where LIMIT $limit")){
               return $obj;
            }else{
                throw new Exception($this->errorInfo()[1]);
            }
        }catch(Exception $e){
            /*************Development Bug - Start */
            $obj['boolean'] = false;
            $obj['message'] = 'Cannot Delete this Parent Record';
            $myfile = fopen("Database_Delete_Error_Log.txt.txt", "a") or die("Unable to open file!");
            fwrite($myfile, json_encode( $obj )."\n");
            fclose($myfile);
            /*************Development Bug - Start */
        }
}

    public function getLastInsertId(){
        return $this->lastInsertId();
    }

    public function fetchFields($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC){
        $sth = $this->prepare($sql);
        foreach($array as $key => $value){
            $sth->bindValue("$key", $value);
        }
        $sth->execute();

            // Fetch the column names
        $columnNames = [];
        for ($i = 0; $i < $sth->columnCount(); $i++) {
            $columnMeta = $sth->getColumnMeta($i);
            $columnNames[] = $columnMeta['name'];
        }

        return $columnNames;
        // return $sth->fetchAll($fetchMode);
    }

    function get_fetchStatementHandlerPDO($string){
        // Define the query to fetch data
        $stmt = $this->query($string);

        return $stmt;

        // // Fetch the column names
        // $columnNames = [];
        // for ($i = 0; $i < $stmt->columnCount(); $i++) {
        //     $columnMeta = $stmt->getColumnMeta($i);
        //     $columnNames[] = $columnMeta['name'];
        // }
    }
}
?>