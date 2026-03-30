<?php



class Validate{
    public function __construct(){

    }

    public function emptys($data = null){
        if($data == null){
            return "Empty text field";
        }
    }
	
	

    public function minlength($data, $arg){
        if(strlen($data) < $arg){
            return "Characters must be $arg characters long.";
        }
    }

    public function maxlength($data, $arg){
        if(strlen($data) > $arg){
            return "Character must be $arg characters short";
        }
    }

    public function digit($data){
        if(!ctype_digit($data)){
            return "Your string must be a digit";
        }
    }

    public function __call($name, $arguments){
        throw new Exception($name.' does not exist inside of: '. __CLASS__);
    }
}

?>