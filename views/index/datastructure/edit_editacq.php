<?php
$edit = 'edit_';
$edit_acqnumber = array(
    'type' => 'number', 
    'name' => $edit . 'acqnumber', 
    'id' => $edit .  'acqnumber', 
    'class' => 'form-control form-control-sm',
    'label' => 'Acquisition Number',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-md-3 mt-1 mb-1',
    'extra' => 'required min="0"',
);

$edit_systemuser = array(
    'type' => 'text', 
    'name' => $edit .  'systemuser', 
    'id' => $edit .  'systemuser', 
    'class' => 'form-control form-control-sm',
    'label' => 'System User',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-md-3 mt-1 mb-1',
    'extra' => 'required',
);

$edit_witnessby = array(
    'name' => $edit .  'witnessby', 
    'id' =>  $edit . 'witnessby', 
    'options' => $this->fetch_allpomnpstaff,
    'key' => 'personIdPk', 
    'value' => 'givenName', 
    'secondayText' => 'designation', 
    'validate' => 'true', 
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-md-3', 
    'class' => '', 
    'selectDescription' => 'Aquisition Witness by', 
);

$edit_dispositioneridfk =array(
    'name' =>  $edit . 'dispositionby', 
    'id' =>  $edit . 'dispositionby', 
    'options' => $this->get_fetchAllStatus,
    'key' => 'para', 
    'value' => 'txt', 
    'secondayText' => 'txt', 
    'validate' => 'true', 
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-md-3', 
    'class' => '', 
    'selectDescription' => 'Disposition By', 
);
$edit_acquisitionby =array(
    'name' => $edit .  'acquisitionby', 
    'id' =>  $edit . 'acquisitionby', 
    'options' => $this->fetch_acquisitionby,
    'key' => 'personIdPk', 
    'value' => 'givenName', 
    'secondayText' => 'designation', 
    'validate' => 'true', 
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-md-3', 
    'class' => '', 
    'selectDescription' => 'Acquisition By' 
);


$edit_acqach =array(
    'name' => $edit .  'acqach', 
    'id' =>  $edit . 'acqach', 
    'options' => $this->fetch_acqach,
    'key' => 'para', 
    'value' => 'txt', 
    // 'secondayText' => 'designation', 
    'validate' => 'true', 
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-md-3', 
    'class' => '', 
    'selectDescription' => 'Achieve Acquisition' 
);

// edit_acqach

$edit_acquisitionDate = array(
    'gridsize'=>'col-md-3',
    'id'=> $edit . 'acquisitionDate',
    'name'=> $edit . 'acquisitionDate',
    'placeholder'=>'Choose Date of Acquisition',
    'label'=>'Select Date of Acquisition',
    'class'=>'form-control form-control-sm',
    'extra'=>'required',
);   

$edit_acqcomment = array(
    'gridsize'=>'col-md-12',
    'id'=> $edit . 'acqcomment',
    'name'=> $edit . 'acqcomment',
    'rows'=>'5',
    'label'=>'Type Comment in here...',
);

?>
