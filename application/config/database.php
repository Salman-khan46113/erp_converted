<?php
defined('BASEPATH') or exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'Root@12345678',
	// 'database' => 'erp',
	'database' => 'demo-plastic',
	//'database' => 'sperp',
	//'database' => 'bsperpu2',
	// 'database' => 'sheet_bsperp',
	//'database' => 'sheet_ameya',
	//'database' => 'sheet_teplerp',
	//'database' => 'plastic_mayuresherp',
	//'database' => 'plastic_sperp',
	//'database' => 'plastic_aimplasterp',
	//'database' => 'plastic_arms',
	//'database' => 'sheet_sais',
	//'database' => 'plastic_jjtech',
	//'database' => 'sheet_ameya',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => TRUE,
	//'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
