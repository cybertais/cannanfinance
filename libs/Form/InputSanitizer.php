<?php

class InputSanitizer{

        /**
         * Sanitize a value based on its HTML5 input type.
         *
         * @param string $type  The input type (e.g., text, email, url, number).
         * @param mixed  $value The value to sanitize.
         * @return mixed        The sanitized value.
         */
        public static function sanitize(string $type, mixed $value): mixed
        {
            switch ($type) {
                case 'text':
                case 'search':
                case 'password':
                case 'textarea':
                    return self::sanitizeText($value);
    
                case 'email':
                    return self::sanitizeEmail($value);
    
                case 'url':
                    return self::sanitizeUrl($value);
    
                case 'tel':
                    return self::sanitizeTel($value);
    
                case 'number':
                case 'range':
                    return self::sanitizeNumber($value);
    
                case 'date':
                case 'month':
                case 'week':
                case 'time':
                case 'datetime-local':
                    return self::sanitizeDate($value);
    
                case 'color':
                    return self::sanitizeColor($value);
    
                case 'checkbox':
                case 'radio':
                    return self::sanitizeBoolean($value);
    
                case 'hidden':
                    return self::sanitizeHidden($value);
    
                default:
                    // Unknown input types are treated as text
                    return self::sanitizeText($value);
            }
        }
    
        /**
         * Sanitize general text input by trimming and encoding special characters.
         *
         * @param mixed $value
         * @return string
         */
        private static function sanitizeText(mixed $value): string
        {
            return htmlspecialchars(trim((string)$value), ENT_QUOTES, 'UTF-8');
        }
    
        /**
         * Sanitize email input by removing all illegal characters.
         *
         * @param mixed $value
         * @return string
         */
        private static function sanitizeEmail(mixed $value): string
        {
            return filter_var(trim((string)$value), FILTER_SANITIZE_EMAIL);
        }
    
        /**
         * Sanitize URL input by removing illegal characters.
         *
         * @param mixed $value
         * @return string
         */
        private static function sanitizeUrl(mixed $value): string
        {
            return filter_var(trim((string)$value), FILTER_SANITIZE_URL);
        }
    
        /**
         * Sanitize telephone input by allowing only numbers, spaces, plus, hyphens, and parentheses.
         *
         * @param mixed $value
         * @return string
         */
        private static function sanitizeTel(mixed $value): string
        {
            return preg_replace('/[^0-9+\-\(\)\s]/', '', trim((string)$value));
        }
    
        /**
         * Sanitize numeric input (integer or float).
         *
         * @param mixed $value
         * @return float|int
         */
        private static function sanitizeNumber(mixed $value): float | int
        {
            $number = filter_var(trim((string)$value), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            return is_numeric($number) ? (strpos($number, '.') !== false ? (float)$number : (int)$number) : 0;
        }
    
        /**
         * Sanitize date/time input by allowing only numbers, hyphens, colons, and the 'T' character.
         *
         * @param mixed $value
         * @return string
         */
        private static function sanitizeDate(mixed $value): string
        {
            return preg_replace('/[^0-9\-:T]/', '', trim((string)$value));
        }
    
        /**
         * Sanitize color input by validating HEX color codes.
         *
         * @param mixed $value
         * @return string
         */
        private static function sanitizeColor(mixed $value): string
        {
            $color = trim((string)$value);
            return preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $color) ? $color : '';
        }
    
        /**
         * Sanitize boolean inputs (e.g., checkbox, radio) into true/false.
         *
         * @param mixed $value
         * @return bool
         */
        private static function sanitizeBoolean(mixed $value): bool
        {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }
    
        /**
         * Sanitize hidden input fields (same as text).
         *
         * @param mixed $value
         * @return string
         */
        private static function sanitizeHidden(mixed $value): string
        {
            return self::sanitizeText($value);
        }

         /**
     * Dynamically sanitize an array of input values based on a type map.
     *
     * @param array $data The associative array of data (e.g., $_POST).
     * @param array $rules An associative array of rules, field => type (e.g., ['email' => 'email']).
     * @return array The sanitized data.
     */
    public static function sanitizeArray(array $data, array $rules): array
    {
        $sanitized = [];

        foreach ($rules as $field => $type) {
            if (isset($data[$field])) {
                $sanitized[$field] = self::sanitize($type, $data[$field]);
            } else {
                $sanitized[$field] = null; // Field missing, you can customize this behavior
            }
        }

        return $sanitized;
    }

    
    // public function __construct(){

    // }


    // public function sanitizeString($data){
        
    // }
	
	


    // public function __call($name, $arguments){
    //     throw new Exception($name.' does not exist inside of: '. __CLASS__);
    // }
}

?>