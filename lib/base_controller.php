<?php

  class BaseController{

    // returns the currently logged in user or null
    public static function get_user_logged_in(){
        if (isset($_SESSION['user'])) {
            return User::find($_SESSION['user']);
        }
        return null;
    }

    public static function check_logged_in(){
        if (self::get_user_logged_in()) {
            return true;
        }
        Redirect::to('/user/login', array('message' => "You must be logged in!"));
        return false;
    }

    // Returns true if the $id belongs to the user that is currently logged in
    public static function is_logged_user($id){
        if (!is_null($id) && self::get_user_logged_in() && self::get_user_logged_in()->id == $id) {
            return true;
        }
        return false;
    }

    // Calls the given funcname with given parameters as the inherited class.
    // Funcname assumed to be valid static function
    private static function call($funcname) {
        $args = func_get_args(); // get varargs
        array_shift($args); // shift left to pop out funcname
        return call_user_func_array(array(static::$classname, $funcname), $args);
    }
    // Returns the table name, more specificly class name in lowercase
    public static function tablename() {
        return strtolower(static::$classname);
    }
    // Returns the class name
    public static function classname() {
        return static::$classname;
    }

    // These are static functions that are meant to be overridden
    // if the default controller behavior is needed to be changed

    // Below functions edit the variables passed to renderer
    public static function index_vars(&$vars) {
    }
    public static function show_vars(&$vars, $id) {
    }
    public static function edit_vars(&$vars, $id) {
    }
    public static function create_vars(&$vars) {
    }
    // Below functions edit the variables stored to DB
    public static function edit_stored_params(&$vars) {
    }
    public static function edit_update_params(&$vars) {
    }
    // Below functions evaluate access to do actions
    public static function can_create() {
        return static::get_user_logged_in();
    }
    public static function can_edit($id) {
        return static::get_user_logged_in();
    }
    public static function can_destroy($id) {
        return static::can_edit($id);
    }
    // Below functions use the evaluation and redirect
    public static function check_edit($id) {
        if (!static::can_edit($id)) {
            if (static::get_user_logged_in())
                Redirect::to(null, array('message' => "You do not have permission to do that"));
            else
                Redirect::to("/user/login", array('message' => "You need to be logged in to do that"));
            return false;
        }
        return true;
    }
    public static function check_destroy($id) {
        if (!static::can_destroy($id)) {
            if (static::get_user_logged_in())
                Redirect::to(null, array('message' => "You do not have permission to do that"));
            else
                Redirect::to("/user/login", array('message' => "You need to be logged in to do that"));
            return false;
        }
        return true;
    }
    public static function check_create() {
        if (!static::can_create()) {
            if (static::get_user_logged_in())
                Redirect::to(null, array('message' => "You do not have permission to do that"));
            else
                Redirect::to("/user/login", array('message' => "You need to be logged in to do that"));
            return false;
        }
        return true;
    }

    // Default rederers
    public static function index() {
        $vars = array('all' => self::call('all'), 'logged_user' => static::get_user_logged_in());
        static::index_vars($vars);
        View::make(self::tablename().'/index.html', $vars);
    }
    public static function show($id) {
        $vars = array('val' => self::call('find', $id), 'logged_user' => static::get_user_logged_in());
        static::show_vars($vars, $id);
        View::make(self::tablename().'/show.html', $vars);
    }
    public static function edit($id) {
        if (!static::check_edit($id))
            return;
        $vars = array('val' => self::call('find', $id), 'logged_user' => static::get_user_logged_in());
        static::edit_vars($vars, $id);
        View::make(self::tablename().'/edit.html', $vars);
    }
    public static function create() {
        if (!static::check_create())
            return;
        $vars = array('all' => self::call('all'), 'logged_user' => static::get_user_logged_in());
        static::create_vars($vars);
        View::make(self::tablename().'/create.html', $vars);
    }

    // Default DB actions
    public static function store() {
        $_class = self::classname();
        $params = $_POST;
        unset($params['id']);
        if (isset($params['name']))
            $params['name'] = trim($params['name']);
        static::edit_stored_params($params);
        $v = new $_class($params);

        $errors = $v->errors();
        if (!$errors) {
            $v->save();
            Redirect::to('/'.self::tablename().'/'.$v->id, array('message' => self::classname().' added!'));
        } else {
            Redirect::to('/'.self::tablename().'/create', array('errors' => $errors, 'attr' => $_POST));
        }
    }
    public static function update($id) {
        if (!static::check_edit($id))
            return;
        $_class = self::classname();
        $params = $_POST;

        $v = self::call('find', $id);
        if (!$v) {
            Redirect::to('/'.self::tablename().'/', array('errors' => array(self::classname().' does not'), 'attr' => $_POST));
            return;
        }
        if (isset($params['name']))
            $params['name'] = trim($params['name']);
        static::edit_update_params($params);
        $v->set_attributes($params);

        $errors = $v->errors();
        if (!$errors) {
            $v->update();
            Redirect::to('/'.self::tablename().'/'.$v->id, array('message' => self::classname().' updated!'));
        } else {
            Redirect::to('/'.self::tablename().'/'.$id.'/edit', array('errors' => $errors, 'attr' => $_POST));
        }
    }
    public static function destroy($id){
        if (!static::check_destroy($id))
            return;
        $_class = self::classname();
        $v = new $_class(array('id' => $id));
        $v->delete();
        Redirect::to('/'.self::tablename(), array('message' => self::classname().' deleted!'));
    }
  }
