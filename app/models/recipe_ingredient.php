<?php
class Recipe_Ingredient extends BaseModel {
    public $recipe_id, $ingredient_id, $amount, $unit_id;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }
}
