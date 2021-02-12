<?php


namespace App\Core;


class Form_validation
{
    private array $errors;

    private function checkRule($rule, $value): bool
    {
        switch ($rule) {
            case 'required':
                return !empty($value);
        }
    }

    public function validate($data, $rules)
    {
        foreach ($data as $field => $value) {
            if ($rules[$field]) {
                if (is_array($rules[$field])) {
                    foreach ($rules[$field] as $rule => $rulesContent) {
                        $ruleStatus = $this->checkRule($rule, $value);

                        if (!$ruleStatus) {
                            $errorIndex = $field . '_err';
                            $this->errors[$errorIndex] = $rulesContent['message'];
                        }
                    }
                }
            }
        }

        return count($this->errors) === 0;
    }
}