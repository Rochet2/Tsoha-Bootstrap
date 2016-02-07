<?php
class User extends BaseModel {
    public $id, $username, $password, $name;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }
}
