<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['index'] ='index.php/user/index';
$route['default_controller'] = 'items/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register']['GET']= 'Auth/RegisterController/index'; 
$route['register']['POST']= 'Auth/RegisterController/register'; 

$route['login']['GET'] = 'Auth/LoginController/index';
$route['login']['POST'] = 'Auth/LoginController/login';

$route['forgotPassword'] = 'Auth/LoginController/forgotPassword';
$route['resetPassword'] = 'Auth/ResetController/password';


$route['logout']['GET'] = 'Auth/LogoutController/logout';

$route['dash']['GET'] = 'dash/index';
$route['dashuser']['GET'] = 'dashuser/index';

$route['403']['GET'] = 'Dashuser/accessdenied';
