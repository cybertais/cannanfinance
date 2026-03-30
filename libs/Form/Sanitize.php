<?php

class Sanitize{
    public function __construct(){

    }


    public function sanitizeString($data){
        
    }
	
	


    public function __call($name, $arguments){
        throw new Exception($name.' does not exist inside of: '. __CLASS__);
    }
}

?>