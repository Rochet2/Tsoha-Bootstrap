<?php
class Recipe extends BaseModel {
    public $id, $name, $instructions, $category_id;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }
}
