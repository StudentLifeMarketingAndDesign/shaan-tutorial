<?php
FulltextSearchable::enable();
global $project;
$project = 'mysite';

global $database;
$database = 'shaan';
 
// Use _ss_environment.php file for configuration
require_once("conf/ConfigureFromEnv.php");

// Set the site locale
i18n::set_locale('en_US');

error_reporting(E_ALL);
