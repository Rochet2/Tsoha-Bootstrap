<?php
class UserController extends BaseController {
    protected static $classname = "User";
    
    public static function show_vars(&$vars, $id) {
        $vars['ratings'] = array();
        foreach (Rating::find_by('user_id', $id) as $k => $v) {
            $vars['ratings'][] = array('rating' => $v, 'beer' => Beer::find($v->beer_id));
        }
    }

    public static function can_create() {
        return !static::get_user_logged_in();
    }

    public static function can_edit($id) {
        return static::is_logged_user($id);
    }

    public static function login() {
        View::make('user/login.html');
    }

    public static function logout() {
        session_unset();
        Redirect::to('/', array('message' => 'You have logged out!'));
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

    public static function edit_update_params(&$vars) {
        unset($vars['username']);
        unset($vars['password']);
    }
}
