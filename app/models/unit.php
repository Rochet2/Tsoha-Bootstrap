<?php
class Unit extends BaseModel {
    public $id, $unit, $info;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }
}
