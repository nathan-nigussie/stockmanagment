<?php

class FormValidator
{
    private $formData;
    private $requiredFields;

    public function __construct($formData, $requiredFields)
    {
        $this->formData = $formData;
        $this->requiredFields = $requiredFields;
    }

    public function validate()
    {
        $errors = array();

        // Check if required fields are present and not empty
        foreach ($this->requiredFields as $fieldName => $fieldLabel) {
            if (empty($this->formData[$fieldName])) {
                $errors[] = "$fieldLabel is very required";
            }
        }

        // Check if all dynamic fields have been filled out
        foreach ($this->formData as $fieldName => $fieldValue) {
            if (strpos($fieldName, 'dynamic_') === 0 && empty($fieldValue)) {
                $fieldLabel = str_replace('dynamic_', '', $fieldName);
                $fieldLabel = ucfirst(str_replace('_', ' ', $fieldLabel));
                $errors[] = "$fieldLabel is required";
            }
        }

        return $errors;
    }

}
