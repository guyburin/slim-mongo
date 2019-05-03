<?php
require_once '/lib/Slim/Slim/Slim.php';
require_once '/controllers/studentController.php';

  Slim\Slim::registerAutoloader();
  $app = new Slim\Slim();

  function response($status, $response) {
    $app = \Slim\Slim::getInstance();
    $app->status($status);
    $app->contentType('application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  $app->get('/hello', ['studentController', 'index']);
  $app->get('/findByName/:name', function ($name) {
    studentController::findByName($name);
  });
  $app->post('/search', function() use($app) {
    studentController::search($app->request());
  });
  $app->post('/insert', function() use($app){
    studentController::insert($app->request());
    });
  // $app->post('/insert', function() use($app){
  //   TestController::insert($app->request());
  // });
  // $app->get('/search/:name', function ($name) {
  //   TestController::search($name);
  // });
  // $app->get('/getdata/:age', function ($age) {
  //   TestController::getdata($age);
  // });

  $app->run();
?>
