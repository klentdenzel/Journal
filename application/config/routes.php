<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['articles'] = 'articles/index';
// $route['blank'] = 'users/blank';
// $route['users/(:any)'] = 'users/view/$1';

$route['volumes'] = 'volumes/index';
$route['volumes/(:any)'] = 'volumes/view/$1';
$route['volumes/details/(:any)'] = 'volumes/details/$1'; 
// $route['add_volume'] = 'volumes/add_volume';
$route['add_volume_form']['GET'] = 'volumes/volume_form'; 
$route['add_volume_post']['POST'] = 'Volumes/volume_register_process';
$route['users/delete_volume/(:num)'] = 'Users/delete_volume/$1';
$route['volumes/edit_volume_form/(:any)'] = 'volumes/edit_volume_form/$1';
$route['volumes_update']['POST'] = 'Volumes/update_volume_process';
$route['volumes/toggle_archive/(:any)'] = 'volumes/toggle_archive/$1';
$route['volumes/toggle_publish/(:any)'] = 'volumes/toggle_publish/$1';
$route['toggle-archive']['POST'] = 'Volumes/toggle_archive';
$route['toggle-publish']['POST'] = 'Volumes/toggle_publish';

// $route['home'] = 'home/home_show';

$route['articles'] = 'articles/index';
$route['articles/(:any)'] = 'articles/view_volume_name/$1';
$route['add_article_form']['GET'] = 'articles/add';
$route['add_article_post']['POST'] = 'articles/article_register_process';
$route['articles/delete_article/(:num)'] = 'articles/delete_article/$1';

$route['articles/edit_form/(:any)'] = 'articles/edit_form/$1';
$route['update_article']['POST'] = 'articles/update_article_process';
$route['toggle-publish']['POST'] = 'Articles/toggle_publish';


$route['authors'] = 'authors/index';
$route['authors/(:any)'] = 'authors/view/$1';
$route['new_author_form']['GET'] = 'Authors/author_form';
$route['new_author_post']['POST'] = 'Authors/author_register_process';

$route['authors/edit_form/(:any)'] = 'authors/edit_form/$1';
$route['authors_update']['POST'] = 'authors/update_author_process';



$route['users'] = 'users/index';
$route['users/(:any)'] = 'users/view/$1';
//$route['users/(:any)'] = 'users/edituser/$1';
$route['new_user_form']['GET'] = 'Users/user_form';
$route['new_user_post']['POST'] = 'Users/user_register_process';
$route['users/delete_user/(:num)'] = 'Users/delete_user/$1';

//$route['update_form']['GET'] = 'users/edituser/$1';
$route['users/edit_form/(:any)'] = 'users/edit_form/$1';
$route['users_update']['POST'] = 'users/update_user_process';



$route['registration']['GET'] = 'Register/index';
$route['registration']['POST'] = 'Register/register_process';
$route['login']['GET'] = 'Login/index';
$route['login']['POST'] = 'Login/login_process';
// $route['add_volume']['GET'] = 'Volumes/volume_form';
// $route['add_volume']['POST'] = 'Volumes/volume_register_process';



$route['users/(:any)'] = 'users/view/$1';


$route['default_controller'] = 'pages/view';
$route['home'] = 'pages/home_show';
$route['login'] = 'login';
$route['registration'] = 'register';
$route['(:any)'] = 'pages/view/$1';