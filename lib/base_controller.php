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

    public static function index() {
        $vars = array('all' => self::call('all'));
        static::index_vars($vars);
        View::make(self::tablename().'/index.html', $vars);
    }
    public static function show($id) {
        $vars = array('val' => self::call('find', $id));
        static::show_vars($vars, $id);
        View::make(self::tablename().'/show.html', $vars);
    }
    public static function edit($id) {
        $vars = array('val' => self::call('find', $id));
        static::edit_vars($vars, $id);
        View::make(self::tablename().'/edit.html', $vars);
    }
    public static function create() {
        View::make(self::tablename().'/create.html');
    }
    public static function store() {
        $_class = self::classname();
        unset($_POST['id']);
        $v = new $_class($_POST);

        $errors = $v->errors();
        if (!$errors) {
            $v->save();
            Redirect::to('/'.self::tablename().'/'.$v->id, array('message' => self::classname().' added!'));
        } else {
            Redirect::to('/'.self::tablename().'/create', array('errors' => $errors));
        }
    }
    public static function update($id) {
        $_class = self::classname();
        $v = new $_class($_POST);
        $v->id = $id;

        $errors = $v->errors();
        if (!$errors) {
            $v->update();
            Redirect::to('/'.self::tablename().'/'.$v->id, array('message' => self::classname().' updated!'));
        } else {
            Redirect::to('/'.self::tablename().'/edit', array('errors' => $errors));
        }
    }

    public static function destroy($id){
        $_class = self::classname();
        $v = new $_class(array('id' => $id));
        $v->destroy();
        Redirect::to('/'.self::tablename(), array('message' => self::classname().' deleted!'));
    }
  }
