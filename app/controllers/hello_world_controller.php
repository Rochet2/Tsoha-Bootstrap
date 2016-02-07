<?php

class HelloWorldController extends BaseController{

  public static function index(){
    // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
    View::make('suunnitelmat/index.html');
  }

  public static function sandbox(){
    // Testaa koodiasi täällä
    // View::make('helloworld.html');
    $indi = Recipe::find(1);
    $indis = Recipe::all();
    Kint::dump($indi);
    Kint::dump($indis);
  }

  public static function recipes_login(){
    View::make('suunnitelmat/login.html');
  }

  public static function user_edit(){
    View::make('suunnitelmat/user_edit.html');
  }

  public static function indigrent_show(){
    View::make('suunnitelmat/indigrent_show.html');
  }

  public static function indigrent_edit(){
    View::make('suunnitelmat/indigrent_edit.html');
  }

  public static function indigrent_list(){
    View::make('suunnitelmat/indigrent_list.html');
  }

  public static function recipe_list(){
    View::make('suunnitelmat/recipe_list.html');
  }
}
