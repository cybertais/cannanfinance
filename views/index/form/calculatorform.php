<?php 

  
$principal_sel = array(
    'name' =>   'principal', 
    'id' =>   'principal', 
    'options' => $this->loanamount,
    'key' => 'loan_amount_id', 
    'value' => 'loan_amount', 
    // 'secondayText' => 'designation', 
    'validate' => 'true', 
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-md-12 mt-3', 
    'class' => '', 
    'selectDescription' => 'Pricipal (K)', 
);

$nofortnight_sel = array(
    'name' =>   'nofortnight', 
    'id' =>   'nofortnight', 
    'options' =>array(),
    'key' => 'repayamount', 
    'value' => 'fn', 
    // 'secondayText' => 'designation', 
    'validate' => 'true', 
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-md-12 mt-3', 
    'class' => '', 
    'selectDescription' => 'No of Fortnight', 
);



?>