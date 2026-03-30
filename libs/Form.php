<?php
class Form extends Validate{

    private $_tagNameArray;
    private $_tagNameCurrent; //stores the name of the Html Tag Name
    private $_tagValueCurrent; //stores the value of the html tag
    private $_tagValueForm; //stores All POST value of the html tag being passed from the form. In a List Array

    private $_valNameArray;
    private $_valNameCurrent;  //Stores the name of the Validate Function

    private $_valMessageArray;
    private $_valMessageCurrent; //stores the message of the current process which is returned by Validate.php class

    private $_currentPostArray; //stores data in a 2-Dimensional Array.


    function __construct(){
        unset($_SESSION['formValidationInfo']);
        unset($_SESSION['allFormValue']);
    }

    public function post($field){
        $this->_tagNameCurrent = $field;
        $this->_tagValueCurrent = $_POST[$field];
        $this->_tagValueForm[$field] = $_POST[$field];

    }

	public function val($typeOfValidator, $arg = null){
        if($arg==null){
            $this->_valMessageCurrent = $this->{$typeOfValidator}($this->_tagValueCurrent);
        }else{
           $this->_valMessageCurrent = $this->{$typeOfValidator}($this->_tagValueCurrent, $arg);
        }

        if(!empty($this->_valMessageCurrent)){
            $this->_currentPostArray[$this->_tagNameCurrent][$typeOfValidator] = $this->_valMessageCurrent;
            Session::set('formValidationInfo' , $this->_currentPostArray);
            Session::set('allFormValue' , $this->_tagValueForm);
        }
    }

    public function clearForm($data = null){

    }

    public function initFormSession(){
        unset($_SESSION['formValidationInfo']);
        unset($_SESSION['allFormValue']);
    }

    


   

 
}


?>