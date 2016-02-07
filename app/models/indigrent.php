<?php
class Indigrent extends BaseModel {
    public $id, $name, $price, $info;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }
}
