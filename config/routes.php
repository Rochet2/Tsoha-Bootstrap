<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });
  $routes->get('/sandbox/', function() {
    HelloWorldController::sandbox();
  });
  $routes->get('/login/', function() {
    HelloWorldController::recipes_login();
  });
  $routes->get('/user_edit/', function() {
    HelloWorldController::user_edit();
  });
  $routes->get('/ingredient_show/', function() {
    HelloWorldController::ingredient_show();
  });
  $routes->get('/ingredient_edit/', function() {
    HelloWorldController::ingredient_edit();
  });
  $routes->get('/ingredient_list/', function() {
    HelloWorldController::ingredient_list();
  });
  $routes->get('/recipe_list/', function() {
    HelloWorldController::recipe_list();
  });

  $routes->post('/ingredient/', function() {
    IngredientController::store();
  });
  $routes->get('/ingredient/', function() {
    IngredientController::index();
  });
  $routes->get('/ingredient/create/', function() {
    IngredientController::create();
  });
  $routes->get('/ingredient/:id/', function($id) {
    IngredientController::show($id);
  });

  $routes->post('/user/', function() {
    UserController::store();
  });
  $routes->get('/user/', function() {
    UserController::index();
  });
  $routes->get('/user/create/', function() {
    UserController::create();
  });
  $routes->get('/user/:id/', function($id) {
    UserController::show($id);
  });

  $routes->post('/unit/', function() {
    UnitController::store();
  });
  $routes->get('/unit/', function() {
    UnitController::index();
  });
  $routes->get('/unit/create/', function() {
    UnitController::create();
  });
  $routes->get('/unit/:id/', function($id) {
    UnitController::show($id);
  });

  $routes->get('/recipe/', function() {
    RecipeController::index();
  });
  $routes->get('/recipe/create/', function() {
    RecipeController::create();
  });
  $routes->get('/recipe/:id/', function($id) {
    RecipeController::show($id);
  });
