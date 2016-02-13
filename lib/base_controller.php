<?php

  class BaseController{

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

    public static function is_logged_user($id){
        if (self::get_user_logged_in() && self::get_user_logged_in()->id == $id) {
            return true;
        }
        return false;
    }

    private static function call($funcname) {
        $args = func_get_args();
        array_shift($args);
        return call_user_func_array(array(static::$classname, $funcname), $args);
    }
    public static function tablename() {
        return strtolower(static::$classname);
    }
    public static function classname() {
        return static::$classname;
    }
    public static function index_vars(&$vars) {
    }
    public static function show_vars(&$vars, $id) {
    }
    public static function edit_vars(&$vars, $id) {
    }
    public static function create_vars(&$vars) {
    }
    public static function edit_stored_params(&$vars) {
    }
    public static function edit_update_params(&$vars) {
    }
    public static function can_create() {
        return static::get_user_logged_in();
    }
    public static function can_edit($id) {
        return static::get_user_logged_in();
    }
    public static function check_edit($id) {
        if (!static::can_edit($id)) {
            Redirect::to('/', array('message' => "You do not have permission to do that"));
            return false;
        }
        return true;
    }
    public static function check_create() {
        if (!static::can_create()) {
            Redirect::to('/', array('message' => "You do not have permission to do that"));
            return false;
        }
        return true;
    }

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
    public static function store() {
        $_class = self::classname();
        $params = $_POST;
        unset($params['id']);
        static::edit_stored_params($params);
        $v = new $_class($params);

        $errors = $v->errors();
        if (!$errors) {
            $v->save();
            Redirect::to('/'.self::tablename().'/'.$v->id, array('message' => self::classname().' added!'));
        } else {
            Redirect::to('/'.self::tablename().'/create', array('errors' => $errors, 'attr' => $params));
        }
    }
    public static function update($id) {
        if (!static::check_edit($id))
            return;
        $_class = self::classname();
        $params = $_POST;

        $v = self::call('find', $id);
        if (!$v) {
            Redirect::to('/'.self::tablename().'/', array('errors' => array("invalid id"), 'attr' => $params));
            return;
        }
        static::edit_update_params($params);
        $v->set_attributes($params);

        $errors = $v->errors();
        if (!$errors) {
            $v->update();
            Redirect::to('/'.self::tablename().'/'.$v->id, array('message' => self::classname().' updated!'));
        } else {
            Redirect::to('/'.self::tablename().'/'.$id.'/edit', array('errors' => $errors, 'attr' => $params));
        }
    }

    public static function destroy($id){
        if (!static::check_edit($id))
            return;
        $_class = self::classname();
        $v = new $_class(array('id' => $id));
        $v->delete();
        Redirect::to('/'.self::tablename(), array('message' => self::classname().' deleted!'));
    }
  }
