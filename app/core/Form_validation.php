<?php


namespace App\Core;


class Form_validation
{
    private array $errors;
    private array $availableRules = [
        'required',
        'minLength',
        'matches'
    ];

    public function setError($fieldName, $error)
    {
        $this->errors[$fieldName] = $error;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function checkRule($rule, $value, $fieldName, $checkValue = null)
    {
        switch ($rule) {
            case 'required':
                if (empty($value)) {
                    $this->setError($fieldName, "$fieldName is required");
                }
                break;

            case 'minLength':
                if (strlen($value) < $checkValue) {
                    $this->setError($fieldName, "$fieldName must be at least $checkValue characters");
                }
                break;

            case 'matches':
                list($machField, $machValue) = explode('.', $checkValue);
                if($value !== $machValue) {
                    $this->setError($fieldName, "$fieldName and $machField do not match");
                }
                break;
        }
    }

    // $data = [
    //     'name' => 'required|minLength[8]'
    // ];

    public function validate($data, $rules)
    {
        foreach ($data as $field => $value) {
            if ($rules[$field]) {
                $fieldRules = \explode('/', $rules[$field]);

                foreach ($fieldRules as $rule) {
                    if ($this->availableRules[$rule]) {

                        if (str_contains($rule, '[')) {
                            list($rule, $checkValue) = explode('[', $rule);
                        } else {
                            $checkValue = null;
                        }

                        $this->checkRule($rule, $value, $field, $checkValue);
                    }
                }
            }
        }

        return count($this->errors) === 0;
    }
}
