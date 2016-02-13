<?php
class Ingredient extends BaseModel {
    public $id, $name, $info;

    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }

    public function validate_name() {
        $errors = array();
        if (!is_string($this->name)) {
            $errors[] = "name must be a string";
        } elseif (strlen($this->name) < 1) {
            $errors[] = "name can not be empty";
        }
        return $errors;
    }
}
