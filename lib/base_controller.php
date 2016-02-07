<?php

  class BaseController{

    public static function get_user_logged_in(){
      // Toteuta kirjautuneen käyttäjän haku tähän
      return null;
    }

    public static function check_logged_in(){
      // Toteuta kirjautumisen tarkistus tähän.
      // Jos käyttäjä ei ole kirjautunut sisään, ohjaa hänet toiselle sivulle (esim. kirjautumissivulle).
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
    public static function create() {
        View::make(self::tablename().'/create.html');
    }
    public static function store() {
        $_class = self::classname();
        unset($_POST['id']);
        unset($_POST['validators']);
        $v = new $_class($_POST);
        $v->save();
        Redirect::to('/'.self::tablename().'/'.$v->id, array('message' => self::classname().' added!'));
    }

  }
