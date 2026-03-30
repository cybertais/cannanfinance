<?php
class Agents_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllAgents()
    {
        $string = "SELECT * FROM peoples
                        INNER JOIN agents ON agents.personidfk=peoples.persidpk
                        INNER JOIN provinces ON provinces.provinceId=agents.provinceid
                        WHERE agents.isactive is true
                        ORDER BY agents.datecreate DESC;
                    ";
                        $obj = $this->db->select($string);
                        return $obj;

    }
}
?>