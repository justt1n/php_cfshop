<?php
namespace MVC\Core;

class Validator
{
    private $rules;
    private $errors = [];
    private $value = [];

    public function __construct($rules)
    {
        $this->rules = $rules;
        foreach ($rules as $key => $v) {
            $first_value = isset($_POST[$key]) ? $_POST[$key] : null;
            $this->value[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
            if ($this->value[$key] !== $first_value) {
                $this->errors[$key] = 'không hợp lệ';
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function validate()
    {
        $split = fn($str, $separator) => array_map('trim', explode($separator, $str));
        foreach ($this->rules as $key => $rule) {
            $checkers = $split(trim($rule), '|');
            foreach ($checkers as $checker) {
                if (strpos($checker, ':')) {
                    [$checker, $params] = $split($checker, ':');
                    if (strpos($params, ',')) {
                        $params = $split($params, ',');
                        $this->$checker($key, ...$params);
                    } else {
                        $this->$checker($key, $params);
                    }

                } else {
                    $checker = trim($checker);
                    $this->$checker($key);
                }
            }
        }
    }

    public function getValidatedValue()
    {
        return $this->value;
    }

    public function isRequired($key)
    {
        if (!isset($this->errors[$key])) {
            if (!isset($this->value[$key]) or strlen($this->value[$key]) < 1) {
                $this->errors[$key] = 'Bạn phải nhập trường này';
            }
        }
    }

    public function isPhone($key)
    {
        if (!isset($this->errors[$key])) {
            if (!preg_match('/^(0|84)(2(0[3-9]|1[0-6|8|9]|2[0-2|5-9]|3[2-9]|4[0-9]|5[1|2|4-9]|6[0-3|9]|7[0-7]|8[0-9]|9[0-4|6|7|9])|3[2-9]|5[5|6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])([0-9]{7})$/', $this->value[$key])) {
                $this->errors[$key] = 'Số điện thoại không hợp lệ';
            }
        }
    }

    public function isSame($key, $key2)
    {
        if (!isset($this->errors[$key])) {
            if ($this->value[$key] !== $this->value[$key2]) {
                $this->errors[$key] = 'Bạn phải nhập giống với ' . $key2;
            }
        }
    }

    public function minLength($key, $minLength)
    {
        if (!isset($this->errors[$key])) {
            if (strlen($this->value[$key]) < $minLength) {
                $this->errors[$key] = 'Bạn phải nhập tối thiểu ' . $minLength . ' kí tự';
            }
        }
    }

    public function unique($key, $model, $atrr)
    {
        if (!isset($this->errors[$key])) {
            $model = 'MVC\\Models\\' . $model;
            $mo = new $model();
            $func = 'check' . $atrr . 'Exists';
            if ($mo->$func($this->value[$key]) == false) {
                return;
            } else {
                $this->errors[$key] = ucwords($key) . ' đã được sử dụng';
            }
        }
    }
}