<?php

class Postvalidator {
    private $errors = [];
    private $data = [];
    private $requiredTag = [];

    private $tagname = [];
    // private $fileExtensionTypes = ['pdf','png','jpg','ico','html', 'json', 'css', 'js'];
    private $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf']; // Acceptable MIME types
    

    public function __construct($postData) {
        $this->data = $postData;
        foreach($postData as $k=>$v){
            $this->tagname[] = $k;
        }
    }

    // Check if a specific field exists and is not empty
    public function validateRequired($field, $message = "This field is required") {
        if (empty($this->data[$field])) {
            $this->requiredTag[] = $field;
            $this->errors[$field] = $message;
        }
        return $this;
    }

    // Check if a field is a valid email address
    public function validateEmail($field, $message = "Invalid email format") {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message;
            $this->requiredTag[] = $field;
        }
        return $this;
    }

    

    function validateDateTimeFormat($dateTime, $format = 'Y-m-d H:i:s') {
        $d = DateTime::createFromFormat($format, $dateTime);
        return $d && $d->format($format) === $dateTime;
    }

    // Check if a field has a minimum length
    public function validateMinLength($field, $min, $message = "Too short") {
        if (strlen($this->data[$field]) < $min) {
            $this->requiredTag[] = $field;
            $this->errors[$field] = $message;
        }
        return $this;
    }

    // Check if a field has a maximum length
    public function validateMaxLength($field, $max, $message = "Too long") {
        if (strlen($this->data[$field]) > $max) {
            $this->requiredTag[] = $field;
            $this->errors[$field] = $message;
        }
        return $this;
    }

    // Check if a field is a valid integer
    public function validateInteger($field, $message = "Must be an integer") {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_INT)) {
            $this->requiredTag[] = $field;
            $this->errors[$field] = $message;
        }
        return $this;
    }

    // *******************
    // *** File Handling Start *****

    public function validateFile_PDF(
        $tagName, 
        $fileObject , 
        $destination = 'upload/', 
        $size = MAX_FILE_SIZE
        )
        {
        $maxFileSize = $size * 1024 * 1024; // X MB in bytes

        // Check if file was uploaded
        if (isset($fileObject[$tagName])) {
            $file = $fileObject[$tagName];
            $fileName = $file['name'];
            $fileType = $file['type'];
            $fileTmpPath = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];

            // Check for errors during file upload
            if ($fileError === UPLOAD_ERR_OK) {
                
                // Validate file type
                if (in_array($fileType, $this->allowedTypes)) {
                    // Validate file size
                    if ($fileSize <= $maxFileSize) {
                        // Move the file to the desired location
                        $destination =  FULLPATH . $destination.$fileName;

                        if (move_uploaded_file($fileTmpPath, $destination)) {
                            // The File Successfully Uploaded
                        } else {
                            $this->errors[$tagName] = "Failed to move uploaded file.";
                        }
                    } else {
                        $this->errors[$tagName] = "File exceeds the maximum allowed size of {$fileSize}.";
                    }
                } else {
                    $this->errors[$tagName] = "Invalid file type. Only JPEG, PNG, and PDF files are allowed.";
                }
            }else if($fileError === UPLOAD_ERR_NO_FILE){
                $this->errors[$tagName] = "No file was uploaded: {$fileError}";
            }else if($fileError === UPLOAD_ERR_INI_SIZE){
                $this->errors[$tagName] = "Exceeded Maximum Upload. Error code: {$fileError}";
            }else if($fileError === UPLOAD_ERR_FORM_SIZE){
                $this->errors[$tagName] = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.. Error code: {$fileError}";
            }else if($fileError === UPLOAD_ERR_PARTIAL){
                $this->errors[$tagName] = "The file was only partially uploaded: {$fileError}";
            }
        } else {
            $this->errors[$tagName] = "No file uploaded.";
        }
        return $this;
    }


    // *** File Handling End   *****

    // Check if there are any validation errors
    public function hasErrors() {
        return !empty($this->errors);
    }

    // Get all validation errors
    public function getErrors() {
        return $this->errors;
    }

    // Get sanitized data (in case you want to use it later)
    public function getData() {
        return ksort($this->data);
    }

    public function getTagNames(){
        return ($this->tagname);
    }

    public function getRequiredTag(){
        
        return $this->requiredTag;
    }


}
