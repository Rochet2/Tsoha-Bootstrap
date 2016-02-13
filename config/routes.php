<?php

  $routes->get('/', function() {
    BreweryController::index();
  });
  $routes->get('/sandbox/', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/login/', function() {
    UserController::login();
  });
  $routes->post('/login/', function() {
    UserController::handle_login();
  });
  $routes->get('/user/login/', function() {
    UserController::login();
  });
  $routes->post('/user/login/', function() {
    UserController::handle_login();
  });

  $routes->get('/logout/', function() {
    UserController::logout();
  });
  $routes->post('/logout/', function() {
    UserController::logout();
  });
  $routes->get('/user/logout/', function() {
    UserController::logout();
  });
  $routes->post('/user/logout/', function() {
    UserController::logout();
  });

  $routes->get('/user/', function() {
    UserController::index();
  });
  $routes->get('/user/create/', function() {
    UserController::create();
  });
  $routes->post('/user/create/', function() {
    UserController::store();
  });
  $routes->get('/user/:id/', function($id) {
    UserController::show($id);
  });
  $routes->get('/user/:id/edit/', function($id) {
    UserController::edit($id);
  });
  $routes->post('/user/:id/edit/', function($id) {
    UserController::update($id);
  });
  $routes->post('/user/:id/destroy/', function($id) {
    UserController::destroy($id);
  });

  $routes->get('/brewery/', function() {
    BreweryController::index();
  });
  $routes->get('/brewery/create/', function() {
    BreweryController::create();
  });
  $routes->post('/brewery/create/', function() {
    BreweryController::store();
  });
  $routes->get('/brewery/:id/', function($id) {
    BreweryController::show($id);
  });
  $routes->get('/brewery/:id/edit/', function($id) {
    BreweryController::edit($id);
  });
  $routes->post('/brewery/:id/edit/', function($id) {
    BreweryController::update($id);
  });
  $routes->post('/brewery/:id/destroy/', function($id) {
    BreweryController::destroy($id);
  });

  $routes->get('/style/', function() {
    StyleController::index();
  });
  $routes->get('/style/create/', function() {
    StyleController::create();
  });
  $routes->post('/style/create/', function() {
    StyleController::store();
  });
  $routes->get('/style/:id/', function($id) {
    StyleController::show($id);
  });
  $routes->get('/style/:id/edit/', function($id) {
    StyleController::edit($id);
  });
  $routes->post('/style/:id/edit/', function($id) {
    StyleController::update($id);
  });
  $routes->post('/style/:id/destroy/', function($id) {
    StyleController::destroy($id);
  });

  $routes->get('/beer/', function() {
    BeerController::index();
  });
  $routes->get('/beer/create/', function() {
    BeerController::create();
  });
  $routes->post('/beer/create/', function() {
    BeerController::store();
  });
  $routes->get('/beer/:id/', function($id) {
    BeerController::show($id);
  });
  $routes->get('/beer/:id/edit/', function($id) {
    BeerController::edit($id);
  });
  $routes->post('/beer/:id/edit/', function($id) {
    BeerController::update($id);
  });
  $routes->post('/beer/:id/destroy/', function($id) {
    BeerController::destroy($id);
  });

  $routes->get('/rating/', function() {
    RatingController::index();
  });
  $routes->get('/rating/create/', function() {
    RatingController::create();
  });
  $routes->post('/rating/create/', function() {
    RatingController::store();
  });
  $routes->get('/rating/:id/', function($id) {
    RatingController::show($id);
  });
  $routes->get('/rating/:id/edit/', function($id) {
    RatingController::edit($id);
  });
  $routes->post('/rating/:id/edit/', function($id) {
    RatingController::update($id);
  });
  $routes->post('/rating/:id/destroy/', function($id) {
    RatingController::destroy($id);
  });
