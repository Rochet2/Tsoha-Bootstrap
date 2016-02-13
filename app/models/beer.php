<?php
class Beer extends BaseModel {
    public $id, $brewery_id, $style_id, $name, $info;

    public function __construct($attributes = null) {
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }

    public function validate_brewery_id() {
        $errors = array();
        if (!is_integer($this->brewery_id) || !Brewery::find($this->brewery_id)) {
            $errors[] = "brewery does not exist";
        }
        return $errors;
    }

    public function validate_style_id() {
        $errors = array();
        if (!is_integer($this->style_id) || !Style::find($this->style_id)) {
            $errors[] = "style does not exist";
        }
        return $errors;
    }
}
