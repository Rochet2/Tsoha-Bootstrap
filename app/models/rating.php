<?php
class Rating extends BaseModel {
    public $id, $beer_id, $user_id, $rating, $info;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }

    public function validate_beer_id() {
        $errors = array();
        if (!is_integer($this->beer_id) || !Beer::find($this->beer_id)) {
            $errors[] = "beer does not exist";
        }
        return $errors;
    }

    public function validate_user_id() {
        $errors = array();
        if (!is_integer($this->user_id) || !User::find($this->user_id)) {
            $errors[] = "user does not exist";
        }
        return $errors;
    }

    public function validate_rating() {
        $errors = array();
        if (!is_integer($this->rating)) {
            $errors[] = "rating is not an integer";
        } else {
            if ($this->rating < 0) {
                $errors[] = "rating must be between 0 and 10";
            }
            if ($this->rating > 10) {
                $errors[] = "rating must be between 0 and 10";
            }
        }
        return $errors;
    }
}
