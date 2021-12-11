<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['dashboard']='student/dashboard';
$route['course']='course';
$route['read']='student/read';
$route['live_course']='student/live_course';
$route['self_course']='student/self_course';
$route['record']='student/record';
$route['forgot_password']='student/forgot_password';

$route['test']='test';
$route['logout']='student/logout';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['assignment']='assignment';
$route['case_study']='casestudy';
$route['quiz']='quiz';
$route['edit_profile']='student/edit_profile';
$route['program_flow']='program_flow';
$route['support']='support';