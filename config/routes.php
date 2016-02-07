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

  $routes->get('/indigrent/', function() {
    IndigrentController::index();
  });
  $routes->post('/indigrent/', function() {
    IndigrentController::store();
  });
  $routes->get('/indigrent/create/', function() {
    IndigrentController::create();
  });
  $routes->get('/indigrent/:id/', function($id) {
    IndigrentController::show($id);
  });
