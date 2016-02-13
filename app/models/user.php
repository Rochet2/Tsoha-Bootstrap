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

    public function validate_username() {
        $errors = array();
        $query = DB::connection()->prepare('SELECT * FROM "'.static::tablename().'" WHERE username = :username and id != :id LIMIT 1');
        $query->execute(array('username' => $this->username, 'id' => $this->id));
        $row = $query->fetch();
        if ($row) {
          $errors[] = "username is already in use";
        }
        return $errors;
    }
}
