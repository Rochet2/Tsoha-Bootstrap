<?php
class User extends BaseModel {
    public $id, $username, $password, $name;

    public function __construct($attributes = null){
        parent::__construct($attributes);
    }
    public static function newself($attributes = null) {
        return new self($attributes);
    }

    public static function login() {
        View::make('user/login.html');
    }
    public static function handle_login() {
        $params = $_POST;
        $user = User::authenticate($params['username'], $params['password']);

        if (!$user) {
            Redirect::to('/user/login', array('errors' => array('Invalid username or password', 'data' => $params)));
        } else {
            $_SESSION['user'] = $user->id;
            Redirect::to('/', array('message' => 'Welcome back ' . $user->name . '!'));
        }
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
}
