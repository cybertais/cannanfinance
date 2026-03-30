<?php

/**
 * Class Validator
 * * A fluent, chainable validation library for handling GET/POST requests.
 * It sanitizes inputs, checks rules, and returns standardized JSON responses
 * for easy frontend integration.
 */
class Validator
{

// Add this to Validator.php
public function getErrors() { return $this->_errors; }


    /** @var array Holds the raw/sanitized input data from the request */
    private $_data = [];

    /** @var array Stores validation error messages [field_name => message] */
    private $_errors = [];

    /** @var string|null The specific field currently being validated */
    private $_currentItem = null;

    /** @var string|null Human-readable label for error messages (e.g., "First Name") */
    private $_currentLabel = null;

    /** @var string The request method being processed ('POST' or 'GET') */
    private $_method = 'POST';

    /**
     * Constructor
     * Does not require arguments. Initialization happens via input().
     */
    public function __construct()
    {
    }

    /**
     * Initialize the validator with the request source (POST or GET).
     * Populates the internal data array from the global $_POST or $_GET variables.
     *
     * @param string $type The request method to capture. Defaults to 'POST'.
     * Options: 'POST', 'GET'.
     * @return $this Returns the Validator instance for method chaining.
     */
    public function input($type = 'POST')
    {
        $this->_method = strtoupper($type);
        // Ternary operator to select the correct global array
        $this->_data = ($this->_method === 'GET') ? $_GET : $_POST;
        return $this;
    }

    /**
     * Selects a specific field from the input data to begin validation.
     * If the field is missing from the request, it initializes it as null to prevent errors.
     *
     * @param string $fieldName The 'name' attribute of the HTML input field.
     * @param string|null $label (Optional) A human-friendly name for this field used in error messages.
     * If null, it capitalizes the $fieldName (e.g., "fullname" -> "Fullname").
     * @return $this Returns the Validator instance for method chaining.
     */
    public function field($fieldName, $label = null)
    {
        $this->_currentItem = $fieldName;
        $this->_currentLabel = $label ?: ucfirst($fieldName);
        
        // Ensure the key exists to avoid "Undefined Index" notices later
        if (!array_key_exists($fieldName, $this->_data)) {
            $this->_data[$fieldName] = null;
        }

        return $this;
    }

    /**
     * ---------------------------------------------------
     * VALIDATION RULES
     * ---------------------------------------------------
     */

    /**
     * Rule: Checks if the current field is not empty.
     * Note: Allow '0' as a valid value (e.g., strictly empty string or null fails).
     *
     * @return $this Returns the instance to allow chaining next rule.
     */
    public function required()
    {
        $val = trim($this->_data[$this->_currentItem] ?? '');
        // We check against empty string specifically so "0" is allowed
        if (empty($val) && $val !== '0') {
            $this->addError("is required.");
        }
        return $this;
    }

    /**
     * Rule: Checks if the string length is greater than or equal to $length.
     *
     * @param int $length The minimum number of characters required.
     * @return $this Returns the instance to allow chaining.
     */
    public function min($length)
    {
        if (strlen($this->_data[$this->_currentItem]) < $length) {
            $this->addError("must be at least $length characters.");
        }
        return $this;
    }

    /**
     * Rule: Checks if the string length is less than or equal to $length.
     *
     * @param int $length The maximum number of characters allowed.
     * @return $this Returns the instance to allow chaining.
     */
    public function max($length)
    {
        if (strlen($this->_data[$this->_currentItem]) > $length) {
            $this->addError("cannot exceed $length characters.");
        }
        return $this;
    }

    /**
     * Rule: Checks if the value is a valid email address format.
     * Uses PHP's built-in filter_var().
     *
     * @return $this Returns the instance to allow chaining.
     */
    public function email()
    {
        if (!filter_var($this->_data[$this->_currentItem], FILTER_VALIDATE_EMAIL)) {
            $this->addError("is not a valid email address.");
        }
        return $this;
    }

    /**
     * Rule: Checks if the value is numeric.
     * Accepts numbers or numeric strings (e.g., 123, "123", 1.5).
     *
     * @return $this Returns the instance to allow chaining.
     */
    public function numeric()
    {
        if (!is_numeric($this->_data[$this->_currentItem])) {
            $this->addError("must be a number.");
        }
        return $this;
    }

    /**
     * Rule: Checks if the value is a valid date in 'YYYY-MM-DD' format.
     *
     * @return $this Returns the instance to allow chaining.
     */
    public function date()
    {
        $d = DateTime::createFromFormat('j F Y', $this->_data[$this->_currentItem]);
        // Validate that the format matches strictly (e.g., reject 2023-02-30)
        if (!($d && $d->format('j F Y') === $this->_data[$this->_currentItem])) {
            $this->addError("must be a valid date (dd mmmm yyyyy).");
        }
        return $this;
    }

    /**
     * Helper: Adds an error message to the internal error array.
     * Only adds the FIRST error encountered for a specific field.
     *
     * @param string $text The specific error message suffix (e.g., "is required").
     * @return void
     */
    private function addError($text)
    {
        // Only add error if one doesn't already exist for this field
        if (empty($this->_errors[$this->_currentItem])) {
            $this->_errors[$this->_currentItem] = "{$this->_currentLabel} {$text}";
        }
    }

    /**
     * ---------------------------------------------------
     * EXECUTION & RESPONSE
     * ---------------------------------------------------
     */

    /**
     * Checks if the validation process passed without any errors.
     *
     * @return bool True if no errors exist, False otherwise.
     */
    public function passes()
    {
        return empty($this->_errors);
    }

    /**
     * Retrieves the sanitized data array directly.
     * useful if you want to handle errors manually instead of exiting.
     *
     * @return array The associative array of input data.
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * Automatic Handler:
     * 1. Checks for errors.
     * 2. If errors exist -> Sends JSON error response and kills the script.
     * 3. If success -> Returns the clean data array.
     *
     * @return array The validated, safe input data ready for database usage.
     */
    public function validateOrExit()
    {
      
        if (!empty($this->_errors)) {
            // 'payload' will contain the array of field-specific errors
            $this->jsonResponse('validation_error', 'Please correct the errors below.', $this->_errors);
        }
        
        return $this->_data;
    }

    /**
     * Generic JSON Response Helper.
     * Sets headers, encodes the array, outputs it, and terminates execution.
     *
     * @param string $status  The status string ('success', 'error', 'validation_error').
     * @param string $message A global message to display to the user.
     * @param mixed  $payload (Optional) Additional data, such as the error array or the saved record ID.
     * @return void           (Exits script)
     */
    public function jsonResponse($status, $message, $payload = null)
    {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'payload' => $payload
        ]);
        exit; // Stop script execution immediately
    }
}