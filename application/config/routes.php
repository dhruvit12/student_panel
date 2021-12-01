<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['dashboard']='student/dashboard';
$route['course']='student/course';
$route['read']='student/read';
$route['live_course']='student/live_course';
$route['self_course']='student/self_course';
$route['record']='student/record';
$route['logout']='student/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
