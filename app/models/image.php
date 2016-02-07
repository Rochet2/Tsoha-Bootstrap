<?php
class Image extends BaseModel {
    public $recipe_id, $url;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }
}
