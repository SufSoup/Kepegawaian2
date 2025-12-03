<?php

class Validation {
    public static function required($value, $fieldName = 'Field') {
        if (empty($value)) {
            return "$fieldName harus diisi";
        }
        return null;
    }
    
    public static function email($value, $fieldName = 'Email') {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return "$fieldName tidak valid";
        }
        return null;
    }
    
    public static function date($value, $fieldName = 'Tanggal') {
        $d = DateTime::createFromFormat('Y-m-d', $value);
        if (!$d || $d->format('Y-m-d') !== $value) {
            return "$fieldName tidak valid";
        }
        return null;
    }
    
    public static function numeric($value, $fieldName = 'Field') {
        if (!is_numeric($value)) {
            return "$fieldName harus berupa angka";
        }
        return null;
    }
    
    public static function validate($data, $rules) {
        $errors = [];
        
        foreach ($rules as $field => $ruleList) {
            $ruleArray = explode('|', $ruleList);
            
            foreach ($ruleArray as $rule) {
                $error = null;
                
                if ($rule === 'required') {
                    $error = self::required($data[$field] ?? null, ucfirst($field));
                } elseif ($rule === 'email') {
                    if (isset($data[$field]) && !empty($data[$field])) {
                        $error = self::email($data[$field], ucfirst($field));
                    }
                } elseif ($rule === 'date') {
                    if (isset($data[$field]) && !empty($data[$field])) {
                        $error = self::date($data[$field], ucfirst($field));
                    }
                } elseif ($rule === 'numeric') {
                    if (isset($data[$field]) && !empty($data[$field])) {
                        $error = self::numeric($data[$field], ucfirst($field));
                    }
                }
                
                if ($error) {
                    $errors[$field] = $error;
                    break;
                }
            }
        }
        
        return $errors;
    }
}


