<?php
class View
{
    function __construct()
    {
        
    }

    public function render($name, $noInclude = false)
    {
        if ($noInclude == true) {
            require "views/" . $name . ".php";
        } else {
            if($name == 'login/index'){
                require "views/header.php";
                // require "views/subject.php";
                require "views/" . $name . ".php";
                require "views/footer.php";
            }else{
                require "views/header.php";
                require "views/menu.php";
                require "views/navbar.php";
                require "views/subject.php";
                require "views/" . $name . ".php";
                require "views/footer.php";
            }
            
        }
    }

    
    public function comp_form_input_text($input){
            $html = '';
            
                $type = $input['type'] ?? 'text'; // Default type is 'text'
                $name = $input['name'] ?? '';
                $value = $input['value'] ?? '';
                $label = $input['label'] ?? '';
                $id = $input['id'] ?? $name;
                $gridsize = $input['gridsize'] ?? '';
                $class = $input['class'] ?? ''; // Initial class
                $parentclass = $input['parentclass'] ?? ''; // Initial class
                $placeholder = $input['placeholder'] ?? '';
                $extra = $input['extra'] ?? ''; // Additional attributes
    
                $jscript = "";
        
                $html = 
                "<div class=\"$gridsize\"><div id=\"parent_$id\" class=\"$parentclass\" data-mdb-input-init>
                    <input type=\"$type\" name=\"$name\" value=\"$value\" id=\"$id\" class=\"$class\" $extra />
                    <label class=\"form-label\" for=\"$id\">$label</label>
                </div></div>\n"
                ;
    
                // Add 'is-valid' to class if 'required' is in the extra attribute
                if (strpos($extra, 'required') !== false) {
                    // $html .= $jscript;
                }
            return $html;
    }

    public function comp_form_input_number($input){
        $html = '';
        $type = $input['type'] ?? 'number'; // Default type is 'text'
        $name = $input['name'] ?? '';
        $value = $input['value'] ?? '';
        $label = $input['label'] ?? '';
        $id = $input['id'] ?? $name;
        $gridsize = $input['gridsize'] ?? '';
        $class = $input['class'] ?? ''; // Initial class
        $parentclass = $input['parentclass'] ?? ''; // Initial class
        $placeholder = $input['placeholder'] ?? '';
        $extra = $input['extra'] ?? ''; // Additional attributes

        $jscript = "";

        $html = 
        "<div class=\"$gridsize\"><div id=\"parent_$id\" class=\"$parentclass\" data-mdb-input-init>
            <input type=\"$type\" name=\"$name\" value=\"$value\" id=\"$id\" class=\"$class\" $extra />
            <label class=\"form-label\" for=\"$id\">$label</label>
        </div></div>\n"
        ;

        // Add 'is-valid' to class if 'required' is in the extra attribute
        if (strpos($extra, 'required') !== false) {
            // $html .= $jscript;
        }
    return $html;
    }
    
    public function comp_form_input_tel($input){
        $html = '';
        $type = $input['type'] ?? 'tel'; // Default type is 'text'
        $name = $input['name'] ?? '';
        $value = $input['value'] ?? '';
        $label = $input['label'] ?? '';
        $id = $input['id'] ?? $name;
        $gridsize = $input['gridsize'] ?? '';
        $class = $input['class'] ?? ''; // Initial class
        $parentclass = $input['parentclass'] ?? ''; // Initial class
        $placeholder = $input['placeholder'] ?? '';
        $extra = $input['extra'] ?? ''; // Additional attributes

        $jscript = "";

        $html = 
        "<div class=\"$gridsize\"><div id=\"parent_$id\" class=\"$parentclass\" data-mdb-input-init>
            <input type=\"$type\" name=\"$name\" value=\"$value\" id=\"$id\" class=\"$class\" $extra />
            <label class=\"form-label\" for=\"$id\">$label</label>
        </div></div>\n"
        ;

        // Add 'is-valid' to class if 'required' is in the extra attribute
        if (strpos($extra, 'required') !== false) {
            // $html .= $jscript;
        }
    return $html;
    }
    
    public function comp_form_input_email($input){
        $html = '';
        $type = $input['type'] ?? 'email'; // Default type is 'text'
        $name = $input['name'] ?? '';
        $value = $input['value'] ?? '';
        $label = $input['label'] ?? '';
        $id = $input['id'] ?? $name;
        $gridsize = $input['gridsize'] ?? '';
        $class = $input['class'] ?? ''; // Initial class
        $parentclass = $input['parentclass'] ?? ''; // Initial class
        $placeholder = $input['placeholder'] ?? '';
        $extra = $input['extra'] ?? ''; // Additional attributes

        $jscript = "";

        $html = 
        "<div class=\"$gridsize\"><div id=\"parent_$id\" class=\"$parentclass\" data-mdb-input-init>
            <input type=\"$type\" name=\"$name\" value=\"$value\" id=\"$id\" class=\"$class\" $extra />
            <label class=\"form-label\" for=\"$id\">$label</label>
        </div></div>\n"
        ;

        // Add 'is-valid' to class if 'required' is in the extra attribute
        if (strpos($extra, 'required') !== false) {
            // $html .= $jscript;
        }
    return $html;
    }
    
    public function comp_form_input_password($input){
        $html = '';
        $type = $input['type'] ?? 'password'; // Default type is 'text'
        $name = $input['name'] ?? '';
        $value = $input['value'] ?? '';
        $label = $input['label'] ?? '';
        $id = $input['id'] ?? $name;
        $gridsize = $input['gridsize'] ?? '';
        $class = $input['class'] ?? ''; // Initial class
        $parentclass = $input['parentclass'] ?? ''; // Initial class
        $placeholder = $input['placeholder'] ?? '';
        $extra = $input['extra'] ?? ''; // Additional attributes

        $jscript = "";

        $html = 
        "<div class=\"$gridsize\"><div id=\"parent_$id\" class=\"$parentclass\" data-mdb-input-init>
            <input type=\"$type\" name=\"$name\" value=\"$value\" id=\"$id\" class=\"$class\" $extra />
            <label class=\"form-label\" for=\"$id\">$label</label>
        </div></div>\n"
        ;

        // Add 'is-valid' to class if 'required' is in the extra attribute
        if (strpos($extra, 'required') !== false) {
            // $html .= $jscript;
        }
    return $html;
    }
    
    public function comp_form_input_url($input){
        $html = '';
        $type = $input['type'] ?? 'url'; // Default type is 'text'
        $name = $input['name'] ?? '';
        $value = $input['value'] ?? '';
        $label = $input['label'] ?? '';
        $id = $input['id'] ?? $name;
        $gridsize = $input['gridsize'] ?? '';
        $class = $input['class'] ?? ''; // Initial class
        $parentclass = $input['parentclass'] ?? ''; // Initial class
        $placeholder = $input['placeholder'] ?? '';
        $extra = $input['extra'] ?? ''; // Additional attributes

        $jscript = "";

        $html = 
        "<div class=\"$gridsize\"><div id=\"parent_$id\" class=\"$parentclass\" data-mdb-input-init>
            <input type=\"$type\" name=\"$name\" value=\"$value\" id=\"$id\" class=\"$class\" $extra />
            <label class=\"form-label\" for=\"$id\">$label</label>
        </div></div>\n"
        ;

        // Add 'is-valid' to class if 'required' is in the extra attribute
        if (strpos($extra, 'required') !== false) {
            // $html .= $jscript;
        }
    return $html;
    }
    
    public function comp_form_input_textarea(){}

    /*
    * Dev Date: 17 Jan 2025
    * Version 1
    */
    public function comp_form_select_nonmodal($input){
        $name = $input['name'] ?? '';
        $id = $input['id'] ?? '';
        $options = $input['options'] ?? '';
        $key = $input['key'] ?? '';
        $value = $input['value'] ?? '';
        $secondayText = $input['secondayText'] ?? '';
        $validate = $input['validate'] ?? false;
        $feedbackmessage_valid = $input['feedbackmessage_valid'] ?? 'Success';
        $feedbackmessage_invalid = $input['feedbackmessage_invalid'] ?? 'Required. Invalid Value';
        $parentclass = $input['parentclass'] ?? 'col-md-3';
        $class = $input['class'] ?? 'form-control is-invalid';
        $defaultoption  = $input['defaultoption'] ?? '<option value="" selected>Select an Option</option>';
        $selectDescription = $input['selectDescription'] ?? '';

        $optionHtml = "";

        foreach ($options as $k => $v) {
            $s = ($secondayText !='')? ' data-mdb-secondary-text= "' . $v[$secondayText]. '"'  : '';
            $optionHtml .=
                '<option '.$s.' value="' .
                $v[$key]  .
                '">' .
                $v[$value]  .
                "</option>";
        }

        
        return "
        <div id=\"parent_$id\" class=\"$parentclass\">
            <select
                data-mdb-select-init
                id=\"$name\"
                class=\"$class\"
                name=\"$id\"
                data-mdb-validation=\"$validate\"
                data-mdb-valid-feedback=\"$feedbackmessage_valid\"
                data-mdb-invalid-feedback=\"$feedbackmessage_invalid\"
                data-mdb-clear-button=\"true\"
                data-mdb-filter=\"true\"
            >
                $defaultoption
                $optionHtml
            </select>
            <label for=\"$id\" class=\"form-label select-label\">$selectDescription</label>
        </div>
       ";
    }

    public function comp_form_select_modal($input){
        $name = $input['name'] ?? '';
        $id = $input['id'] ?? '';
        $options = $input['options'] ?? '';
        $key = $input['key'] ?? '';
        $value = $input['value'] ?? '';
        $secondayText = $input['secondayText'] ?? '';
        $validate = $input['validate'] ?? false;
        $modalid = $input['modalid'] ?? '';
        $feedbackmessage_valid = $input['feedbackmessage_valid'] ?? 'Success';
        $feedbackmessage_invalid = $input['feedbackmessage_invalid'] ?? 'Required. Invalid Value';
        $parentclass = $input['parentclass'] ?? 'col-md-3';
        $class = $input['class'] ?? 'form-control is-invalid';
        $defaultoption  = $input['defaultoption'] ?? '<option value="" selected>Select an Option</option>';
        $selectDescription = $input['selectDescription'] ?? '';

        $optionHtml = "";

        foreach ($options as $k => $v) {
            $s = ($secondayText !='')? ' data-mdb-secondary-text= "' . $v[$secondayText]. '"'  : '';
            $optionHtml .=
                '<option '.$s.' value="' .
                $v[$key]  .
                '">' .
                $v[$value]  .
                "</option>";
        }

        
        return "
        <div id=\"parent_\" class=\"$parentclass\">
            <select
                data-mdb-select-init
                id=\"$name\"
                class=\"$class\"
                name=\"$id\"
                data-mdb-validation=\"$validate\"
                data-mdb-valid-feedback=\"$feedbackmessage_valid\"
                data-mdb-invalid-feedback=\"$feedbackmessage_invalid\"
                data-mdb-clear-button=\"true\"
                data-mdb-filter=\"true\"
                 data-mdb-container=\"#$modalid\" 
                
            >
                $defaultoption
                $optionHtml
            </select>
            <label for=\"$id\" class=\"form-label select-label\">$selectDescription</label>
        </div>
       ";
    }

    
    public function comp_form_DatePicker(
        $nameid = "name",
        $label = "My Label",
        $parentColSize = "col-md-4",
        $margin = "mt-1 mb-1",
        $formControlSize = false,
        $validation = false
    ) {
        $formControlValue = $formControlSize ? "" : "form-control-sm";
        $validationValue = $validation ? "required" : "";

        echo '
            <div class=" ' .
            $margin .
            " " .
            $parentColSize .
            '">
                <div id="parent_' .
            $nameid .
            '" class="form-outline" data-mdb-datepicker-init data-mdb-input-init data-mdb-format="dddd, mmm, yyyy">
                    <input type="text" class="form-control ' .
            $formControlValue .
            '" id="' .
            $nameid .
            '" data-mdb-toggle="datepicker" name="' .
            $nameid .
            '" placeholder="dd, mmm, yyyy" />
                    <label for="' .
            $nameid .
            '" class="form-label">'.$label.'</label>
                </div>
            </div>';
    }


    public function comp_form_autocomplete(
        $nameid = "name",
        $label = "Select an Option",
        $parentColSize = "col-md-4",
        $margin = "mt-1 mb-1",
        $attrributeObj = [],
        $formControlSize = false,
        $validation = false
    ) {
        $validationValue = $validation ? "required" : "";
        $formControlValue = $formControlSize ? "" : "form-control-sm";
        echo '
                <div id="parent_' .
            $nameid .
            '" class=" ' .
            $parentColSize .
            " " .
            $margin .
            ' ">
                    <div id="validation" class="form-outline" data-mdb-input-init>
                        <input ' .
            $validationValue .
            '  type="' .
            $attrributeObj["type"] .
            '"  id="' .
            $nameid .
            '"  name="' .
            $nameid .
            '" class="form-control ' .
            $formControlValue .
            ' " />
                        <label class="form-label" for="' .
            $nameid .
            '">' .
            $label .
            '</label>
                    </div>
                </div>
            ';
    }

    public function comp_form_file(
        $nameid = "name",
        $label = "Select an Option",
        $parentColSize = "col-md-4",
        $margin = "mt-1 mb-1",
        $accept = "",
        $fileSizeDefault = MAX_FILE_SIZE,
        $formControlSize = false,
        $validation = false
    ) {
        $acceptedValue = $accept != "" ? 'accept = "' . $accept . '" ' : "";
        $validationValue = $validation ? "required" : "";
        $formControlValue = $formControlSize ? "" : "form-control-sm";

        echo '
                <div class=" ' .
            $parentColSize .
            " " .
            $margin .
            ' ">
                    <div id="parent_' .
            $nameid .
            '"  data-mdb-input-init>
                        <label class="form-label" for="' .
            $nameid .
            '">' .
            $label .
            '</label>
                        <input ' .
            $validationValue .
            " " .
            $acceptedValue .
            ' type="file" class="form-control ' .
            $formControlValue .
            '" name="' .
            $nameid .
            '"  id="' .
            $nameid .
            '"  />
                    </div>
                </div>
            ' .
            "
            <script> $(document).ready(function(){ $(document).on('change','#" .
            $nameid .
            "',function() {if(this.files[0].size > " .
            1024 * 1024 * $fileSizeDefault .
            " ){ $('#" .
            $nameid .
            "').addClass('is-invalid'); let x = document.getElementById('parent_" .
            $nameid .
            "'); if($('#feedback_" .
            $nameid .
            "').hasClass('invalid-feedback')){ $('#feedback_" .
            $nameid .
            "').remove(); } x.append(createElement('div', [ {'attribute':'id', 'value' : 'feedback_" .
            $nameid .
            "'}, {'attribute':'name', 'value' : 'feedback_" .
            $nameid .
            "'}, {'attribute':'text','value':'File exceeds the maximum allowed size of ".$fileSizeDefault." MB'} ] , ['invalid-feedback'] )); document.getElementById('" .
            $nameid .
            "').value = null; }else{ if($('#" .
            $nameid .
            "').hasClass('is-invalid')){ $('#" .
            $nameid .
            "').removeClass('is-invalid'); } if($('#" .
            $nameid .
            "').hasClass('is-valid')){ $('#" .
            $nameid .
            "').removeClass('is-valid'); }else{ $('#" .
            $nameid .
            "').addClass('is-valid'); } $('#feedback_" .
            $nameid .
            "').remove(); $('#" .
            $nameid .
            "').addClass('is-valid'); } }); }); </script> ";
    }

    // *** 'myfile', 'Select a File', 'col-md-3', 'mt-1 mb-1', 'application/pdf', true, false
    public function comp_form_checkbox(
        $nameid = "name",
        $label = "Check the Box",
        $value = "",
        $parentColSize = "col-md-4",
        $margin = "mt-1 mb-1",
        $check,
        $formControlSize = false,
        $validation = false
    ) {
        $validationValue = $validation ? "required" : "";
        $checked = $check ? "checked" : "";

        echo "<div class='{$parentColSize} {$margin}'>
            <div id='parent_{$nameid}' class='form-check'>
            <input {$validationValue} class='form-check-input' type='checkbox' value='{$value}' id='{$nameid}'  name='{$nameid}' {$checked}/>
            <label class='form-check-label' for='{$nameid}'>{$label}</label>
            </div></div> ";
    }

    public function  comp_form_checkbox_dynamic(
        $objAr = array(),
        $parentColSize = 'col-md-4',
        $margin = 'mt-1 mb-1',
        $nameid = ''
    ){
        
        $string = '';
        $string .= "<div class='{$parentColSize} {$margin}'>";
        foreach($objAr as $k=>$v){
            $checkedValue = ($v['checked'])? 'checked' : null;
            $validateValue = ($v['validate'])? 'required' : null;
            $jsScript = ($v['validate'])? " <script> document.getElementById('{$v['nameid']}').addEventListener('change', function() { if (document.getElementById('{$v['nameid']}').checked) { if ($('#{$v['nameid']}').hasClass('is-invalid')) { $('#{$v['nameid']}').removeClass('is-invalid'); } if ($('#{$v['nameid']}').hasClass('is-valid')) { $('#{$v['nameid']}').removeClass('is-valid'); } else { $('#{$v['nameid']}').addClass('is-valid'); } $('#feedback_{$v['nameid']}').remove(); $('#{$v['nameid']}').addClass('is-valid'); } else { $('#{$v['nameid']}').addClass('is-invalid'); let x = document.getElementById('parent_{$v['nameid']}'); if ($('#feedback_{$v['nameid']}').hasClass('invalid-feedback')) { $('#feedback_{$v['nameid']}').remove(); } x.append(createElement('div', [{ 'attribute': 'id', 'value': 'feedback_{$v['nameid']}' }, { 'attribute': 'name', 'value': 'feedback_{$v['nameid']}' }, { 'attribute': 'text', 'value': 'Required. Check this Box' }], ['invalid-feedback'])); document.getElementById('{$v['nameid']}').value = null; } });</script>" : NULL ;
            $string .= "
                    <div id='parent_{$v['nameid']}' class='{$margin} form-check'>
                        <input class='form-check-input' type='checkbox' value='{$v['value']}'  name='{$v['nameid']}'  id='{$v['nameid']}' {$validateValue} {$checkedValue}/>
                        <label class='form-check-label' for='{$v['nameid']}'>{$v['label']}</label>
                    </div> {$jsScript}
        ";
        }

        $string .= "</div>";

        echo $string;
        
    }

    public function comp_form_radio_dynamic($input){
        $type = $input['type'] ?? 'radio'; // Default type is 'text'
        $name = $input['name'] ?? '';
        $validate = $input['validate'] ?? false;
        $name = $input['name'] ?? '';
        $id = $input['id'] ?? $name;
        $parentclass = $input['parentclass'] ?? ''; // Initial class
        $extra = $input['extra'] ?? ''; // Additional attributes
        $radioHTMLItem = '';
        // $jsScript = ($validate)? "<script> .addEventListener('change', function() { if (document.getElementById('{$nameid}').checked) { if ($('#{$nameid}').hasClass('is-invalid')) { $('#{$nameid}').removeClass('is-invalid'); } if ($('#{$nameid}').hasClass('is-valid')) { $('#{$nameid}').removeClass('is-valid'); } else { $('#{$nameid}').addClass('is-valid'); } $('#feedback_{$nameid}').remove(); $('#{$nameid}').addClass('is-valid'); } else { $('#{$nameid}').addClass('is-invalid'); let x = document.getElementById('parent_{$nameid}'); if ($('#feedback_{$nameid}').hasClass('invalid-feedback')) { $('#feedback_{$nameid}').remove(); } x.append(createElement('div', [{ 'attribute': 'id', 'value': 'feedback_{$nameid}' }, { 'attribute': 'name', 'value': 'feedback_{$nameid}' }, { 'attribute': 'text', 'value': 'Required. Check this Box' }], ['invalid-feedback'])); document.getElementById('{$nameid}').value = null; } });</script>" : NULL ;
        $count = 1;
        foreach($input['radioobj'] as $k => $v){
        $radioHTMLItem .= "<div class=\"form-check form-check-inline\"> <input class=\"form-check-input\" type=\"$type\" name=\"$name\" id=\"{$id}{$count}\" value=".$k['para']." /> <label class=\"form-check-label\" for=\"$id$count\">".$v['txt']."</label> </div>";
        $count++;
    }
        
        $html = "<div id=\"parent_$id\" class=\"$parentclass\">$radioHTMLItem</div>";
        return $html;
    }

    // public function  comp_form_radio_dynamic_old(
    //     $objAr = array(),
    //     $parentColSize = 'col-md-4',
    //     $margin = 'mt-1 mb-1',
    //     $validate = false,
    //     $nameid = ''
    // ){
    //     $string = '';
    //     $validationValue =  ($validate)? "required" : null;
        
    //     $jsScript = ($validate)? " <script> .addEventListener('change', function() { if (document.getElementById('{$nameid}').checked) { if ($('#{$nameid}').hasClass('is-invalid')) { $('#{$nameid}').removeClass('is-invalid'); } if ($('#{$nameid}').hasClass('is-valid')) { $('#{$nameid}').removeClass('is-valid'); } else { $('#{$nameid}').addClass('is-valid'); } $('#feedback_{$nameid}').remove(); $('#{$nameid}').addClass('is-valid'); } else { $('#{$nameid}').addClass('is-invalid'); let x = document.getElementById('parent_{$nameid}'); if ($('#feedback_{$nameid}').hasClass('invalid-feedback')) { $('#feedback_{$nameid}').remove(); } x.append(createElement('div', [{ 'attribute': 'id', 'value': 'feedback_{$nameid}' }, { 'attribute': 'name', 'value': 'feedback_{$nameid}' }, { 'attribute': 'text', 'value': 'Required. Check this Box' }], ['invalid-feedback'])); document.getElementById('{$nameid}').value = null; } });</script>" : NULL ;
    //     $string .= "<div id='parent_{$nameid}' class='{$margin} {$parentColSize}'>";
    //     foreach($objAr as $k=>$v){
    //         $checked = $v['checked'] ? "checked" : null;
    //         $string .= "
    //                 <div class='form-check'>
    //                     <input {$validationValue} {$checked} class='form-check-input' type='radio' name='{$nameid}' id='{$nameid}{$v['id']}'/>
    //                     <label class='form-check-label' for='{$nameid}{$v['id']}'>{$v['label']}</label>
    //                 </div>
    //             ";
    //     }
    //     $string .="</div>";
    //     echo $string;
    // }
} ?>




