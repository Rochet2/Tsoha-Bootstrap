<?php
class Brewery extends BaseModel {
    public $id, $name, $founded, $info;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }

    public function validate_founded() {
        $errors = array();
        if (!is_integer($this->founded)) {
            $errors[] = "foundation year is not an integer";
        } elseif ($this->founded > date("Y")) {
            $errors[] = "brewery can not be founded in the future";
        } elseif ($this->founded < 1042) {
            $errors[] = "brewery can not be founded before the oldest known brewery (year 1042)";
        }
        return $errors;
    }
}
