<?php 
$acqnumber = array(
    'type' => 'number', 
    'name' => 'acqnumber', 
    'id' => 'acqnumber', 
    'class' => 'form-control form-control-sm',
    'label' => 'Acquisition Number',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-md-12 mt-1 mb-1',
    'extra' => 'required min="0"',
);

$systemuser = array(
    'type' => 'text', 
    'name' => 'systemuser', 
    'id' => 'systemuser', 
    'class' => 'form-control form-control-sm',
    'label' => 'System User',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-md-3 mt-1 mb-1',
    'extra' => 'required',
);

$witnessby = array(
    'name' => 'witnessby', 
    'id' => 'witnessby', 
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



$dispositioneridfk =array(
    'name' => 'dispositionby', 
    'id' => 'dispositionby', 
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
$acquisitionby =array(
    'name' => 'acquisitionby', 
    'id' => 'acquisitionby', 
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


$acquisitionDate = array(
    'gridsize'=>'col-md-3',
    'id'=>'acquisitionDate',
    'name'=>'acquisitionDate',
    'placeholder'=>'Choose Date of Acquisition',
    'label'=>'Select Date of Acquisition',
    'class'=>'form-control form-control-sm',
    'extra'=>'required',
);   

$acqcomment = array(
    'gridsize'=>'col-md-12',
    'id'=>'acqcomment',
    'name'=>'acqcomment',
    'rows'=>'5',
    'label'=>'Type Comment in here...',
    // 'extra'=>'required',
);

?>
