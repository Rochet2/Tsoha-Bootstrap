<?php
class User extends BaseModel {
    public $id, $username, $password, $name;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }

    public static function authenticate($username, $password) {
        $query = DB::connection()->prepare('SELECT * FROM "'.static::tablename().'" WHERE username = :username AND password = :password LIMIT 1');
        $query->execute(array('username' => $username, 'password' => $password));
        $row = $query->fetch();
        if (!$row) {
          return null;
        }
        return static::newself($row);
    }

    public function validate_password() {
        $errors = array();
        if (!is_string($this->password)) {
          $errors[] = "password needs to be a string";
          return $errors;
        }
        if (strlen($this->password) < 1) {
          $errors[] = "password can not be empty";
          return $errors;
        }
        return $errors;
    }

    public function validate_username() {
        $errors = array();
        if (!is_string($this->username)) {
          $errors[] = "username needs to be a string";
          return $errors;
        }
        if (strlen($this->username) < 1) {
          $errors[] = "username can not be empty";
          return $errors;
        }
        if (!is_numeric($this->id)) {
            $query = DB::connection()->prepare('SELECT * FROM "'.static::tablename().'" WHERE username = :username LIMIT 1');
            $query->execute(array('username' => $this->username));
        }
        else {
            $query = DB::connection()->prepare('SELECT * FROM "'.static::tablename().'" WHERE username = :username and id != :id LIMIT 1');
            $query->execute(array('username' => $this->username, 'id' => $this->id));
        }
        $row = $query->fetch();
        if ($row) {
          $errors[] = "username is already in use";
        }
        return $errors;
    }
}
