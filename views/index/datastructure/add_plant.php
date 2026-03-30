<?php 
 $add  = 'add_plant_';
$add_plant_speciestype = array(
    'name' =>  $add  . 'planttype', 
    'id' =>  $add  . 'planttype', 
    'options' => $this->fetch_allSpeciesTypes,
    'key' => 'speciestypeIdPk', 
    'value' => 'speciestypename', 
    // 'secondayText' => 'speciestypecode', 
    'validate' => 'true',
    'modalid' => 'add_plant',
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-4 mt-2 mb-2', 
    'class' => '', 
    'selectDescription' => 'Select a Plant Type', 
);

$add_plant_plantsize = array(
    'name' => $add  .  'plantsize', 
    'id' =>  $add  . 'plantsize', 
    'options' => $this->get_plantTypeSizes,
    'key' => 'plantsizetypeidpk', 
    'value' => 'plantsizetypename', 
    // 'secondayText' => 'acquisitiontypecode', 
    'validate' => 'true',
    'modalid' => 'add_plant',
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-4 mt-2 mb-2', 
    'class' => '', 
    'selectDescription' => 'Select Plant Size', 
);
// $this->view->get_plantTypeSizes = $this->model->get_plantTypeSizes();
// $this->view->get_fetchAllStatus = $this->get_fetchAllStatus();
$add_plant_planttype = array(
    'name' => $add  .  'planttype', 
    'id' => $add  .  'planttype', 
    'options' => $this->get_plantTypes,
    'key' => 'planttypeidpk', 
    'value' => 'plantname', 
    // 'secondayText' => 'acquisitiontypecode', 
    'validate' => 'true',
    'modalid' => 'add_plant',
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-4 mt-2 mb-2', 
    'class' => '', 
    'selectDescription' => 'Select Plant Type', 
);

$add_plant_acquisitiontype = array(
    'name' =>  $add  . 'acquisitiontype', 
    'id' => $add  .  'acquisitiontype', 
    'options' => $this->fetch_allacquisitiontypes,
    'key' => 'acquisitiontypeidpk', 
    'value' => 'acquisitiontypename', 
    // 'secondayText' => 'acquisitiontypecode', 
    'validate' => 'true',
    'modalid' => 'add_plant',
    'feedbackmessage_valid' => 'Success', 
    'feedbackmessage_invalid' => 'Required. Invalid', 
    'parentclass' => 'col-4 mt-2 mb-2', 
    'class' => '', 
    'selectDescription' => 'Select a Acquisition Type', 
);

$add_plant_spccommonname = array(
    'type' => 'text', 
    'name' => $add  .  'spccommonname', 
    'id' => $add  .  'spccommonname', 
    'class' => 'form-control form-control-sm',
    'label' => 'Enter Plant Common Name',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-4 mt-2 mb-2',
    'extra' => 'required',
);

$add_plant_tally = array(
    'type' => 'number', 
    'name' => $add  .  'tally', 
    'id' => $add  .  'tally', 
    'class' => 'form-control form-control-sm',
    'label' => 'Enter Tally',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-4 mt-2 mb-2',
    'extra' => 'step="1" min="0"',
);

$add_plant_periodincaptive =array(
    'type' => 'number', 
        'name' =>  $add .  'periodincaptive', 
        'id' =>   $add . 'periodincaptive', 
        'class' => 'form-control form-control-sm',
        'label' => 'Exposure Duration (Days)',
        'parentclass' => 'form-outline',
        'gridsize' => 'col-4 mt-2 mb-2',
        'extra' => 'step="1" min="0"',
);

$add_plant_locationofspecies = array(
    'type' => 'text', 
    'name' =>   $add . 'locationofspecies', 
    'id' =>   $add . 'locationofspecies', 
    'class' => 'form-control form-control-sm',
    'label' => 'Enter Location of Plant',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-4 mt-2 mb-2',
    'extra' => 'required',
);   

$add_plant_cost = array(
    'type' => 'number', 
    'name' =>  $add .'cost', 
    'id' =>  $add. 'cost', 
    'class' => 'form-control form-control-sm',
    'label' => 'Enter Cost per Plant (Kina)',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-4 mt-2 mb-2',
    'extra' => 'step="0.01" min="0"',
);

$add_plant_speciesholdertype = array(
    'type' => 'text', 
    'name' =>  $add . 'speciesholdertype', 
    'id' =>   $add . 'speciesholdertype', 
    'class' => 'form-control form-control-sm',
    'label' => 'Type of Plant Holder',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-4 mt-2 mb-2',
    'extra' => 'required',
); 

$add_plant_speciessize = array(
    'type' => 'text', 
    'name' =>  $add .  'speciessize', 
    'id' =>  $add .  'speciessize', 
    'class' => 'form-control form-control-sm',
    'label' => 'Species Size',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-4 mt-2 mb-2',
    'extra' => 'required',
);

$add_plant_spceciescomment = array(
    'type' => 'text', 
    'name' =>  $add  .'spceciescomment', 
    'id' => $add  . 'spceciescomment', 
    'class' => 'form-control form-control-sm',
    'label' => 'Plant Comment',
    'parentclass' => 'form-outline',
    'gridsize' => 'col-4 mt-2 mb-2',
    'extra' => 'required',
);


?>
