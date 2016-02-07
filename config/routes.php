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
  $routes->get('/indigrent_show/', function() {
    HelloWorldController::indigrent_show();
  });
  $routes->get('/indigrent_edit/', function() {
    HelloWorldController::indigrent_edit();
  });
  $routes->get('/indigrent_list/', function() {
    HelloWorldController::indigrent_list();
  });
  $routes->get('/recipe_list/', function() {
    HelloWorldController::recipe_list();
  });

  $routes->get('/ingredient/', function() {
    IndigrentController::index();
  });
  $routes->post('/ingredient/', function() {
    IndigrentController::store();
  });
  $routes->get('/ingredient/create/', function() {
    IndigrentController::create();
  });
  $routes->get('/ingredient/:id/', function($id) {
    IndigrentController::show($id);
  });
