<?php

$_APP_route_parameters = [];

function get($route, $path_to_include){
  if ($_SERVER['REQUEST_METHOD'] == 'GET') { 
    route($route, $path_to_include);
  }  
}

function post($route, $path_to_include){
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    route($route, $path_to_include);
  }    
}

function put($route, $path_to_include){
  if ($_SERVER['REQUEST_METHOD'] == 'PUT') { 
    route($route, $path_to_include);
  }    
}

function delete($route, $path_to_include){
  if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    route($route, $path_to_include);
  }    
}

function route($route, $path_to_include){
  $ROOT = str_replace('/public', '', $_SERVER['DOCUMENT_ROOT']);
  $request_url = rtrim($_SERVER['REQUEST_URI'], '/');
  $request_url = strtok($request_url, '?');
  $request_url_parts = explode('/', $request_url);
  $route_parts = explode('/', $route);
  array_shift($request_url_parts);
  array_shift($route_parts);

  if ($route_parts[0] == '' && count($request_url_parts) == 0) {
    include_once("$ROOT/$path_to_include");
    exit();
  }

  if (count($route_parts) != count($request_url_parts)) { 
    return; 
  } 
  
  global $_APP_route_parameters;
  for( $i = 0; $i < count($route_parts); $i++ ){
    $route_part = $route_parts[$i];
    if( preg_match("/^[$]/", $route_part) ){
      $route_part = ltrim($route_part, '$');
      $_APP_route_parameters[$route_part] = $request_url_parts[$i];
    }
    else if( $route_parts[$i] != $request_url_parts[$i] ){
      return;
    } 
  }
  
  include_once("$ROOT/$path_to_include");
  exit();
}

function get_route_parameter($key) {
  global $_APP_route_parameters;
  if (empty($_APP_route_parameters)) {
    return null;
  }

  return isset($_APP_route_parameters[$key]) ? $_APP_route_parameters[$key] : null;
}