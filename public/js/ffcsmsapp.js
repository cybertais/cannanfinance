let x = null;
function fetchingSelect(thisobj) {
    const apiBase = window.location.origin;
    
      $.ajax({
          type: thisobj['type'], 
          url: `${apiBase}/${control}/${thisobj['url']}/`,
          data:{'data':thisobj['data']},
          dataType: 'json',
          beforeSend: function(){},
          success: function(result){
            if(document.getElementById(`${thisobj['targetselect']}`)){
                document.getElementById(`${thisobj['targetselect']}`).innerHTML = generateOptionsString(result,`${thisobj['dbcolname_para']}`,`${thisobj['dbcolname_txt']}`);
                setSelectedOption(thisobj['setselectvalue'],`${thisobj['targetselect']}`);
                reinitializeMDBSelect(`${thisobj['targetselect']}`); 
            }else{
                return false;
            }
          },
          error: function(result){
              console.log(result);
          }
      }); //end ajax
}

function generateOptionsString(dataObject, valueKey, textKey, discription = "Select an Option") {
    let options = `<option value=""  selected>${discription}</option>`;
    dataObject.forEach(item => {
        options += `<option data-mdb-json="${JSON.stringify(item)}" value="${item[valueKey]}">${item[textKey]}</option>`;
    });
    return options;
}

function reinitializeMDBSelect(selectId) {
    const selectElement = document.getElementById(selectId);
    const mdbSelect = new mdb.Select(selectElement);
    if (selectElement) {
        if (mdbSelect) {
            mdbSelect._destroyMaterialSelect();
        }
        new mdb.Select(selectElement, {
            clearButton: true,
            filter: true
        });
        document.querySelector(`#select-wrapper-${selectId} > div > input`).classList.add('form-control-sm');
    }
}

/*
* optionValue -> String: Value of the Editable item
* selectid -> String: ID of the Select Tag
* Description:
*/
function setSelectedOption(optionValue, selectid){
    const selectElement = document.getElementById(selectid);
    for (const option of selectElement.options) {
        if (option.value === optionValue) {
            option.selected = true;
        } else {
            option.selected = false;
        }
    }
    selectElement.dispatchEvent(new Event("change"));
}
    
/*
* @param el - Type String
* @param attr - Type String
*/ 
function checkInput(el, attr) {
    let value = false;
    if ( document.getElementById(el) && document.getElementById(el).hasAttribute(attr)) {
        value = true;
    }
    return value;
}

function checkSelect(el, attr){
    let value = false;
    if ( document.getElementById(el)) {
        value = true;
    }
    return value;
}

/*
* @param id - Type String
* @param msg - Type keysString
* @param hasError - Type Boolean
*/ 
function appendFeedbackInputfield(id, msg='', hasError) {
    let parent = document.getElementById(`parent_${id}`);
    let inp = document.getElementById(`${id}`);
    let feedbackDiv = document.createElement('div');
    
    if(document.querySelector(`#parent_${id} .valid-feedback`) && inp.classList.contains('is-valid') ){
        inp.classList.remove(`is-valid`);
        document.querySelector(`#parent_${id} .valid-feedback`).remove();
    }else{
        if(document.querySelector(`#parent_${id} .invalid-feedback`) && inp.classList.contains('is-invalid') ){
            inp.classList.remove(`is-invalid`);
            document.querySelector(`#parent_${id} .invalid-feedback`).remove();
        }
    }

    if(hasError){
        feedbackDiv.className = 'invalid-feedback';
        feedbackDiv.textContent = `${msg}`;
        parent.appendChild(feedbackDiv);
        inp.classList.add('is-invalid');
    }else{
        feedbackDiv.className = 'valid-feedback';
        feedbackDiv.textContent = `${msg}`;
        parent.appendChild(feedbackDiv);
        inp.classList.add('is-valid');
    }
}

/*
* @param id - Type String
* @param message - Type keysString
* @param hasError - Type Boolean
* @param tagName - Type String
*/ 
function appendFeedbackType(element, message, hasError, tagName){
    switch (tagName) {
        case "SELECT":
            if(document.querySelector(`#select-wrapper-${element}  input.is-invalid`)){
                document.querySelector(`#select-wrapper-${element}  input`).classList.remove('is-invalid');
            }else if(document.querySelector(`#select-wrapper-${element}  input.is-valid`)){
                document.querySelector(`#select-wrapper-${element}  input`).classList.remove('is-valid');
            }
            if(hasError !== true){
                document.querySelector(`#select-wrapper-${element}  input`).classList.add('is-valid')
            }
            else if(hasError){
                document.querySelector(`#select-wrapper-${element}  input`).classList.add('is-invalid')
            }
            break;
    }
}

/*
* @param element - Type String
* @param result - Type Object
*/ 
function appendFeedbackSelect(element, result){
    if(document.querySelector(`#select-wrapper-${element}  input.is-invalid`)){
        document.querySelector(`#select-wrapper-${element}  input`).classList.remove('is-invalid');
    }else if(document.querySelector(`#select-wrapper-${element}  input.is-valid`)){
        document.querySelector(`#select-wrapper-${element}  input`).classList.remove('is-valid');
    }
    if(result.requiredTag.includes(element)){
            
            document.querySelector(`#select-wrapper-${element}  input`).classList.add('is-invalid');
    }else{
        document.querySelector(`#select-wrapper-${element}  input`).classList.add('is-valid');
    }
}

function appendFeedbackSelect_old_notinuse(element, result){
    if(document.querySelector(`#select-wrapper-${element}  input.is-invalid`)){
        document.querySelector(`#select-wrapper-${element}  input`).classList.remove('is-invalid');
    }else if(document.querySelector(`#select-wrapper-${element}  input.is-valid`)){
        document.querySelector(`#select-wrapper-${element}  input`).classList.remove('is-valid');
    }

    if(result.hasError !== true){
        document.querySelector(`#select-wrapper-${element}  input`).classList.add('is-valid')
    }
    else if(result.hasError){
        document.querySelector(`#select-wrapper-${element}  input`).classList.add('is-invalid')
    }  
}

function enabler(element){
    element.disabled = false; // Disables the input
    element.focus();
}

function disabler(element){
    element.disabled = false; // Disables the input
    element.focus();
}

/*
* @param result - JSON Object
*/
function eventListenterFeedback(result){
    let keysString = Object.keys(result).join(", ");
    let key = Object.keys(result.data).join(", ");
    let requiredTag_valuesString = Object.values(result.requiredTag).join(",");
    let tagNames_valuesString = Object.values(result.tagNames).join(",");
    let validateTags_valuesString = Object.values(result.validateTags).join(",");

    let requiredTag_Array = requiredTag_valuesString.split(",");
    let key_Array = requiredTag_valuesString.split(",");
    let tagNames_Array = tagNames_valuesString.split(",");
    let validateTags_Array = validateTags_valuesString.split(",");

    tagNames_Array.forEach(element => {
        
        if(document.getElementById(element)){
            tagType = document.getElementById(element).tagName;
            if(document.getElementById(element).getAttribute('type') === 'file'){
                tagType = 'INPUTFILEUPLOAD';
            }
            
            // Takes the Variable element and checks against the list
            // if the Field is found. That means it must be validated.
            if (validateTags_Array.includes(element) ) {
                switch(tagType){
                    case "INPUT":
                        appendFeedbackInputfield(
                            element, 
                            (typeof result.data[element] !== 'undefined')? result.data[element] : 'Success', 
                            (typeof result.data[element] !== 'undefined')? true : false)
                        ;
                        break;
                    case "SELECT":
                        appendFeedbackSelect(element, result);  
                        break;
                    case "INPUTFILEUPLOAD":
                        // appendFeedbackSelect(element, result);  
                        displayMessage(
                            element,
                            (typeof result.data[element] !== 'undefined')? result.data[element] : 'Success', 
                            (typeof result.data[element] !== 'undefined')? true : false
                        );
                        break;
                }
            }

        }
    });
}

/*
    Function displayMessage() Targets the File Upload Plugin. When the user perform the Change Event, it displays a
    Success or Fail message as per the validation performed in the system
*/
function displayMessage(elId, message, hasError) {
    let messageElement = document.getElementById(`fileMessage_${elId}`);
    if (!messageElement) {
        messageElement = document.createElement('div');
        messageElement.id = `fileMessage_${elId}`;
        messageElement.style.marginTop = '10px';
        messageElement.style.fontSize = '12px';
        document.getElementById(`parent_${elId}`).appendChild(messageElement);
    }
    messageElement.textContent = message;
    messageElement.style.color = hasError === true ? 'red' : 'green';
}

/* 
    Validate only PDF File
    Accepts
    File as JSON File
    maxSize as Integer
    elObj as DOM Element

    Returns: Boolean Value
    Unsuccessful is False and Successful is True
*/
function validateFile(file,  maxSize = 1, elObj) {
    maxSize = maxSize * 1024 * 1024; // 2MB in bytes
    const allowedMimeType = 'application/pdf';

    // File Size Validation
    if (file.size > maxSize) {
    file.value = ''; // Clear the input if validation fails
    displayMessage(elObj.getAttribute('name'), `Error: File size exceeds the limit of ${maxSize/(1024 * 1024)} MB.`, true );
    // initializeFileUpload();
    return false;
    }

    // MIME Type Validation
    if (file.type !== allowedMimeType) {
    file.value = ''; // Clear the input if validation fails
    displayMessage(elObj.getAttribute('name'), 'Error: Invalid file type. Only PDF files are allowed.',  true  );
    // Call this function whenever you want to reinitialize
    // initializeFileUpload();
    return false;
    }

    // File Name Validation
    const invalidFileNameChars = /[^a-zA-Z0-9\-_.\s]/;
    if (invalidFileNameChars.test(file.name)) {
    file.value = ''; // Clear the input if validation fails
    displayMessage(elObj.getAttribute('name'),'Error: Invalid file name. Only alphanumeric characters, hyphens, underscores, and spaces are allowed.',  true );
    // initializeFileUpload();
    return false;
    }

    // If all validations pass
    displayMessage(elObj.getAttribute('name'), 'Success: File is valid and ready for upload.',  false);
    return true;
}

$(document).ready(function(e){
    $( "input[type='text'], input[type='number'], input[type='tel'], input[type='email'] , input[type='password']" ).keyup(function(e) 
    {
        e.preventDefault();
        
        let jsonData = {};
        let dynamickey = $(this).attr('name');
        jsonData[dynamickey] = $(this).val();
        jsonData['nametag'] =dynamickey;
        const input = document.getElementById(dynamickey);
        $.ajax({
            type: 'GET', url: `${url}/${control}/vali/`, 
            data:jsonData,
            dataType: 'json',
            beforeSend: function(){
                disabler(input);
            },
            success: function(result){
                // enabler(input);
            eventListenterFeedback(result);
            },error: function(result){
                var msg='Error connecting to the server';
                console.log(msg);
            }
        });
    });

    $("select").change(function(e){
        let jsonData = {};
        let dynamickey = $(this).attr('name');
        jsonData[dynamickey] = $(this).val();
        jsonData['nametag'] =dynamickey;
        $.ajax({ type: 'GET', url: `${url}/${control}/vali/`, 
            data:jsonData,
            dataType: 'json', success: function(result){
                eventListenterFeedback(result);
            },error: function(result){
                var msg='Error connecting to the server';
                console.log(msg);
            }
        });
    });
});

$(document).ready(function(){
    if (document.querySelector('#select-wrapper-name .input-group')) {
        document.querySelector('.input-group').classList.add('input-group-sm');
    }
});